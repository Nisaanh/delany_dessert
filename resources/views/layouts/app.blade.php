<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Delany Dessert - Affordable Yummy Desserts')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B7355;
            --secondary-color: #D4A574;
            --accent-color: #E8D5C4;
            --dark-color: #3E2723;
            --light-color: #F5F1ED;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }

        /* Header Section */
        .header-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 3rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }

        .header-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header-section p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-image-placeholder {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .product-image-placeholder i {
            font-size: 3rem;
            opacity: 0.8;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .product-price-badge {
            position: absolute;
            bottom: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 800;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-body {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-category {
            color: var(--secondary-color);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.8rem;
            display: inline-block;
        }

        .product-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .product-description {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 2px solid var(--light-color);
        }

        /* Enhanced Buttons */
        .btn {
            border-radius: 50px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 4px 15px rgba(139, 115, 85, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 115, 85, 0.4);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        }

        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;
            background: transparent;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Enhanced Form Controls */
        .form-control,
        .form-select {
            border: 2px solid var(--accent-color);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.3rem rgba(139, 115, 85, 0.15);
            transform: translateY(-2px);
        }

        /* Enhanced Pagination */
        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 3rem 0;
            gap: 1rem;
        }

        .pagination-info {
            color: #666;
            font-size: 0.9rem;
            text-align: center;
            font-weight: 500;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .page-item {
            margin: 0;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.75rem;
            background: white;
            border: 1px solid #dee2e6;
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 8px;
            min-width: 40px;
            height: 40px;
            font-size: 0.9rem;
        }

        .page-link:hover {
            background: var(--accent-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-color: var(--primary-color);
            color: white;
        }

        .page-item.disabled .page-link {
            color: #adb5bd;
            background: #f8f9fa;
            border-color: #e9ecef;
            transform: none;
        }

        .pagination-nav {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .navbar-brand img,
        .footer-logo {
            height: 40px;
            /* Sesuaikan tinggi logo sesuai kebutuhan */
            margin-right: 10px;
            border-radius: 8px;
        }

        .nav-btn {
            padding: 0.5rem 1rem;
            border: 1px solid #dee2e6;
            background: white;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-btn:hover {
            background: var(--accent-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .nav-btn.disabled {
            color: #adb5bd;
            background: #f8f9fa;
            border-color: #e9ecef;
            pointer-events: none;
        }

        /* Loading Animation */
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

        .product-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .product-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .product-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .product-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        .product-card:nth-child(5) {
            animation-delay: 0.4s;
        }

        .product-card:nth-child(6) {
            animation-delay: 0.5s;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-section h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--accent-color);
            padding-left: 5px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent-color);
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
        }

        /* Alert Messages */
        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 2rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .footer-logo {
            height: 35px;
            width: auto;
            border-radius: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-section h1 {
                font-size: 1.8rem;
            }

            .product-card {
                margin-bottom: 1.5rem;
            }

            .product-card:hover {
                transform: translateY(-5px) scale(1.01);
            }

            .product-body {
                padding: 1.5rem;
            }

            .product-name {
                font-size: 1.2rem;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }

            .btn {
                padding: 0.625rem 1.25rem;
                font-size: 0.9rem;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.2rem;
            }

            .page-link {
                padding: 0.4rem 0.6rem;
                min-width: 35px;
                height: 35px;
                font-size: 0.85rem;
            }

            .nav-btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }

            .pagination-info {
                font-size: 0.85rem;
            }

            .pagination-nav {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Accessibility Improvements */
        @media (prefers-reduced-motion: reduce) {

            .product-card,
            .btn,
            .page-link,
            .form-control,
            .form-select {
                transition: none;
                animation: none;
            }
        }

        /* Focus Styles for Accessibility */
        .btn:focus,
        .form-control:focus,
        .form-select:focus,
        .page-link:focus {
            outline: 3px solid rgba(139, 115, 85, 0.5);
            outline-offset: 2px;
        }

        /* High Contrast Mode Support */
        @media (prefers-contrast: high) {
            .product-card {
                border: 2px solid var(--dark-color);
            }

            .btn-primary {
                background: var(--dark-color);
                color: white;
            }
        }

    </style>
    @yield('extra-css')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('logo.jpeg') }}" alt="Delany Dessert Logo" class="navbar-logo me-2">

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="fas fa-box me-1"></i>Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            <i class="fas fa-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                    @if(auth()->user()->is_admin)
                    <!-- Menu Admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">
                            <i class="fas fa-plus me-1"></i>Tambah Produk
                        </a>
                    </li>
                    @else
                    <!-- Menu User -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart me-1"></i>Keranjang
                            @php
                            $cartCount = Auth::user()->cart ? Auth::user()->cart->item_count : 0;
                            @endphp
                            @if($cartCount > 0)
                            <span class="badge bg-danger ms-1">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                    @endif

                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                            @if(auth()->user()->is_admin)
                            <span class="badge bg-warning ms-1">Admin</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <!-- Menu Guest -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if ($message = Session::get('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-section">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('logo.jpeg') }}" alt="Delany Dessert Logo" class="footer-logo">
                        <h5 class="ms-2 mb-0" style="font-weight:700;">Delany Dessert</h5>
                    </div>
                    <p>Menyediakan dessert berkualitas dengan harga terjangkau untuk semua kalangan.</p>
                    <div class="social-links">
                        <a href="https://www.instagram.com/delanydesserts/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://tiktok.com/@delanydesserts" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="https://wa.me/6287864048193" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-4 footer-section">
                    <h5>Menu Utama</h5>
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('products.index') }}">Produk</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-section">
                    <h5>Hubungi Kami</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Perumahan Green Tombro Residence 2, Blk. B No.38, Kec. Lowokwaru, Kota Malang, Jawa Timur 65121</li>
                        <li><i class="fas fa-phone"></i> +62 878-6404-8193</li>
                        <li><i class="fas fa-envelope"></i> delanydesserts@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Delany Dessert. Semua hak dilindungi. | Dibuat dengan <i class="fas fa-heart" style="color: #ff6b6b;"></i> untuk Anda</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
