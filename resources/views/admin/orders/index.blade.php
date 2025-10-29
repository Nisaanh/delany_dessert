@extends('layouts.app')

@section('title', 'Kelola Pesanan - Delany Dessert')

@section('content')
<div class="container-fluid">
    <div class="header-section bg-gradient-primary text-white p-4 mb-4 shadow">
    <div class="text-center">
        <h1 class="mb-2 fw-bold">
            <i class="fas fa-shopping-cart me-3"></i>Kelola Pesanan
        </h1>
        <p class="mb-9 opacity-75 fs-5">
            Kelola semua pesanan customer dengan mudah dan efisien
        </p>
    </div>
</div>


    <!-- Filter Section -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label class="form-label text-muted small mb-1">Filter Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small mb-1">Tanggal</label>
                    <input type="date" class="form-control" id="dateFilter">
                </div>
                <div class="col-md-4">
                    <label class="form-label text-muted small mb-1">Cari Pesanan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Cari berdasarkan nama, telepon, atau ID...">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label text-muted small mb-1">&nbsp;</label>
                    <button class="btn btn-outline-secondary w-100" id="resetFilter">
                        <i class="fas fa-refresh me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card stat-pending">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ \App\Models\Order::where('status', 'pending')->count() }}</h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-processing">
                <div class="stat-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ \App\Models\Order::where('status', 'processing')->count() }}</h3>
                    <p>Processing</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-completed">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ \App\Models\Order::where('status', 'completed')->count() }}</h3>
                    <p>Completed</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-cancelled">
                <div class="stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ \App\Models\Order::where('status', 'cancelled')->count() }}</h3>
                    <p>Cancelled</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-transparent border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary fw-bold">
                    <i class="fas fa-list me-2"></i>Daftar Semua Pesanan
                </h5>
            </div>
        </div>
        <div class="card-body">
            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="ordersTable">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th>ID Pesanan</th>
                                <th>Customer</th>
                                <th>Telepon</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Metode Bayar</th>
                                <th>Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="order-row" 
    data-status="{{ $order->status }}" 
    data-date="{{ $order->created_at->format('Y-m-d') }}">

                                <td class="ps-4">
                                    <div class="form-check">
                                        <input class="form-check-input order-checkbox" type="checkbox" value="{{ $order->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="order-id-badge bg-primary text-white rounded-2 px-2 py-1 me-2">
                                            #{{ $order->id }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="customer-info">
                                        <strong class="d-block">{{ $order->nama }}</strong>
                                        @if($order->user)
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>{{ $order->user->name }}
                                            </small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="phone-info">
                                        <i class="fas fa-phone text-muted me-2"></i>
                                        {{ $order->telepon }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-success">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select status-select status-{{ $order->status }}" 
                                                onchange="this.form.submit()">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                🟡 Pending
                                            </option>
                                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                🔵 Processing
                                            </option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                🟢 Completed
                                            </option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                🔴 Cancelled
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <span class="badge payment-badge">
                                        <i class="fas fa-credit-card me-1"></i>
                                        {{ $order->metode_pembayaran }}
                                    </span>
                                </td>
                                <td>
                                    <div class="date-info">
                                        <div class="fw-semibold">{{ $order->created_at->format('d M Y') }}</div>
                                        <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" 
                                           class="btn btn-outline-primary" 
                                           data-bs-toggle="tooltip" 
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn btn-outline-success quick-action-btn" 
                                                data-order-id="{{ $order->id }}"
                                                data-bs-toggle="tooltip" 
                                                title="Quick Actions">
                                            <i class="fas fa-bolt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Bulk Actions -->
                <div class="row align-items-center mt-3" id="bulkActions" style="display: none;">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <span class="text-muted me-3" id="selectedCount">0 pesanan terpilih</span>
                            <select class="form-select form-select-sm me-2" style="width: auto;" id="bulkStatus">
                                <option value="">Ubah Status...</option>
                                <option value="processing">Processing</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <button class="btn btn-sm btn-primary" id="applyBulkAction">Terapkan</button>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted small">
                        Menampilkan {{ $orders->firstItem() }} - {{ $orders->lastItem() }} dari {{ $orders->total() }} pesanan
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted mb-3">Belum ada pesanan</h4>
                        <p class="text-muted mb-4">Belum ada pesanan yang masuk ke sistem.</p>
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                            <i class="fas fa-cash-register me-2"></i>Proses Checkout
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions Modal -->
<div class="modal fade" id="quickActionsModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick Actions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-warning quick-status-btn" data-status="processing">
                        <i class="fas fa-cog me-2"></i>Set Processing
                    </button>
                    <button class="btn btn-success quick-status-btn" data-status="completed">
                        <i class="fas fa-check me-2"></i>Set Completed
                    </button>
                    <button class="btn btn-danger quick-status-btn" data-status="cancelled">
                        <i class="fas fa-times me-2"></i>Set Cancelled
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.header-section {
background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    text-align: center;
    color: white;
    padding: 3rem 1rem;
}

.header-section h1 {
    font-weight: 800;
    font-size: 2.5rem;
}

.header-section p {
    font-size: 1.1rem;
    opacity: 0.9;
}


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

.stat-pending { border-left: 4px solid #ffc107; }
.stat-processing { border-left: 4px solid #17a2b8; }
.stat-completed { border-left: 4px solid #28a745; }
.stat-cancelled { border-left: 4px solid #dc3545; }

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.25rem;
}

.stat-pending .stat-icon { background: rgba(255, 193, 7, 0.2); color: #ffc107; }
.stat-processing .stat-icon { background: rgba(23, 162, 184, 0.2); color: #17a2b8; }
.stat-completed .stat-icon { background: rgba(40, 167, 69, 0.2); color: #28a745; }
.stat-cancelled .stat-icon { background: rgba(220, 53, 69, 0.2); color: #dc3545; }

.stat-info h3 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.stat-info p {
    color: #666;
    margin-bottom: 0;
    font-weight: 500;
}

.status-select {
    border: 2px solid transparent;
    border-radius: 8px;
    padding: 6px 10px;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
    min-width: 140px;
    font-size: 0.875rem;
}

.status-pending { background: rgba(255, 193, 7, 0.1); color: #856404; }
.status-processing { background: rgba(23, 162, 184, 0.1); color: #004085; }
.status-completed { background: rgba(40, 167, 69, 0.1); color: #155724; }
.status-cancelled { background: rgba(220, 53, 69, 0.1); color: #721c24; }

.status-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(var(--primary-color-rgb), 0.1);
    outline: none;
}

.order-id-badge {
    font-size: 0.75rem;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
}

.payment-badge {
    background: rgba(108, 117, 125, 0.1) !important;
    color: #6c757d !important;
    border: 1px solid rgba(108, 117, 125, 0.2);
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
}

.customer-info, .phone-info, .date-info {
    font-size: 0.875rem;
}

.order-row:hover {
    background-color: rgba(0, 123, 255, 0.02) !important;
    transform: scale(1.002);
    transition: all 0.2s ease;
}

.empty-state {
    padding: 3rem 1rem;
}

.table > :not(caption) > * > * {
    padding: 1rem 0.75rem;
}

.btn-group .btn {
    border-radius: 6px !important;
    margin: 0 2px;
}

#bulkActions {
    background: rgba(0, 123, 255, 0.05);
    border-radius: 8px;
    padding: 1rem;
    border: 1px solid rgba(0, 123, 255, 0.1);
}

@media (max-width: 768px) {
    .header-section {
        text-align: center;
        padding: 2rem 1rem !important;
    }
    
    .stat-card {
        margin-bottom: 1rem;
    }
    
    .btn-group {
        display: flex;
        flex-direction: column;
    }
    
    .btn-group .btn {
        margin: 2px 0;
        border-radius: 6px !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const dateFilter = document.getElementById('dateFilter');
    const searchInput = document.getElementById('searchInput');
    const resetFilter = document.getElementById('resetFilter');
    const ordersTable = document.getElementById('ordersTable');
    const orderRows = ordersTable ? ordersTable.querySelectorAll('.order-row') : [];

   function filterOrders() {
    const statusValue = statusFilter.value;
    const dateValue = dateFilter.value;
    const searchValue = searchInput.value.toLowerCase();

    orderRows.forEach(row => {
        let showRow = true;

        // Filter by status
        if (statusValue && row.dataset.status !== statusValue) {
            showRow = false;
        }

        // Filter by date
        if (dateValue && row.dataset.date !== dateValue) {
            showRow = false;
        }

        // Filter by search
        if (searchValue) {
            const rowText = row.textContent.toLowerCase();
            if (!rowText.includes(searchValue)) {
                showRow = false;
            }
        }

        row.style.display = showRow ? '' : 'none';
    });
}


    if (statusFilter) statusFilter.addEventListener('change', filterOrders);
    if (dateFilter) dateFilter.addEventListener('change', filterOrders);
    if (searchInput) searchInput.addEventListener('input', filterOrders);
    if (resetFilter) resetFilter.addEventListener('click', function() {
        statusFilter.value = '';
        dateFilter.value = '';
        searchInput.value = '';
        filterOrders();
    });

    // Bulk actions
    const selectAll = document.getElementById('selectAll');
    const orderCheckboxes = document.querySelectorAll('.order-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    const bulkStatus = document.getElementById('bulkStatus');
    const applyBulkAction = document.getElementById('applyBulkAction');

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            orderCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            updateBulkActions();
        });
    }

    orderCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActions);
    });

    function updateBulkActions() {
        const selectedCountValue = document.querySelectorAll('.order-checkbox:checked').length;
        selectedCount.textContent = `${selectedCountValue} pesanan terpilih`;
        
        if (selectedCountValue > 0) {
            bulkActions.style.display = 'flex';
        } else {
            bulkActions.style.display = 'none';
        }
    }

    if (applyBulkAction) {
        applyBulkAction.addEventListener('click', function() {
            const status = bulkStatus.value;
            if (!status) {
                alert('Pilih status terlebih dahulu!');
                return;
            }

            const selectedOrders = Array.from(document.querySelectorAll('.order-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (confirm(`Ubah status ${selectedOrders.length} pesanan menjadi ${status}?`)) {
                // Implement bulk status update here
                console.log('Updating orders:', selectedOrders, 'to status:', status);
                // You would typically make an AJAX request here
            }
        });
    }

    // Quick actions modal
    const quickActionBtns = document.querySelectorAll('.quick-action-btn');
    const quickActionsModal = new bootstrap.Modal(document.getElementById('quickActionsModal'));
    let currentOrderId = null;

    quickActionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            currentOrderId = this.dataset.orderId;
            quickActionsModal.show();
        });
    });

    const quickStatusBtns = document.querySelectorAll('.quick-status-btn');
    quickStatusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const status = this.dataset.status;
            if (confirm(`Ubah status pesanan #${currentOrderId} menjadi ${status}?`)) {
                // Implement quick status update here
                console.log('Quick update order:', currentOrderId, 'to status:', status);
                quickActionsModal.hide();
            }
        });
    });

    // Auto-hide bulk actions when no checkboxes are checked
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#bulkActions') && !e.target.matches('.order-checkbox') && !e.target.matches('#selectAll')) {
            const checkedBoxes = document.querySelectorAll('.order-checkbox:checked');
            if (checkedBoxes.length === 0) {
                bulkActions.style.display = 'none';
                if (selectAll) selectAll.checked = false;
            }
        }
    });
});
</script>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
    });
</script>
@endif
@endsection