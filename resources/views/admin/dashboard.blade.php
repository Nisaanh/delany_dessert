@extends('layouts.app')

@section('title', 'Admin Dashboard - Delany Dessert')

@section('content')
<div class="container-fluid px-0">
    <!-- Header Section -->
    <div class="header-section bg-gradient-primary text-white p-4 mb-4">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h1 class="mb-3 fw-bold display-6">
                        <i class="fas fa-tachometer-alt me-3"></i>Admin Dashboard
                    </h1>
                    <p class="mb-0 opacity-75 fs-5">Kelola toko dessert Anda dari sini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-3 mb-5">
        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-card stat-products">
                    <div class="stat-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $totalProducts }}</h3>
                        <p>Total Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card stat-orders">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Total Pesanan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card stat-revenue">
                    <div class="stat-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                        <p>Total Pendapatan</p>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Quick Actions & Status Pesanan -->
        <div class="row mb-5">
            <div class="col-md-8">
                <!-- Quick Actions Card yang Lebih Menarik -->
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0 text-primary fw-bold">
                            <i class="fas fa-bolt me-2"></i>Quick Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Tambah Produk -->
                            <div class="col-md-6">
                                <a href="{{ route('products.create') }}" class="quick-action-card action-primary">
                                    <div class="action-icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="action-content">
                                        <h6>Tambah Produk Baru</h6>
                                        <p>Buat produk dessert baru</p>
                                    </div>
                                    <div class="action-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Kelola Produk -->
                            <div class="col-md-6">
                                <a href="{{ route('products.index') }}" class="quick-action-card action-secondary">
                                    <div class="action-icon">
                                        <i class="fas fa-list"></i>
                                    </div>
                                    <div class="action-content">
                                        <h6>Kelola Produk</h6>
                                        <p>Edit dan kelola produk</p>
                                    </div>
                                    <div class="action-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Kelola Pesanan -->
                            <div class="col-md-6">
                                <a href="{{ route('admin.orders.index') }}" class="quick-action-card action-success">
                                    <div class="action-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="action-content">
                                        <h6>Kelola Pesanan</h6>
                                        <p>Lihat semua pesanan</p>
                                    </div>
                                    <div class="action-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                        
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- Status Pesanan Card -->
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0 text-primary fw-bold">
                            <i class="fas fa-clipboard-list me-2"></i>Status Pesanan
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
                            $processingOrders = \App\Models\Order::where('status', 'processing')->count();
                            $completedOrders = \App\Models\Order::where('status', 'completed')->count();
                            $cancelledOrders = \App\Models\Order::where('status', 'cancelled')->count();
                        @endphp
                        
                        <div class="status-item mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="status-indicator bg-warning"></div>
                                    <span class="fw-semibold ms-2">Pending</span>
                                </div>
                                <strong class="fs-5">{{ $pendingOrders }}</strong>
                            </div>
                            <div class="status-progress">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" style="width: {{ $totalOrders > 0 ? ($pendingOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="status-item mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="status-indicator bg-info"></div>
                                    <span class="fw-semibold ms-2">Processing</span>
                                </div>
                                <strong class="fs-5">{{ $processingOrders }}</strong>
                            </div>
                            <div class="status-progress">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-info" style="width: {{ $totalOrders > 0 ? ($processingOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="status-item mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="status-indicator bg-success"></div>
                                    <span class="fw-semibold ms-2">Completed</span>
                                </div>
                                <strong class="fs-5">{{ $completedOrders }}</strong>
                            </div>
                            <div class="status-progress">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: {{ $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="status-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="status-indicator bg-danger"></div>
                                    <span class="fw-semibold ms-2">Cancelled</span>
                                </div>
                                <strong class="fs-5">{{ $cancelledOrders }}</strong>
                            </div>
                            <div class="status-progress">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-danger" style="width: {{ $totalOrders > 0 ? ($cancelledOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-primary fw-bold">
                            <i class="fas fa-clock me-2"></i>Pesanan Terbaru
                        </h5>
                        @if($totalOrders > 0)
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-list me-2"></i>Lihat Semua
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if($recentOrders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Telepon</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Metode Bayar</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentOrders as $order)
                                        <tr>
                                            <td>
                                                <div class="order-id-badge bg-primary text-white rounded-2 px-2 py-1 text-center">
                                                    #{{ $order->id }}
                                                </div>
                                            </td>
                                            <td class="fw-semibold">{{ $order->nama }}</td>
                                            <td>{{ $order->telepon }}</td>
                                            <td class="fw-bold text-success">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge status-badge-{{ $order->status }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                                            <br>
                                                <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <i class="fas fa-credit-card me-1"></i>{{ $order->metode_pembayaran }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-edit me-1"></i>Ubah Status
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted mb-2">Belum ada pesanan</h5>
                                <p class="text-muted">Belum ada pesanan yang masuk ke sistem.</p>
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                                    <i class="fas fa-cash-register me-2"></i>Proses Checkout Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Header */
.header-section-full {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin-left: calc(var(--bs-gutter-x) * -0.5);
    margin-right: calc(var(--bs-gutter-x) * -0.5);
}

/* Stat Cards dengan Warna Berbeda */
.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.stat-products { border-left: 4px solid #4e73df; }
.stat-orders { border-left: 4px solid #1cc88a; }
.stat-revenue { border-left: 4px solid #36b9cc; }
.stat-users { border-left: 4px solid #f6c23e; }

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: white;
}

.stat-products .stat-icon { background: linear-gradient(135deg, #4e73df, #7a8de6); }
.stat-orders .stat-icon { background: linear-gradient(135deg, #1cc88a, #3cd49c); }
.stat-revenue .stat-icon { background: linear-gradient(135deg, #36b9cc, #5cccdd); }
.stat-users .stat-icon { background: linear-gradient(135deg, #f6c23e, #f8d568); }

.stat-info h3 {
    font-size: 2rem;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.stat-info p {
    color: #666;
    margin-bottom: 0;
    font-weight: 600;
}

/* Quick Action Cards */
.quick-action-card {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    height: 100%;
}

.quick-action-card:hover {
    transform: translateY(-3px);
    text-decoration: none;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.action-primary { border-left: 4px solid #4e73df; }
.action-secondary { border-left: 4px solid #6c757d; }
.action-success { border-left: 4px solid #1cc88a; }
.action-info { border-left: 4px solid #36b9cc; }
.action-warning { border-left: 4px solid #f6c23e; }
.action-danger { border-left: 4px solid #e74a3b; }

.action-primary:hover { border-color: #4e73df; background: rgba(78, 115, 223, 0.05); }
.action-secondary:hover { border-color: #6c757d; background: rgba(108, 117, 125, 0.05); }
.action-success:hover { border-color: #1cc88a; background: rgba(28, 200, 138, 0.05); }
.action-info:hover { border-color: #36b9cc; background: rgba(54, 185, 204, 0.05); }
.action-warning:hover { border-color: #f6c23e; background: rgba(246, 194, 62, 0.05); }
.action-danger:hover { border-color: #e74a3b; background: rgba(231, 74, 59, 0.05); }

.action-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    font-size: 1.25rem;
    color: white;
}

.action-primary .action-icon { background: linear-gradient(135deg, #4e73df, #7a8de6); }
.action-secondary .action-icon { background: linear-gradient(135deg, #6c757d, #8a939b); }
.action-success .action-icon { background: linear-gradient(135deg, #1cc88a, #3cd49c); }
.action-info .action-icon { background: linear-gradient(135deg, #36b9cc, #5cccdd); }
.action-warning .action-icon { background: linear-gradient(135deg, #f6c23e, #f8d568); }
.action-danger .action-icon { background: linear-gradient(135deg, #e74a3b, #eb6659); }

.action-content {
    flex: 1;
}

.action-content h6 {
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: #2c3e50;
}

.action-content p {
    margin-bottom: 0;
    color: #6c757d;
    font-size: 0.875rem;
}

.action-arrow {
    color: #6c757d;
    transition: transform 0.3s ease;
}

.quick-action-card:hover .action-arrow {
    transform: translateX(3px);
    color: #4e73df;
}

/* Status Items  */
.status-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.status-progress .progress {
    background-color: #f8f9fa;
    border-radius: 10px;
}

.status-progress .progress-bar {
    border-radius: 10px;
}

/* Order ID Badge */
.order-id-badge {
    font-size: 0.75rem;
    font-weight: 600;
    min-width: 70px;
}

/* Status Badges */
.status-badge-pending { background: rgba(255, 193, 7, 0.15); color: #856404; border: 1px solid rgba(255, 193, 7, 0.3); }
.status-badge-processing { background: rgba(23, 162, 184, 0.15); color: #004085; border: 1px solid rgba(23, 162, 184, 0.3); }
.status-badge-completed { background: rgba(40, 167, 69, 0.15); color: #155724; border: 1px solid rgba(40, 167, 69, 0.3); }
.status-badge-cancelled { background: rgba(220, 53, 69, 0.15); color: #721c24; border: 1px solid rgba(220, 53, 69, 0.3); }

/* Responsive */
@media (max-width: 768px) {
    .header-section-full {
        margin-left: 0;
        margin-right: 0;
        border-radius: 0;
        padding: 2rem 1rem;
    }
    
    .quick-action-card {
        padding: 1rem;
    }
    
    .action-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
        margin-right: 0.75rem;
    }
    
    .stat-info h3 {
        font-size: 1.5rem;
    }
}
</style>
@endsection