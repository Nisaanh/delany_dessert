@extends('layouts.app')

@section('title', 'Keranjang Belanja - Delany Dessert')

@section('content')
<div class="header-section">
    <h1>Keranjang Belanja</h1>
    <p>Review pesanan Anda sebelum checkout</p>
</div>

<div class="container mb-5">
    @if($cart->item_count > 0)
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-shopping-cart me-2"></i>
                        Item dalam Keranjang ({{ $cart->item_count }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @foreach($cart->items as $item)
                    <div class="cart-item p-4 border-bottom">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="img-fluid rounded" style="height: 80px; object-fit: cover;">
                                @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="height: 80px; width: 80px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <h6 class="mb-1">{{ $item->product->name }}</h6>
                                <small class="text-muted">{{ $item->product->category->name }}</small>
                            </div>
                            <div class="col-md-2">
                                <span class="fw-bold">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</span>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    @method('PUT')
                                    <select name="quantity" class="form-select form-select-sm" onchange="this.form.submit()">
                                        @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-2 text-end">
                                <span class="fw-bold text-primary">Rp {{ number_format($item->total_price, 0, ',', '.') }}</span>
                                <form action="{{ route('cart.remove', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ms-2" 
                                            onclick="return confirm('Hapus produk dari keranjang?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Lanjutkan Belanja
                </a>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" 
                            onclick="return confirm('Kosongkan seluruh keranjang?')">
                        <i class="fas fa-trash me-2"></i>Kosongkan Keranjang
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 100px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-receipt me-2"></i>
                        Ringkasan Belanja
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Item:</span>
                        <span>{{ $cart->item_count }} item</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total Harga:</span>
                        <span class="fw-bold text-primary fs-5">
                            Rp {{ number_format($cart->total_amount, 0, ',', '.') }}
                        </span>
                    </div>
                    <hr>
                    <button class="btn btn-primary w-100 py-2" onclick="showCheckoutAlert()">
                        <i class="fas fa-credit-card me-2"></i>Proses Checkout
                    </button>
                    <small class="text-muted d-block mt-2 text-center">
                        *Fitur checkout sedang dalam pengembangan
                    </small>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <div class="empty-cart-icon mb-4">
            <i class="fas fa-shopping-cart fa-4x text-muted"></i>
        </div>
        <h4 class="text-muted mb-3">Keranjang Belanja Kosong</h4>
        <p class="text-muted mb-4">Yuk, tambahkan produk favorit Anda ke keranjang!</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-shopping-bag me-2"></i>Mulai Belanja
        </a>
    </div>
    @endif
</div>

<style>
.cart-item {
    transition: background-color 0.3s ease;
}

.cart-item:hover {
    background-color: #f8f9fa;
}

.empty-cart-icon {
    opacity: 0.5;
}

.sticky-top {
    position: sticky;
    z-index: 10;
}
</style>

<script>
function showCheckoutAlert() {
    alert('Fitur checkout sedang dalam pengembangan. Terima kasih!');
}
</script>
@endsection