@extends('layouts.app')

@section('title', 'Checkout Berhasil - Delany Dessert')

@section('content')
<div class="header-section">
    <h1>Checkout Berhasil!</h1>
    <p>Terima kasih telah berbelanja di Delany Dessert</p>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-5">
                    <!-- Success Icon -->
                    <div class="success-animation mb-4">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" width="80" height="80">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                    
                    <h2 class="text-success mb-3">Pesanan Berhasil!</h2>
                    <p class="text-muted mb-4">{{ session('message') }}</p>
                    
                    @if(isset($order))
                    <div class="order-info bg-light p-3 rounded mb-4">
                        <p class="mb-2"><strong>Nomor Pesanan:</strong> #{{ $order->id }}</p>
                        <p class="mb-2"><strong>Total:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        <p class="mb-0"><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
                    </div>
                    @endif

                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Lanjutkan Belanja
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.success-animation {
    display: flex;
    justify-content: center;
    align-items: center;
}

.checkmark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke-miterlimit: 10;
    stroke: #28a745;
    fill: none;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #fff;
    stroke-miterlimit: 10;
    margin: 0 auto;
    box-shadow: inset 0px 0px 0px #28a745;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes scale {
    0%, 100% {
        transform: none;
    }
    50% {
        transform: scale3d(1.1, 1.1, 1);
    }
}

@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 40px #28a745;
    }
}

.btn-primary {
    background: linear-gradient(180deg, #f7a6c0, #f08fb5);
    border: none;
    box-shadow: 0 6px 18px rgba(240,143,181,0.12);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Otomatis scroll ke atas
    window.scrollTo(0, 0);
    
    // Hapus cart dari localStorage jika ada
    if (typeof(Storage) !== "undefined") {
        localStorage.removeItem('cart');
    }
    
    // Tampilkan animasi sukses
    setTimeout(function() {
        document.querySelector('.success-animation').style.opacity = '1';
    }, 100);
});
</script>
@endsection