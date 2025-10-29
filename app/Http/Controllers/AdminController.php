<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalUsers = User::where('is_admin', false)->count();
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_harga');
        
        // Data untuk chart - jumlah pesanan per hari
        $salesData = $this->getOrderCountData();
        
        // Pesanan terbaru - menggunakan waktu yang sesuai
        $recentOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($order) {
                // Format waktu sesuai dengan timezone yang diinginkan
                $order->formatted_created_at = $this->formatOrderTime($order->created_at);
                $order->formatted_time_only = $this->formatOrderTime($order->created_at, true);
                return $order;
            });

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalUsers',
            'totalOrders',
            'totalRevenue',
            'salesData',
            'recentOrders'
        ));
    }
    
    private function getOrderCountData()
    {
        $orderCounts = Order::where('created_at', '>=', now()->subDays(30))
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        $labels = [];
        $data = [];
        
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $orderCount = $orderCounts->where('date', $date)->first();
            
            $labels[] = now()->subDays($i)->format('d M');
            $data[] = $orderCount ? $orderCount->count : 0;
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    /**
     * Format waktu pesanan sesuai dengan kebutuhan
     */
    private function formatOrderTime($timestamp, $timeOnly = false)
    {
        // Set timezone sesuai dengan lokasi (contoh: Asia/Jakarta)
        $timezone = 'Asia/Jakarta';
        
        // Convert to Carbon instance dengan timezone
        $time = Carbon::parse($timestamp)->timezone($timezone);
        
        if ($timeOnly) {
            // Format hanya jam:menit
            return $time->format('H:i');
        }
        
        // Format tanggal lengkap
        return $time->format('d M Y H:i');
    }

    // Method untuk menampilkan semua pesanan
    public function ordersIndex()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->through(function ($order) {
                $order->formatted_created_at = $this->formatOrderTime($order->created_at);
                $order->formatted_date = $this->formatOrderTime($order->created_at, false);
                $order->formatted_time = $this->formatOrderTime($order->created_at, true);
                return $order;
            });

        return view('admin.orders.index', compact('orders'));
    }

    // Method untuk menampilkan detail pesanan
    public function ordersShow(Order $order)
    {
        $order->load('user');
        $order->formatted_created_at = $this->formatOrderTime($order->created_at);
        $order->formatted_date = $this->formatOrderTime($order->created_at, false);
        $order->formatted_time = $this->formatOrderTime($order->created_at, true);
        
        return view('admin.orders.show', compact('order'));
    }

    // Method untuk update status pesanan
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status;

        $order->update([
            'status' => $newStatus,
            // Jika ingin mencatat waktu update status, tambahkan field updated_at
            'updated_at' => now()
        ]);

        return back()->with('success', "Status pesanan berhasil diubah dari {$oldStatus} menjadi {$newStatus}!");
    }
}