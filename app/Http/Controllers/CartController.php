<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.product');
        
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $cart = $this->getOrCreateCart();
        
        // Cek apakah produk sudah ada di keranjang
        $existingItem = $cart->items()->where('product_id', $product->id)->first();
        
        if ($existingItem) {
            // Update quantity jika produk sudah ada
            $existingItem->quantity += $request->quantity;
            $existingItem->updateTotalPrice();
        } else {
            // Tambah item baru
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'unit_price' => $product->price,
                'total_price' => $product->price * $request->quantity
            ]);
        }
        
        $cart->updateTotals();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $cartItem->quantity = $request->quantity;
        $cartItem->updateTotalPrice();
        $cartItem->cart->updateTotals();

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove(CartItem $cartItem)
    {
        $cart = $cartItem->cart;
        $cartItem->delete();
        $cart->updateTotals();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function clear()
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->delete();
        $cart->updateTotals();

        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan!');
    }

    private function getOrCreateCart()
    {
        $user = Auth::user();
        
        if (!$user) {
            // Untuk guest user, kita bisa menggunakan session
            // Tapi untuk sekarang kita asumsikan user sudah login
            abort(403, 'Silakan login terlebih dahulu.');
        }

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['total_amount' => 0, 'item_count' => 0]
        );

        return $cart;
    }
}