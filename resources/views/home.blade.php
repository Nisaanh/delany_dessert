@extends('layouts.app')

@section('title', 'Beranda - Delany Dessert')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Selamat Datang di Delany Dessert</h1>
            <p class="hero-subtitle">Affordable Yummy Desserts - Dessert Berkualitas dengan Harga Terjangkau.</p>
            <div class="hero-actions">
                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg hero-btn">
                    <i class="fas fa-shopping-bag me-2"></i> Lihat Semua Produk
                </a>
                <a href="#featured-products" class="btn btn-outline-light btn-lg hero-btn">
                    <i class="fas fa-star me-2"></i> Produk Unggulan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="featured-products" class="section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Produk Unggulan</h2>
            <p class="section-subtitle">Pilihan terbaik dari koleksi kami</p>
        </div>

        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-md-6 col-lg-4">
                <div class="product-card featured">
                    <div class="product-image-container">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                        <div class="product-image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        @endif
                        <span class="product-badge featured-badge">
                            <i class="fas fa-star me-1"></i> Unggulan
                        </span>
                    </div>
                    <div class="product-body">
                        <span class="product-category">{{ $product->category->name }}</span>
                        <h5 class="product-name">{{ $product->name }}</h5>
                        <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                        <div class="product-footer">
                            <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="empty-state">
                    <i class="fas fa-star fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada produk unggulan</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Kategori Produk</h2>
            <p class="section-subtitle">Telusuri berdasarkan kategori favorit Anda</p>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($categories as $category)
            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="category-card text-center">
                    <div class="category-icon mx-auto">
                        <i class="fas fa-box"></i>
                    </div>
                    <h5 class="category-name">{{ $category->name }}</h5>
                    <p class="category-count">{{ $category->products->count() }} produk tersedia</p>
                    <a href="{{ route('products.index') }}?category={{ $category->id }}" class="category-link">
                        Lihat Produk <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="empty-state">
                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada kategori</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <h3 class="stat-number">100+</h3>
                    <p class="stat-label">Produk Terjual</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <h3 class="stat-number">50+</h3>
                    <p class="stat-label">Pelanggan Setia</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <h3 class="stat-number">15+</h3>
                    <p class="stat-label">Varian Produk</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <h3 class="stat-number">99%</h3>
                    <p class="stat-label">Kepuasan Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-css')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)),
        url("{{ asset('hero.jpg') }}") center center/cover no-repeat;
        color: white;
        padding: 4rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 30vh;
        display: flex;
        align-items: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        line-height: 1.2;
        animation: fadeInUp 0.8s ease-out;
    }

    .hero-subtitle {
        font-size: 1.4rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
        line-height: 1.6;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .hero-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .hero-btn {
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        z-index: 10;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .hero-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        text-decoration: none !important;
    }

    .hero-btn:active {
        transform: translateY(-1px);
    }

    .hero-section .btn-light {
        background-color: white !important;
        color: var(--primary-color) !important;
        border-color: white !important;
    }

    .hero-section .btn-light:hover {
        background-color: var(--accent-color) !important;
        color: var(--dark-color) !important;
        border-color: var(--accent-color) !important;
    }

    .hero-section .btn-outline-light {
        background-color: transparent !important;
        color: white !important;
        border-color: white !important;
        backdrop-filter: blur(5px);
    }

    .hero-section .btn-outline-light:hover {
        background-color: white !important;
        color: var(--primary-color) !important;
        border-color: white !important;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Floating animation for visual interest */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 20%;
        right: 10%;
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite 1s;
    }

    .section-padding {
        padding: 5rem 0;
    }

    .section-header {
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 2.5rem;
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .section-subtitle {
        color: #666;
        font-size: 1.1rem;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .product-card.featured {
        border: 2px solid var(--secondary-color);
    }

    .product-image-container {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-image-placeholder {
        width: 100%;
        height: 100%;
        background: var(--accent-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ccc;
    }

    .product-image-placeholder i {
        font-size: 3rem;
    }

    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--secondary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .featured-badge {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        color: #000;
        top: 10px;
        left: 10px;
        right: auto;
    }

    .product-body {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-category {
        color: var(--secondary-color);
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .product-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 0.5rem;
    }

    .product-description {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        gap: 1rem;
    }

    .product-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-color);
        flex-shrink: 0;
    }

    .category-card {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 320px;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .category-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--accent-color) 0%, var(--secondary-color) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .category-icon i {
        font-size: 2rem;
        color: white;
    }

    .category-name {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        text-align: center;
    }

    .category-count {
        color: #666;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        text-align: center;
    }

    .category-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: center;
    }

    .category-link:hover {
        color: var(--secondary-color);
        transform: translateX(5px);
    }

    .row.justify-content-center {
        justify-content: center !important;
    }

    .col-md-6.col-lg-4.d-flex.justify-content-center {
        display: flex;
        justify-content: center;
    }

    .stat-item {
        padding: 1.5rem;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #666;
        font-size: 1rem;
        font-weight: 500;
    }

    .empty-state {
        padding: 3rem 1rem;
    }

    .empty-state i {
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
        }

        .hero-actions {
            flex-direction: column;
            align-items: center;
        }

        .hero-btn {
            width: 100%;
            max-width: 300px;
            text-align: center;
        }

        .section-padding {
            padding: 3rem 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .category-card {
            padding: 2rem 1.5rem;
            max-width: 280px;
        }

        .product-footer {
            gap: 0.5rem;
        }

        .product-price {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 4rem 0;
        }

        .hero-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }
    }

</style>
@endsection
