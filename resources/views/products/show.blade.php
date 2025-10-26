@extends('layouts.app')

@section('title', $product->name . ' - Delany Dessert')

@section('content')
<!-- Hero Section -->
<section class="product-hero">
    <div class="container">
        <nav class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="breadcrumb-link">Beranda</a>
            <span class="breadcrumb-separator">/</span>
            <a href="{{ route('products.index') }}" class="breadcrumb-link">Produk</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-active">{{ $product->name }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="product-detail">
            <!-- Product Images & Info -->
            <div class="product-main">
                <div class="product-gallery">
                    @if($product->image)
                        <div class="main-image">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                            @if($product->is_featured)
                                <span class="featured-badge">
                                    <i class="fas fa-star me-1"></i> Produk Unggulan
                                </span>
                            @endif
                        </div>
                    @else
                        <div class="image-placeholder">
                            <i class="fas fa-image"></i>
                            <p>Gambar tidak tersedia</p>
                        </div>
                    @endif
                </div>

                <div class="product-info">
                    <span class="product-category">{{ $product->category->name }}</span>
                    <h1 class="product-title">{{ $product->name }}</h1>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text">4.5 (128 reviews)</span>
                    </div>

                    <div class="price-section">
                        <h2 class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                    </div>

                    <div class="product-description">
                        <h3>Deskripsi Produk</h3>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="product-actions">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-edit">
                            <i class="fas fa-edit me-2"></i>Edit Produk
                        </a>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Details Tabs -->
            {{-- <div class="product-tabs">
                <nav class="tab-nav">
                    <button class="tab-link active" data-tab="description">Deskripsi Lengkap</button>
                    <button class="tab-link" data-tab="ingredients">Bahan & Komposisi</button>
                    <button class="tab-link" data-tab="nutrition">Informasi Gizi</button>
                </nav>

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <div class="tab-text">
                            <p>{{ $product->description }}</p>
                            <p>Dibuat dengan bahan-bahan pilihan terbaik yang diolah secara higienis untuk memberikan pengalaman dessert yang tak terlupakan. Setiap gigitan memberikan sensasi rasa yang sempurna dengan tekstur yang lembut dan aroma yang menggugah selera.</p>
                        </div>
                    </div>

                    <div class="tab-pane" id="ingredients">
                        <div class="ingredients-list">
                            <h4>Bahan Utama:</h4>
                            <ul>
                                <li>Tepung terigu protein tinggi</li>
                                <li>Butter premium</li>
                                <li>Gula pasir halus</li>
                                <li>Telur segar</li>
                                <li>Vanilla extract</li>
                                <li>Susu full cream</li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane" id="nutrition">
                        <div class="nutrition-info">
                            <table class="nutrition-table">
                                <tr>
                                    <td>Energi</td>
                                    <td>250 kkal</td>
                                </tr>
                                <tr>
                                    <td>Karbohidrat</td>
                                    <td>35g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>5g</td>
                                </tr>
                                <tr>
                                    <td>Lemak</td>
                                    <td>10g</td>
                                </tr>
                                <tr>
                                    <td>Gula</td>
                                    <td>20g</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Produk Lainnya</h2>
            <p class="section-subtitle">Jelajahi koleksi dessert kami yang lainnya</p>
        </div>
        
        <div class="products-grid">
            <!-- This would typically be populated with related products -->
            <div class="related-placeholder">
                <i class="fas fa-utensils"></i>
                <p>Produk terkait akan ditampilkan di sini</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Semua Produk</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-css')
<style>
/* Hero Section */
.product-hero {
    background: linear-gradient(135deg, var(--light-color) 0%, var(--accent-color) 100%);
    padding: 2rem 0 1rem;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.breadcrumb-link {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: var(--secondary-color);
}

.breadcrumb-separator {
    color: #999;
}

.breadcrumb-active {
    color: var(--dark-color);
    font-weight: 600;
}

/* Section Styling */
.section-padding {
    padding: 4rem 0;
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

/* Product Detail */
.product-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-bottom: 4rem;
}

.product-gallery {
    position: relative;
}

.main-image {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.product-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.main-image:hover .product-image {
    transform: scale(1.02);
}

.featured-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    color: #000;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    z-index: 2;
}

.image-placeholder {
    width: 100%;
    height: 500px;
    background: linear-gradient(135deg, var(--accent-color) 0%, #f8f9fa 100%);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #ccc;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.image-placeholder i {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.image-placeholder p {
    color: #999;
    font-size: 1.1rem;
}

/* Product Info */
.product-info {
    padding: 1rem 0;
}

.product-category {
    display: inline-block;
    color: var(--secondary-color);
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
    padding: 0.5rem 1rem;
    background: var(--accent-color);
    border-radius: 20px;
}

.product-title {
    font-size: 2.5rem;
    color: var(--dark-color);
    font-weight: 800;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.stars {
    display: flex;
    gap: 0.25rem;
}

.stars i {
    color: #FFD700;
    font-size: 1.1rem;
}

.rating-text {
    color: #666;
    font-size: 0.95rem;
}

.price-section {
    background: var(--light-color);
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
    border: 2px solid var(--accent-color);
}

.product-price {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.product-description {
    margin-bottom: 2rem;
}

.product-description h3 {
    color: var(--dark-color);
    font-weight: 700;
    margin-bottom: 1rem;
    font-size: 1.3rem;
}

.product-description p {
    color: #666;
    line-height: 1.7;
    font-size: 1.05rem;
}

.product-features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    background: var(--light-color);
    border-radius: 10px;
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: var(--accent-color);
    transform: translateY(-2px);
}

.feature-item i {
    color: var(--primary-color);
    font-size: 1.2rem;
}

.feature-item span {
    color: var(--dark-color);
    font-weight: 500;
    font-size: 0.9rem;
}

.product-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn-edit, .btn-back {
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-edit:hover, .btn-back:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Related Products */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.related-placeholder {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.related-placeholder i {
    font-size: 3rem;
    color: var(--secondary-color);
    margin-bottom: 1rem;
}

.related-placeholder p {
    color: #666;
    margin-bottom: 2rem;
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .product-main {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .product-title {
        font-size: 2rem;
    }
    
    .product-price {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .section-padding {
        padding: 3rem 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .product-features {
        grid-template-columns: 1fr;
    }
    
    .tab-nav {
        flex-direction: column;
        border-bottom: none;
    }
    
    .tab-link {
        border-bottom: 1px solid #eee;
        border-left: 3px solid transparent;
    }
    
    .tab-link.active {
        border-left-color: var(--primary-color);
        border-bottom-color: #eee;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .btn-edit, .btn-back {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .product-hero {
        padding: 1.5rem 0 1rem;
    }
    
    .product-title {
        font-size: 1.8rem;
    }
    
    .price-section {
        padding: 1.5rem;
    }
    
    .product-price {
        font-size: 1.8rem;
    }
    
    .feature-item {
        padding: 0.75rem;
    }
}
</style>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and panes
            tabLinks.forEach(tab => tab.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to current tab and pane
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });
    
    // Image zoom effect
    const mainImage = document.querySelector('.main-image');
    if (mainImage) {
        mainImage.addEventListener('mousemove', function(e) {
            const image = this.querySelector('.product-image');
            const { left, top, width, height } = this.getBoundingClientRect();
            const x = (e.clientX - left) / width * 100;
            const y = (e.clientY - top) / height * 100;
            
            image.style.transformOrigin = `${x}% ${y}%`;
        });
        
        mainImage.addEventListener('mouseleave', function() {
            const image = this.querySelector('.product-image');
            image.style.transformOrigin = 'center center';
            image.style.transform = 'scale(1)';
        });
    }
});
</script>
@endsection