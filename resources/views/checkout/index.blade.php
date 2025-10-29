@extends('layouts.app')

@section('title', 'Checkout - Delany Dessert')

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Validation Error!</strong>
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@section('content')
<div class="header-section">
    <h1>Checkout</h1>
    <p>Lengkapi data pengiriman dan pilih metode pembayaran</p>
</div>

<div class="container mb-5">
    @if($cart && $cart->item_count > 0)
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" value="{{ old('nama', Auth::user()->name ?? '') }}" class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror" required>
                            @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan Pesanan (opsional)</label>
                            <textarea name="catatan" rows="2" class="form-control">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Metode Pembayaran <span class="text-danger">*</span></label>
                            <div class="btn-group" role="group" aria-label="Metode Pembayaran">
                                @php
                                $methods = ['Tunai','Dana','OVO','Gopay'];
                                @endphp
                                @foreach($methods as $m)
                                <input type="radio" class="btn-check" name="metode_pembayaran" id="pay_{{ $m }}" value="{{ $m }}" {{ old('metode_pembayaran') == $m ? 'checked' : (!$loop->first ? '' : 'checked') }}>
                                <label class="btn btn-outline-secondary me-1" for="pay_{{ $m }}">{{ $m }}</label>
                                @endforeach
                            </div>
                            @error('metode_pembayaran')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Keranjang
                            </a>

                            <button type="submit" class="btn btn-primary btn-lg" id="btnCheckout">
                                <i class="fas fa-credit-card me-2"></i> Proses Checkout
                            </button>
                        </div>
                    </form>
                </div>
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
                    @foreach($cart->items as $item)
                    <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                        <div class="d-flex align-items-center">
                            @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                <i class="fas fa-image text-muted fa-xs"></i>
                            </div>
                            @endif
                            <div>
                                <small class="d-block fw-bold">{{ $item->product->name }}</small>
                                <small class="text-muted">{{ $item->quantity }} × Rp {{ number_format($item->unit_price, 0, ',', '.') }}</small>
                            </div>
                        </div>
                        <small class="fw-bold">Rp {{ number_format($item->total_price, 0, ',', '.') }}</small>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-between mb-2 mt-3">
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
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Dengan mengklik "Proses Checkout", Anda menyetujui syarat dan ketentuan kami.
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
        <p class="text-muted mb-4">Silakan tambahkan produk ke keranjang terlebih dahulu sebelum checkout.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-shopping-bag me-2"></i>Mulai Belanja
        </a>
    </div>
    @endif
</div>

<style>
    .btn-primary {
        background: linear-gradient(180deg, #f7a6c0, #f08fb5);
        border: none;
        box-shadow: 0 6px 18px rgba(240, 143, 181, 0.12);
    }

    .header-section h1 {
        font-weight: 700;
        color: #6b3a4a;
    }

    .sticky-top {
        position: sticky;
        z-index: 10;
    }

</style>
@endsection
