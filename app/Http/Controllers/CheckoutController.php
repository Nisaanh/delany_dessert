<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\Product;
    use App\Models\Cart;
    use App\Models\CartItem;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;

    class CheckoutController extends Controller
    {
        public function index()
        {
            $cart = $this->getOrCreateCart();
            $cart->load('items.product');

            if ($cart->item_count == 0) {
                return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
            }

            return view('checkout.index', compact('cart'));
        }

        public function store(Request $request)
        {
            // Debug: cek apakah form terkirim
            Log::info('Checkout process started for user: ' . Auth::id());

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'telepon' => 'required|string|min:8|max:20',
                'alamat' => 'required|string|max:2000',
                'catatan' => 'nullable|string|max:2000',
                'metode_pembayaran' => 'required|in:Tunai,Dana,OVO,QRIS',
            ]);

            $cart = $this->getOrCreateCart();
            $cart->load('items.product');

            if (!$cart || $cart->item_count == 0) {
                return back()->withErrors(['cart' => 'Keranjang kosong. Tambahkan produk terlebih dahulu.']);
            }

            DB::beginTransaction();
            try {
                // Debug: sebelum create order
                Log::info('Creating order for user: ' . Auth::id());

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'nama' => $validated['nama'],
                    'telepon' => $validated['telepon'],
                    'alamat' => $validated['alamat'],
                    'catatan' => $validated['catatan'] ?? null,
                    'metode_pembayaran' => $validated['metode_pembayaran'],
                    'total_harga' => $cart->total_amount,
                    'status' => 'pending',
                ]);

                // Debug: order created
                Log::info('Order created with ID: ' . $order->id);

                foreach ($cart->items as $cartItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'unit_price' => $cartItem->unit_price,
                        'total_price' => $cartItem->total_price,
                    ]);

                    $product = Product::find($cartItem->product_id);
                    if ($product && isset($product->stock)) {
                        $product->stock = max(0, $product->stock - $cartItem->quantity);
                        $product->save();
                    }
                }

                // Simpan cart ID sebelum dihapus untuk debugging
                $cartId = $cart->id;
                $cart->items()->delete();
                $cart->updateTotals();

                DB::commit();

                // Debug: sebelum redirect
                Log::info('Checkout successful, redirecting to success page. Order ID: ' . $order->id);

                // Redirect dengan session data yang konsisten
                return redirect()->route('checkout.success')
                    ->with('checkout_success', true)
                    ->with('order_id', $order->id)
                    ->with('message', 'Pesanan berhasil dibuat! Terima kasih telah berbelanja di Delany Dessert.');

            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error('Checkout error: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());
                return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage()]);
            }
        }

        public function success(Request $request)
        {
            // Debug: cek session data
            Log::info('Success page accessed. Session data:', session()->all());

            // Periksa dengan key yang sama seperti di store()
            if (!session('checkout_success')) {
                Log::warning('Accessing success page without checkout_success session');
                return redirect()->route('checkout.index')
                    ->with('error', 'Sesi checkout tidak valid. Silakan ulangi proses checkout.');
            }

            $orderId = session('order_id');
            if (!$orderId) {
                Log::error('Order ID not found in session');
                return redirect()->route('checkout.index')
                    ->with('error', 'Data pesanan tidak ditemukan.');
            }

            $order = Order::with('items.product')->find($orderId);
            if (!$order) {
                Log::error('Order not found in database. ID: ' . $orderId);
                return redirect()->route('checkout.index')
                    ->with('error', 'Pesanan tidak ditemukan.');
            }

            $message = session('message', 'Pesanan berhasil dibuat!');

            // Hapus session checkout setelah berhasil diakses
            session()->forget(['checkout_success', 'order_id', 'message']);

            return view('checkout.success', compact('order', 'message'));
        }

        private function getOrCreateCart()
        {
            $user = Auth::user();
            if (!$user) {
                abort(403, 'Silakan login terlebih dahulu.');
            }

            return Cart::firstOrCreate(
                ['user_id' => $user->id],
                ['total_amount' => 0, 'item_count' => 0]
            );
        }
    }