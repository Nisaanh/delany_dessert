@extends('layouts.app')

@section('title', 'Daftar Produk - Delany Dessert')

@section('content')
<div class="header-section">
    <h1>Semua Produk</h1>
    <p>Koleksi lengkap dessert lezat kami</p>
</div>

<div class="container mb-5">
    <!-- Kategori Filter -->
    <div class="text-center mb-4">
        <h5 class="fw-bold mb-3" style="color:#3E2723;">Pilih Kategori</h5>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <a href="{{ route('products.index') }}" class="category-tag {{ !$categoryId ? 'active' : '' }}">
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}" class="category-tag {{ $categoryId == $category->id ? 'active' : '' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>

    @if($products->count() > 0)
    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="product-card">
                <div style="position: relative;">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                    <div class="product-image" style="display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                    </div>
                    @endif
                </div>
                <div class="product-body">
                    <span class="product-category">{{ $product->category->name }}</span>
                    <h5 class="product-name">{{ $product->name }}</h5>
                    <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                    
                    <!-- Product Footer dengan Tombol Keranjang -->
                    <div class="product-footer">
                        <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        {{-- <div class="product-actions">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info text-white" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            @auth
                            <form action="{{ route('cart.add', $product) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-sm btn-success" title="Tambah ke Keranjang">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary" title="Login untuk belanja">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            @endauth
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div> --}}
                        <div class="product-actions">
    <!-- Tombol Lihat Detail - Tampil untuk semua -->
    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info text-white" title="Lihat">
        <i class="fas fa-eye"></i>
    </a>
    
    <!-- Tombol Keranjang - Hanya untuk user -->
    @auth
        @if(!auth()->user()->is_admin)
            <form action="{{ route('cart.add', $product) }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-success" title="Tambah ke Keranjang">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </form>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary" title="Login untuk belanja">
            <i class="fas fa-cart-plus"></i>
        </a>
    @endauth
    
    <!-- Tombol Edit & Delete - Hanya untuk Admin -->
    @auth
        @if(auth()->user()->is_admin)
            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        @endif
    @endauth
</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="col-12 mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">
                Menampilkan <strong>{{ $products->firstItem() }}-{{ $products->lastItem() }}</strong>
                dari <strong>{{ $products->total() }}</strong> produk
            </div>

            <ul class="pagination mb-0">
                {{-- Previous Page Link --}}
                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                {{-- Pagination Numbers --}}
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
        <p class="text-muted fs-5">
            @if($categoryId)
            Tidak ada produk dalam kategori ini.
            @else
            Belum ada produk.
            @endif
        </p>
        <a href="{{ route('products.create') }}" class="btn btn-primary mt-2">
            <i class="fas fa-plus me-2"></i>Tambah Produk Sekarang
        </a>
    </div>
    @endif
</div>

<style>
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

    .product-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
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

    .product-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .product-actions .btn {
        padding: 0.4rem 0.6rem;
        font-size: 0.8rem;
    }

    /* Style untuk pagination */
    .pagination {
        margin-bottom: 0;
    }

    .page-link {
        color: var(--primary-color);
        border: 1px solid #dee2e6;
    }

    .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-link:hover {
        color: var(--secondary-color);
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    /* Tombol kategori minimalis */
    .category-tag {
        display: inline-block;
        padding: 0.4rem 1.2rem;
        border-radius: 30px;
        border: 1px solid #d4a574;
        background-color: transparent;
        color: #5c4033;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        background-color: #d4a574;
        color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .category-tag.active {
        background: linear-gradient(135deg, #b37a4c, #d4a574);
        color: #fff;
        border: none;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    /* Responsif di mobile */
    @media (max-width: 768px) {
        .category-tag {
            font-size: 0.85rem;
            padding: 0.35rem 1rem;
        }

        .product-footer {
            flex-direction: column;
            align-items: start;
            gap: 1rem;
        }

        .product-actions {
            width: 100%;
            justify-content: space-between;
        }

        .d-flex.justify-content-between.align-items-center {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .pagination {
            margin-top: 1rem;
        }
    }

    @media (max-width: 576px) {
        .product-actions {
            flex-direction: column;
            gap: 0.5rem;
        }

        .product-actions .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection