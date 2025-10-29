@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id . ' - Delany Dessert')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="header-section bg-gradient-primary text-white p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-1">Detail Pesanan #{{ $order->id }}</h1>
                <p class="mb-0 opacity-75">Informasi lengkap pesanan customer</p>
            </div>
            <div class="text-end">
                <div class="order-status-badge mb-2">
                    @php
                    $statusColors = [
                    'pending' => 'warning',
                    'processing' => 'info',
                    'completed' => 'success',
                    'cancelled' => 'danger'
                    ];
                    $statusColor = $statusColors[strtolower($order->status)] ?? 'secondary';
                    @endphp
                    <span class="badge bg-{{ $statusColor }} fs-6 px-3 py-2">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Informasi Utama -->
        <div class="col-lg-8">
            <!-- Card Informasi Customer -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-user me-2"></i>Informasi Customer
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Nama Lengkap</label>
                                <div class="fs-6 fw-semibold">{{ $order->nama }}</div>
                            </div>
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Nomor Telepon</label>
                                <div class="fs-6 fw-semibold">
                                    <i class="fas fa-phone me-2 text-muted"></i>{{ $order->telepon }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Alamat Pengiriman</label>
                                <div class="fs-6 fw-semibold">
                                    <i class="fas fa-map-marker-alt me-2 text-muted"></i>{{ $order->alamat }}
                                </div>
                            </div>
                            @if($order->user)
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Akun Terdaftar</label>
                                <div class="fs-6 fw-semibold">
                                    <i class="fas fa-user-circle me-2 text-muted"></i>
                                    {{ $order->user->name }}
                                    <small class="text-muted">({{ $order->user->email }})</small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Detail Pesanan -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-receipt me-2"></i>Detail Pesanan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Status Pesanan</label>
                                <div>
                                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select status-select" onchange="this.form.submit()">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>🟡 Pending</option>
                                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>🔵 Processing</option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>🟢 Completed</option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>🔴 Cancelled</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Total Pembayaran</label>
                                <div class="fs-4 fw-bold text-success">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Metode Pembayaran</label>
                                <div class="fs-6 fw-semibold">
                                    <span class="badge bg-primary py-2 px-3">
                                        <i class="fas fa-credit-card me-2"></i>{{ $order->metode_pembayaran }}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item mb-3">
                                <label class="form-label text-muted small mb-1">Tanggal Pesanan</label>
                                <div class="fs-6 fw-semibold">
                                    <i class="fas fa-calendar me-2 text-muted"></i>
                                    {{ $order->created_at->format('d M Y') }}
                                    <small class="text-muted">at {{ $order->created_at->format('H:i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($order->catatan)
                    <div class="mt-4">
                        <label class="form-label text-muted small mb-2">Catatan Khusus dari Customer</label>
                        <div class="alert alert-light border">
                            <div class="d-flex">
                                <i class="fas fa-sticky-note text-warning me-3 mt-1"></i>
                                <div class="fst-italic">"{{ $order->catatan }}"</div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="col-lg-4">
            <!-- Quick Actions Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="processing">
                            <button type="submit" class="btn btn-warning w-100 py-3 action-btn">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-cog fa-lg me-3"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Proses Pesanan</div>
                                        <small class="opacity-75">Ubah status menjadi processing</small>
                                    </div>
                                </div>
                            </button>
                        </form>

                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-success w-100 py-3 action-btn">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check-circle fa-lg me-3"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Selesaikan Pesanan</div>
                                        <small class="opacity-75">Tandai sebagai completed</small>
                                    </div>
                                </div>
                            </button>
                        </form>

                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="btn btn-danger w-100 py-3 action-btn" onclick="return confirm('Yakin ingin membatalkan pesanan ini? Tindakan ini tidak dapat dibatalkan.')">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-times-circle fa-lg me-3"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Batalkan Pesanan</div>
                                        <small class="opacity-75">Tandai sebagai cancelled</small>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-info-circle me-2"></i>Ringkasan Pesanan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="order-timeline">
                        @php
                        $currentStatusLower = strtolower($order->status);
                        @endphp
                        <div class="timeline-item {{ in_array($currentStatusLower, ['pending', 'processing', 'completed']) ? 'active' : '' }}">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <div class="fw-bold">Pesanan Dibuat</div>
                                <small class="text-muted">{{ $order->created_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        <div class="timeline-item {{ in_array($currentStatusLower, ['processing', 'completed']) ? 'active' : '' }}">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <div class="fw-bold">Sedang Diproses</div>
                                <small class="text-muted">Pesanan sedang disiapkan</small>
                            </div>
                        </div>
                        <div class="timeline-item {{ in_array($currentStatusLower, ['completed']) ? 'active' : '' }}">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <div class="fw-bold">Selesai</div>
                                <small class="text-muted">Pesanan telah selesai</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .status-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 8px 12px;
        font-weight: 500;
        transition: all 0.3s ease;
        background: white;
        min-width: 150px;
    }

    .status-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(var(--primary-color-rgb), 0.1);
        outline: none;
    }

    .action-btn {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        text-transform: none;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .info-item {
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fa;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .order-timeline {
        position: relative;
        padding-left: 20px;
    }

    .timeline-item {
        position: relative;
        padding: 15px 0;
        border-left: 2px solid #e9ecef;
    }

    .timeline-item.active {
        border-left-color: var(--primary-color);
    }

    .timeline-item:last-child {
        border-left: 2px solid transparent;
    }

    .timeline-marker {
        position: absolute;
        left: -11px;
        top: 20px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #e9ecef;
        border: 3px solid white;
    }

    .timeline-item.active .timeline-marker {
        background: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(var(--primary-color-rgb), 0.2);
    }

    .timeline-content {
        padding-left: 15px;
    }

    .order-status-badge .badge {
        font-size: 0.9rem !important;
        padding: 8px 16px !important;
        border-radius: 20px !important;
    }

    .alert-light {
        background: rgba(255, 193, 7, 0.1);
        border-left: 4px solid #ffc107;
    }

</style>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success'
            , title: 'Berhasil!'
            , text: '{{ session('
            success ') }}'
            , timer: 3000
            , showConfirmButton: false
        });
    });

</script>
@endif
@endsection
