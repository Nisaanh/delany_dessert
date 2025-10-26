@extends('layouts.app')

@section('title', 'Tentang Kami - Delany Dessert')

@section('content')
<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title">Tentang Delany Dessert</h1>
            <p class="hero-subtitle">Mengenal lebih jauh tentang passion dan dedikasi kami dalam menciptakan dessert berkualitas</p>
        </div>
    </div>
</section>

<!-- Company Story -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="story-image">
                    <img src="{{ asset('about.jpg') }}" alt="Delany Dessert Kitchen" class="img-fluid">
                    <div class="image-badge">
                        <i class="fas fa-award"></i>
                        <span>Since 2020</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="story-content">
                    <span class="section-label">Our Story</span>
                    <h2 class="section-title">Perjalanan Delany Dessert</h2>
                    <div class="story-text">
                        <p>
                            Delany Dessert lahir dari passion yang mendalam terhadap dunia dessert dan keinginan untuk
                            menghadirkan dessert berkualitas tinggi dengan harga yang terjangkau untuk semua kalangan.
                            Kami percaya bahwa setiap orang berhak menikmati momen manis dalam hidup tanpa harus
                            menguras kantong.
                        </p>
                        <p>
                            Dimulai dari dapur rumah yang sederhana pada tahun 2020, kami terus berkembang dengan
                            komitmen untuk selalu menggunakan bahan-bahan premium dan resep yang telah teruji.
                            Setiap produk yang kami hadirkan adalah perpaduan sempurna antara cita rasa, kualitas,
                            dan nilai yang terbaik.
                        </p>
                    </div>
                    <div class="achievement-stats">
                        <div class="stat-item">
                            <h3>1000+</h3>
                            <p>Pelanggan Bahagia</p>
                        </div>
                        <div class="stat-item">
                            <h3>15+</h3>
                            <p>Varian Produk</p>
                        </div>
                        <div class="stat-item">
                            <h3>4.9</h3>
                            <p>Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <span class="section-label">Our Purpose</span>
                <h2 class="section-title">Misi & Visi Kami</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="purpose-card mission">
                    <div class="purpose-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Misi Kami</h3>
                    <p>
                        Menghadirkan pengalaman dessert yang memuaskan dengan produk berkualitas tinggi,
                        harga terjangkau, dan pelayanan terbaik untuk setiap pelanggan. Kami berkomitmen
                        untuk terus berinovasi dalam menciptakan rasa yang tak terlupakan.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="purpose-card vision">
                    <div class="purpose-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Visi Kami</h3>
                    <p>
                        Menjadi UMKM dessert terdepan yang dikenal inovatif, berkualitas, dan mampu
                        menyebarkan kebahagiaan melalui setiap gigitan manis. Kami bercita-cita untuk
                        menjadi bagian dari momen spesial dalam hidup Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <span class="section-label">Our Values</span>
                <h2 class="section-title">Nilai-Nilai Kami</h2>
                <p class="section-subtitle">Prinsip yang menjadi pedoman dalam setiap langkah kami</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Passion</h4>
                    <p>Setiap produk dibuat dengan cinta dan dedikasi penuh, karena kami percaya bahwa passion adalah bahan rahasia terbaik.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4>Kualitas</h4>
                    <p>Hanya bahan terbaik yang digunakan dalam produksi. Kami tidak pernah berkompromi dengan kualitas.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Kepercayaan</h4>
                    <p>Transparansi dan kejujuran dalam setiap transaksi. Kepercayaan pelanggan adalah aset berharga kami.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact & Location -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <span class="section-label">Get In Touch</span>
                <h2 class="section-title">Hubungi Kami</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            <!-- Kontak Info -->
            <div class="col-lg-5 mb-4">
                <div class="contact-info-wrapper">
                    <div class="contact-card-main">
                        <div class="contact-icon-main">
                            <i class="fas fa-store"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Delany Dessert</h4>
                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-item-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h6>Lokasi</h6>
                                    <p>Green Tombro Residence 2, Blk. B No.38, Lowokwaru, Malang</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-item-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h6>Telepon</h6>
                                    <p>+62-878-6404-8193</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-item-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h6>Jam Operasional</h6>
                                    <p>Senin - Jumat: 14:00 - 22:00 WIB</p>
                                    <p>Sabtu - Minggu: 07:00 - 22:00 WIB</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-actions mt-4">
                            <a href="https://wa.me/6287864048193" target="_blank" class="btn btn-success w-100 mb-2">
                                <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="col-lg-7 mb-4">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3141822078887!2d112.61773437482044!3d-7.966166179388785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882865ded0697%3A0x5a7d3e20a6d5b5e5!2sGreen%20Tombro%20Residence%202!5e0!3m2!1sid!2sid!4v1698765432107!5m2!1sid!2sid" width="100%" height="100%" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="map-overlay">
                        <div class="map-info">
                            <h5><i class="fas fa-store me-2"></i>Delany Dessert</h5>
                            <p class="mb-1">Green Tombro Residence 2, Lowokwaru, Malang</p>
                            <small class="text-muted">Klik untuk petunjuk arah</small>
                        </div>
                        <a href="https://maps.app.goo.gl/WpZBvDf7SoXJSSY88" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fas fa-directions me-1"></i>Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <span class="section-label">Follow Us</span>
                <h2 class="section-title">Ikuti Perjalanan Kami</h2>
                <p class="section-subtitle mb-5">Tetap terhubung dan dapatkan update terbaru tentang produk dan promo spesial</p>

                <div class="social-grid">
                    <a href="https://www.instagram.com/delanydesserts/" target="_blank" class="social-card instagram">
                        <div class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="social-content">
                            <h5>Instagram</h5>
                            <p>@delanydesserts</p>
                            <span class="social-followers">1.112 followers</span>
                        </div>
                    </a>

                    <a href="https://tiktok.com/@delanydesserts" target="_blank" class="social-card tiktok">
                        <div class="social-icon">
                            <i class="fab fa-tiktok"></i>
                        </div>
                        <div class="social-content">
                            <h5>TikTok</h5>
                            <p>@delanydesserts</p>
                            <span class="social-followers">6890 followers</span>
                        </div>
                    </a>

                    <a href="https://wa.me/6287864048193" target="_blank" class="social-card whatsapp">
                        <div class="social-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="social-content">
                            <h5>WhatsApp</h5>
                            <p>+62 878-6404-8193</p>
                            <span class="social-followers">Fast Response</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-css')
<style>
    /* Hero Section */
    .about-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 4rem 0 6rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.3rem;
        opacity: 0.95;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Section Styling */
    .section-padding {
        padding: 6rem 0;
    }

    .section-label {
        display: inline-block;
        background: linear-gradient(135deg, #D4A574, #B08C5F);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 2.8rem;
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .section-subtitle {
        color: #666;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Story Section */
    .story-image {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .story-image img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .story-image:hover img {
        transform: scale(1.05);
    }

    .image-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.95);
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--primary-color);
        backdrop-filter: blur(10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .story-content {
        padding-left: 3rem;
    }

    .story-text p {
        color: #666;
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 1.5rem;
    }

    .achievement-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #D4A574;
    }

    .stat-item {
        text-align: center;
        flex: 1;
    }

    .stat-item h3 {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-item p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
        font-weight: 500;
    }

    /* Purpose Cards */
    .purpose-card {
        background: white;
        padding: 3rem 2.5rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #f0f0f0;
    }

    .purpose-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .purpose-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .purpose-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    }

    .purpose-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .purpose-card h3 {
        color: #3E2723;
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
    }

    .purpose-card p {
        color: #666;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    /* Value Cards */
    .value-card {
        background: white;
        padding: 3rem 2rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #f8f9fa;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        z-index: 2;
        box-shadow: 0 5px 15px rgba(212, 165, 116, 0.3);
    }

    .value-icon i {
        font-size: 2rem;
        color: var(--primary-color);
    }

    .value-card h4 {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .value-card p {
        color: #666;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    /* Contact Section */
    .contact-info-wrapper {
        height: 100%;
    }

    .contact-card-main {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        height: 100%;
        border: 1px solid #f0f0f0;
    }

    .contact-icon-main {
        width: 80px;
        height: 80px;
        background: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    }

    .contact-icon-main i {
        font-size: 2rem;
        color: var(--primary-color);
    }

    .contact-details {
        margin-bottom: 2rem;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .contact-item-icon {
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .contact-item-icon i {
        color: var(--primary-color);
        font-size: 1rem;
    }

    .contact-item-content h6 {
        color: #3E2723;
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }

    .contact-item-content p {
        color: #666;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .contact-actions .btn {
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .contact-actions .btn-success {
        background: linear-gradient(135deg, #25D366, #128C7E);
        border: none;
    }

    .contact-actions .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
    }

    /* Map Styles */
    .map-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        height: 100%;
        min-height: 500px;
    }

    .map-wrapper iframe {
        display: block;
        width: 100%;
        height: 100%;
    }

    .map-overlay {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 1.5rem;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .map-info h5 {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .map-info p {
        color: var(--primary-color);
        margin-bottom: 0.3rem;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .map-info small {
        color: #8D6E63;
        font-size: 0.8rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 25px;
        padding: 0.5rem 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        white-space: nowrap;
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #D2691E, #8B4513);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        color: white;
    }

    /* Social Grid */
    .social-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .social-card {
        display: flex;
        align-items: center;
        background: white;
        padding: 2rem;
        border-radius: 20px;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 1px solid #f0f0f0;
    }

    .social-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        text-decoration: none;
    }

    .social-card.instagram:hover {
        border-color: #E1306C;
    }

    .social-card.tiktok:hover {
        border-color: #000000;
    }

    .social-card.whatsapp:hover {
        border-color: #25D366;
    }

    .social-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        flex-shrink: 0;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .social-card.instagram .social-icon {
        background: linear-gradient(45deg, #E1306C, #F77737);
    }

    .social-card.tiktok .social-icon {
        background: #000000;
    }

    .social-card.whatsapp .social-icon {
        background: #25D366;
    }

    .social-content h5 {
        color: #3E2723;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .social-content p {
        color: #666;
        margin-bottom: 0.25rem;
    }

    .social-followers {
        color: #D4A574;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .map-overlay {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .map-info {
            text-align: center;
        }

        .story-content {
            padding-left: 0;
            margin-top: 3rem;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .section-padding {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2.2rem;
        }

        .achievement-stats {
            gap: 1rem;
        }

        .stat-item h3 {
            font-size: 2rem;
        }

        .purpose-card {
            padding: 2rem 1.5rem;
        }

        .contact-card-main {
            padding: 2rem;
        }

        .social-grid {
            grid-template-columns: 1fr;
        }

        .map-wrapper {
            min-height: 400px;
        }

        .map-overlay {
            position: relative;
            bottom: auto;
            left: auto;
            right: auto;
            margin-top: -1px;
            border-radius: 0 0 15px 15px;
        }
    }

    @media (max-width: 576px) {
        .about-hero {
            padding: 6rem 0 4rem;
        }

        .hero-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .achievement-stats {
            flex-direction: column;
            gap: 1.5rem;
        }

        .contact-item {
            flex-direction: column;
            text-align: center;
        }

        .contact-item-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }

        .map-wrapper {
            min-height: 350px;
        }

        .map-overlay {
            padding: 1rem;
        }
    }

</style>
@endsection
