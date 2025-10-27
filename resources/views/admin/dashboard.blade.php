@extends('layouts.app')

@section('title', 'Admin Dashboard - Delany Dessert')

@section('content')
<div class="header-section">
    <h1>Admin Dashboard</h1>
    <p>Kelola toko dessert Anda dari sini</p>
</div>

<div class="container mb-5">
    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card">
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
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalCategories }}</h3>
                    <p>Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total User</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('products.create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Produk
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-list me-2"></i>Kelola Produk
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-eye me-2"></i>Lihat Toko
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.index') }}?category=" class="btn btn-outline-info w-100">
                                <i class="fas fa-tags me-2"></i>Kelola Kategori
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.stat-icon i {
    font-size: 1.5rem;
    color: white;
}

.stat-info h3 {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.stat-info p {
    color: #666;
    margin-bottom: 0;
}
</style>
@endsection