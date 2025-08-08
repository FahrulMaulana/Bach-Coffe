<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bach Coffee - Premium Coffee Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream-primary: #f5f1eb;
            --cream-secondary: #ede7dc;
            --cream-light: #faf8f5;
            --cream-dark: #e8e0d2;
            --red-primary: #dc2626;
            --red-secondary: #b91c1c;
            --red-light: #fee2e2;
            --red-dark: #991b1b;
            --red-gradient: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
            --cream-gradient: linear-gradient(135deg, #f5f1eb 0%, #ede7dc 50%, #e8e0d2 100%);
            --modern-shadow: 0 10px 40px rgba(220, 38, 38, 0.15);
            --modern-shadow-lg: 0 20px 60px rgba(220, 38, 38, 0.2);
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-radius: 16px;
            --border-radius-lg: 24px;
        }

        * {
            font-family: 'Poppins', sans-serif !important;
        }

        body {
            background: var(--cream-light) !important;
            font-family: 'Poppins', sans-serif !important;
        }

        /* Modern Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            background: linear-gradient(135deg, var(--red-primary) 0%, var(--red-secondary) 50%, var(--red-dark) 100%);
            background-attachment: fixed;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset("/uploads/neK.gif") }}') center/cover no-repeat;
            opacity: 0.3;
            z-index: 1;
        }

        .hero-overlay {
            background: rgba(220, 38, 38, 0.7);
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            backdrop-filter: blur(5px);
        }

        .hero-content {
            position: relative;
            z-index: 3;
        }

        /* Modern Navbar */
        .navbar {
            background: rgba(245, 241, 235, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--cream-dark);
            transition: all 0.3s ease;
            box-shadow: var(--modern-shadow);
            padding: 1rem 0;
        }

        .navbar.scrolled {
            background: rgba(245, 241, 235, 0.98) !important;
            box-shadow: var(--modern-shadow-lg);
            padding: 0.5rem 0;
        }

        .navbar-brand img {
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .navbar-brand span {
            color: var(--red-primary);
            font-weight: 700;
            font-size: 1.4rem;
            margin-left: 0.5rem;
        }

        .navbar-nav .nav-link {
            color: var(--text-primary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 5px;
            padding: 8px 15px !important;
        }

        .navbar-nav .nav-link:hover {
            background: var(--red-light);
            color: var(--red-primary) !important;
        }

        /* Modern Buttons */
        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.8) !important;
            color: white !important;
            border-radius: var(--border-radius) !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .btn-outline-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .btn-outline-light:hover::before {
            left: 100%;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: white !important;
            transform: translateY(-2px);
            box-shadow: var(--modern-shadow);
        }

        .btn-primary {
            background: var(--red-gradient) !important;
            border: none !important;
            border-radius: var(--border-radius) !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--modern-shadow);
        }

        /* Navigation Buttons for Landing Page */
        .navbar .btn-outline-light {
            border: 2px solid var(--red-primary) !important;
            color: var(--red-primary) !important;
            background: transparent !important;
        }

        .navbar .btn-outline-light:hover {
            background: var(--red-primary) !important;
            color: white !important;
            border-color: var(--red-primary) !important;
        }

        /* Modern Cards */
        .menu-card {
            transition: all 0.4s ease;
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            background: white;
            box-shadow: var(--modern-shadow);
            position: relative;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--red-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--modern-shadow-lg);
        }

        .menu-card:hover::before {
            transform: scaleX(1);
        }

        .menu-image {
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .menu-card:hover .menu-image {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Modern Sections */
        .section-padding {
            padding: 4rem 0;
        }

        .section-title {
            color: var(--text-primary);
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--red-gradient);
            border-radius: 2px;
        }

        /* Parallax Section */
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 500px;
            position: relative;
        }

        .parallax::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(220, 38, 38, 0.8);
        }

        .parallax-content {
            position: relative;
            z-index: 2;
        }

        /* Modern Gallery */
        .gallery-img {
            height: 350px;
            object-fit: cover;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: var(--modern-shadow);
        }

        .gallery-img:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow: var(--modern-shadow-lg);
        }

        /* Modern Contact Section */
        .contact-form {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--modern-shadow);
            backdrop-filter: blur(10px);
        }

        .form-control {
            border-radius: var(--border-radius);
            border: 2px solid var(--cream-dark);
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--red-primary);
            box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25);
        }

        /* Modern Footer */
        footer {
            background: var(--red-gradient) !important;
            color: white;
            padding: 3rem 0 2rem 0;
        }

        /* Footer Links Hover Effects */
        footer ul li a {
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }

        footer ul li a:hover {
            color: white !important;
            padding-left: 10px;
        }

        footer ul li a:hover i {
            color: var(--cream-light) !important;
        }

        /* Social Media Icons Hover Effects */
        footer .rounded-circle:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            transform: translateY(-3px);
            color: white !important;
        }

        /* Footer Contact Info */
        footer .text-danger {
            color: var(--cream-light) !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--red-primary);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--red-secondary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                background-attachment: scroll;
            }

            .parallax {
                background-attachment: scroll;
            }

            .section-padding {
                padding: 2rem 0;
            }

            .hero h1 {
                font-size: 2.5rem !important;
            }
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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(245, 241, 235, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 6px solid var(--cream-dark);
            border-top: 6px solid var(--red-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Modern Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/uploads/logobach.png" alt="Bach Coffee" style="width: 45px; height: 45px;" />
                <span>Bach Coffee</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    style="border: none; background: var(--red-light);">
                <i class="bi bi-list" style="color: var(--red-primary); font-size: 1.5rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="bi bi-house-door me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">
                            <i class="bi bi-cup-hot me-1"></i>Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            <i class="bi bi-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">
                            <i class="bi bi-images me-1"></i>Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            <i class="bi bi-telephone me-1"></i>Kontak
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-light" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-2"></i>Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modern Hero Section -->
    <section class="hero" id="home">
        <div class="hero-overlay d-flex align-items-center">
            <div class="container text-white text-center hero-content">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-1 fw-bold mb-4" data-aos="fade-up" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                            Bach Coffee
                        </h1>
                        <p class="lead mb-4 fs-3" data-aos="fade-up" data-aos-delay="200" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                            Nongkrong Santai dengan Segelas Kopi Premium
                        </p>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="300" style="font-size: 1.1rem; opacity: 0.9;">
                            Nikmati pengalaman kopi terbaik dengan suasana yang hangat dan nyaman di Bach Coffee
                        </p>
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center" data-aos="fade-up" data-aos-delay="400">
                            <a href="#menu" class="btn btn-outline-light btn-lg pulse-animation">
                                <i class="bi bi-cup-hot me-2"></i>Jelajahi Menu
                            </a>
                            <a href="#about" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-info-circle me-2"></i>Tentang Kami
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Features Highlight -->
                <div class="row mt-5 pt-5" data-aos="fade-up" data-aos-delay="600">
                    <div class="col-md-4 mb-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="bg-opacity-20 rounded-circle p-3 mb-2 backdrop-blur">
                                <i class="bi bi-award fs-2"></i>
                            </div>
                            <h6 class="fw-bold">Kualitas Premium</h6>
                            <small class="opacity-75">Biji kopi pilihan terbaik</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="bg-opacity-20 rounded-circle p-3 mb-2 backdrop-blur">
                                <i class="bi bi-heart fs-2"></i>
                            </div>
                            <h6 class="fw-bold">Pelayanan Ramah</h6>
                            <small class="opacity-75">Tim yang berpengalaman</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="bg-opacity-20 rounded-circle p-3 mb-2 backdrop-blur">
                                <i class="bi bi-house-heart fs-2"></i>
                            </div>
                            <h6 class="fw-bold">Suasana Nyaman</h6>
                            <small class="opacity-75">Tempat yang cozy untuk bersantai</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="py-5" id="menu">
        <div class="container">
            <h2 class="text-center mb-5">Menu Kami</h2>
            <div class="row g-4">
                <!-- Menu items with data-aos animations -->
                <!-- <div class="col-md-4" data-aos="fade-up">
                    <div class="card menu-card shadow">
                        <img src="/images/coffee1.jpg" class="menu-image" alt="Coffee">
                        <div class="card-body">
                            <h5 class="card-title">Signature Latte</h5>
                            <p class="card-text">Rich espresso with velvety steamed milk</p>
                        </div>
                    </div>
                </div> -->
                @forelse($products as $product)
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card menu-card shadow">
                            <img src="{{ $product->foto ? asset('uploads/' . $product->foto) : asset('images/default-product.jpg') }}"
                                class="menu-image" alt="{{ $product->nama_produk }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nama_produk }}</h5>
                                <p class="card-text">Rp {{ number_format($product->harga_produk, 0, ',', '.') }} /
                                    {{ number_format($product->harga_produk, 0, ',', '.') }} Point
                                </p>
                                <!-- <p class="card-text"> {{ number_format($product->harga_produk, 0, ',', '.') }} Point</p> -->
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Tidak ada menu tersedia</p>
                    </div>
                @endforelse
                <!-- Add more menu items -->
            </div>
        </div>
    </section>
 <!-- Modern About Section with Parallax -->
    <section class="parallax parallax-content d-flex align-items-center" id="about" 
             style="background-image: linear-gradient(rgba(220, 38, 38, 0.8), rgba(153, 27, 27, 0.8)), url('/images/cafe-interior.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="bg-white p-4 rounded-4 shadow-lg">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-gradient-danger rounded-circle p-3 me-3">
                                <i class="bi bi-book text-white"></i>
                            </div>
                            <h2 class="mb-0" style="color: var(--text-primary);">Cerita Kami</h2>
                        </div>
                        <p class="lead text-muted">Menghadirkan Cita Rasa Sejak 2020</p>
                        <p style="color: var(--text-secondary);">
                            Berawal dari passion kami terhadap kopi, kami membangun tempat ini untuk berbagi kehangatan
                            dan kebahagiaan melalui secangkir kopi pilihan terbaik yang dipersembahkan dengan sepenuh hati.
                        </p>
                        <div class="d-flex align-items-center mt-3">
                            <i class="bi bi-award text-warning me-2"></i>
                            <small class="text-muted">Terpercaya sejak 2020</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="bg-white p-4 rounded-4 shadow-lg">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle p-3 me-3" style="background: var(--red-gradient);">
                                <i class="bi bi-heart-fill text-white"></i>
                            </div>
                            <h2 class="mb-0" style="color: var(--text-primary);">Komitmen Kami</h2>
                        </div>
                        <p class="lead text-muted">Memberikan Yang Terbaik</p>
                        <p style="color: var(--text-secondary);">
                            Setiap cangkir yang kami sajikan adalah hasil dari dedikasi kami dalam memilih biji kopi
                            terbaik dan menciptakan pengalaman kopi yang tak terlupakan bagi setiap pelanggan.
                        </p>
                        <div class="d-flex align-items-center mt-3">
                            <i class="bi bi-gem text-primary me-2"></i>
                            <small class="text-muted">Kualitas premium terjamin</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-5" id="gallery">
        <div class="container">
            <h2 class="text-center mb-5">Gallery</h2>
            <div class="row g-4">
                <!-- Gallery images with data-aos animations -->
                <div class="col-md-6" data-aos="zoom-in">
                    <img src="{{ asset('/uploads/Store.jpeg') }}" class="gallery-img w-100" alt="Gallery">
                </div>
                <!-- Add more gallery items -->
                <!-- <div class="col-md-4" data-aos="zoom-in">
                    <img src="{{ asset('/uploads/2.jpg') }}" class="gallery-img w-100" alt="Gallery">
                </div> -->
                <div class="col-md-6" data-aos="zoom-in">
                    <img src="{{ asset('/uploads/store2.jpeg') }}" class="gallery-img w-100" alt="Gallery">
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Contact Section -->
    <section class="section-padding" id="contact" style="background: var(--cream-gradient);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="section-title text-start">Hubungi Kami</h2>
                    <p class="text-muted mb-4">
                        Punya pertanyaan atau ingin berkunjung? Jangan ragu untuk menghubungi kami!
                    </p>
                    
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm">
                                <div class="rounded-circle p-3 me-3" style="background: var(--red-light);">
                                    <i class="bi bi-geo-alt-fill" style="color: var(--red-primary);"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Alamat</h6>
                                    <p class="mb-0 text-muted">Jl. Kopi Nikmat No. 123, Jakarta Selatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm">
                                <div class="rounded-circle p-3 me-3" style="background: var(--red-light);">
                                    <i class="bi bi-telephone-fill" style="color: var(--red-primary);"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Telepon</h6>
                                    <p class="mb-0 text-muted">(021) 123-4567</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm">
                                <div class="rounded-circle p-3 me-3" style="background: var(--red-light);">
                                    <i class="bi bi-envelope-fill" style="color: var(--red-primary);"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Email</h6>
                                    <p class="mb-0 text-muted">info@bachcoffee.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-white rounded-4 shadow-sm">
                                <div class="rounded-circle p-3 me-3" style="background: var(--red-light);">
                                    <i class="bi bi-clock-fill" style="color: var(--red-primary);"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Jam Buka</h6>
                                    <p class="mb-0 text-muted">Senin - Minggu: 07:00 - 22:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="contact-form">
                        <h4 class="mb-4 fw-bold" style="color: var(--text-primary);">Kirim Pesan</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="nama@email.com">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-semibold">Subjek</label>
                                <input type="text" class="form-control" id="subject" placeholder="Subjek pesan">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label fw-semibold">Pesan</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Footer -->
    <footer class="text-white py-5">
        <div class="container">
            <div class="row">
                <!-- Brand Section -->
                <div class="col-lg-4 mb-4 mb-lg-0 text-center text-lg-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                        <img src="/uploads/logobach.png" alt="Bach Coffee" class="me-3" style="width: 50px; height: 50px; border-radius: 12px;">
                        <h4 class="mb-0 fw-bold">Bach Coffee</h4>
                    </div>
                    <p class="text-white-50 mb-3">
                        Menghadirkan pengalaman kopi terbaik dengan cita rasa yang tak terlupakan sejak 2020.
                    </p>
                    <div class="d-flex justify-content-center justify-content-lg-start gap-2">
                        <div class="bg-white bg-opacity-10 rounded-circle p-2">
                            <i class="bi bi-award text-warning"></i>
                        </div>
                        <small class="text-white-50 align-self-center">Kualitas Terpercaya</small>
                    </div>
                </div>
                
                <!-- Quick Links Section -->
                <div class="col-lg-4 mb-4 mb-lg-0 text-center text-lg-start">
                    <h5 class="fw-bold mb-4">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#home" class="text-white-50 text-decoration-none d-inline-flex align-items-center transition-all">
                                <i class="bi bi-chevron-right me-2"></i>Beranda
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#menu" class="text-white-50 text-decoration-none d-inline-flex align-items-center transition-all">
                                <i class="bi bi-chevron-right me-2"></i>Menu Kami
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#about" class="text-white-50 text-decoration-none d-inline-flex align-items-center transition-all">
                                <i class="bi bi-chevron-right me-2"></i>Tentang Kami
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#gallery" class="text-white-50 text-decoration-none d-inline-flex align-items-center transition-all">
                                <i class="bi bi-chevron-right me-2"></i>Galeri
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#contact" class="text-white-50 text-decoration-none d-inline-flex align-items-center transition-all">
                                <i class="bi bi-chevron-right me-2"></i>Kontak
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact & Social Section -->
                <div class="col-lg-4 text-center text-lg-start">
                    <h5 class="fw-bold mb-4">Hubungi Kami</h5>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-2">
                            <i class="bi bi-geo-alt-fill me-2 text-danger"></i>
                            <small class="text-white-50">Jl. Kopi Nikmat No. 123, Jakarta</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-2">
                            <i class="bi bi-telephone-fill me-2 text-danger"></i>
                            <small class="text-white-50">(021) 123-4567</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                            <i class="bi bi-envelope-fill me-2 text-danger"></i>
                            <small class="text-white-50">info@bachcoffee.com</small>
                        </div>
                    </div>
                    
                    <h6 class="fw-bold mb-3">Ikuti Kami</h6>
                    <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="#" class="text-white-50 d-flex align-items-center justify-content-center bg-white bg-opacity-10 rounded-circle" 
                           style="width: 40px; height: 40px; transition: all 0.3s ease;">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white-50 d-flex align-items-center justify-content-center bg-white bg-opacity-10 rounded-circle" 
                           style="width: 40px; height: 40px; transition: all 0.3s ease;">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white-50 d-flex align-items-center justify-content-center bg-white bg-opacity-10 rounded-circle" 
                           style="width: 40px; height: 40px; transition: all 0.3s ease;">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-white-50 d-flex align-items-center justify-content-center bg-white bg-opacity-10 rounded-circle" 
                           style="width: 40px; height: 40px; transition: all 0.3s ease;">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <hr class="my-4 opacity-25">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 text-white-50">
                        &copy; {{ date('Y') }} Bach Coffee. Semua hak dilindungi.
                    </p>
                    <p class="mb-0 mt-2">
                        <span class="text-white">Made with <i class="bi bi-heart-fill text-danger"></i> for coffee lovers</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS with modern settings
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Modern navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Loading overlay functions
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').style.display = 'none';
        }

        // Auto-hide loading after page load
        window.addEventListener('load', function() {
            setTimeout(hideLoading, 1000);
        });

        // Add loading to navigation and form submissions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading to all forms
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function() {
                    showLoading();
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Auto-close alerts
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(alert => {
                    const closeButton = alert.querySelector('.btn-close');
                    if (closeButton) {
                        closeButton.click();
                    }
                });
            }, 5000);

            // Add ripple effect to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Enhanced gallery lightbox effect
            document.querySelectorAll('.gallery-img').forEach(img => {
                img.addEventListener('click', function() {
                    // Create lightbox modal
                    const modal = document.createElement('div');
                    modal.className = 'modal fade';
                    modal.innerHTML = `
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-transparent border-0">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" style="z-index: 1051;"></button>
                                    <img src="${this.src}" class="img-fluid rounded" alt="Gallery Image">
                                </div>
                            </div>
                        </div>
                    `;
                    document.body.appendChild(modal);
                    const bootstrapModal = new bootstrap.Modal(modal);
                    bootstrapModal.show();
                    modal.addEventListener('hidden.bs.modal', () => {
                        modal.remove();
                    });
                });
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .btn {
                position: relative;
                overflow: hidden;
            }
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>