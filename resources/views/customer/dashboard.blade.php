<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bach Coffee - Dashboard Customer</title>
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

        /* Modern Buttons */
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

        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.8) !important;
            color: white !important;
            border-radius: var(--border-radius) !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            backdrop-filter: blur(10px);
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: white !important;
            transform: translateY(-2px);
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

        /* Modern Navbar */
        .navbar {
            background: rgba(245, 241, 235, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--cream-dark);
            transition: all 0.3s ease;
            box-shadow: var(--modern-shadow);
        }

        .navbar.scrolled {
            background: rgba(245, 241, 235, 0.98) !important;
            box-shadow: var(--modern-shadow-lg);
        }

        .navbar-brand img {
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .navbar-nav .nav-link {
            color: var(--text-primary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 5px;
            padding: 8px 15px !important;
        }

        .dropdown-menu {
            background: white;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--modern-shadow-lg);
            padding: 0.5rem 0;
        }

        .dropdown-item {
            color: var(--text-primary);
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--red-light);
            color: var(--red-primary);
        }

        /* User Profile Section */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            border-color: white;
            transform: scale(1.05);
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

        .user-info h1 {
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .user-info .lead {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
            display: inline-block;
            margin-bottom: 1rem;
        }

        /* Modern Table */
        .table {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--modern-shadow);
            background: white;
        }

        .table thead th {
            background: var(--red-gradient);
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: var(--red-light);
            transform: translateX(5px);
        }

        .table tbody td {
            padding: 15px;
            border: none;
            border-bottom: 1px solid var(--cream-dark);
        }

        /* Modern Badges */
        .badge {
            padding: 8px 15px;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.8rem;
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

        /* Modern Footer */
        footer {
            background: var(--red-gradient) !important;
            color: white;
            padding: 2rem 0;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .history {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .history .table tr {
            opacity: 0;
            animation: fadeIn 0.5s ease forwards;
            animation-delay: calc(var(--row-index) * 0.1s);
        }

        /* Modern Alerts */
        .alert {
            border: none;
            border-radius: var(--border-radius);
            padding: 15px 20px;
            margin-bottom: 1rem;
            box-shadow: var(--modern-shadow);
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .user-profile {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .user-avatar {
                width: 100px;
                height: 100px;
            }

            .hero {
                background-attachment: scroll;
            }

            .parallax {
                background-attachment: scroll;
            }

            .section-padding {
                padding: 2rem 0;
            }
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

<!-- Modern Alert Section -->
<div class="alerts position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-center" id="error-alert" role="alert">
            <div>
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center" id="error-alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" id="success-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Modern Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/uploads/logobach.png" alt="Bach Coffee"
                    class="me-2" style="width: 45px; height: 45px;" />
                <span class="fw-bold" style="color: var(--red-primary);">Bach Coffee</span>
            </a>
            
            <div class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                            class="rounded-circle me-2" alt="User Image" width="35" height="35" 
                            style="border: 2px solid var(--red-primary);" />
                        <span class="fw-semibold">{{ Auth::user()->nama_lengkap }}</span>
                        <i class="bi bi-chevron-down ms-1"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#profile">
                                <i class="bi bi-person-circle me-2"></i>Profil Saya
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#history">
                                <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right me-2"></i>Keluar
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <!-- Modern Hero Section -->
    <section class="hero" id="home">
        <div class="hero-overlay d-flex align-items-center">
            <div class="container text-white hero-content">
                <div class="user-profile" data-aos="fade-up">
                    <img src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                        class="user-avatar" alt="User Image" />
                    <div class="user-info">
                        <h1 class="display-3 fw-bold">Selamat Datang, {{ Auth::user()->nama_lengkap }}!</h1>
                        <p class="lead">
                            <i class="bi bi-gem me-2"></i>
                            Poin Saya: <strong>{{ number_format($member->total_poin ?? 0, 0, ',', '.') }}</strong>
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#menu" class="btn btn-outline-light btn-lg" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-cup-hot me-2"></i>Pilih Menu
                            </a>
                            <a href="#history" class="btn btn-outline-light btn-lg" data-aos="fade-up" data-aos-delay="600">
                                <i class="bi bi-clock-history me-2"></i>Lihat Riwayat
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Stats -->
                <div class="row mt-5" data-aos="fade-up" data-aos-delay="800">
                    <div class="col-md-4 text-center">
                        <div class="bg-opacity-20 p-3 rounded-4 backdrop-blur">
                            <h3 class="fw-bold">{{ $voucher->count() }}</h3>
                            <p class="mb-0">Total Transaksi</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-opacity-20 p-3 rounded-4 backdrop-blur">
                            <h3 class="fw-bold">{{ $voucher->where('status_voucher', 'Terverifikasi')->count() }}</h3>
                            <p class="mb-0">Berhasil</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-opacity-20 p-3 rounded-4 backdrop-blur">
                            <h3 class="fw-bold">{{ number_format($member->total_poin ?? 0, 0, ',', '.') }}</h3>
                            <p class="mb-0">Poin Tersisa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Menu Section -->
    <section class="section-padding" id="menu">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Menu Unggulan Kami</h2>
            <p class="text-center text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                Nikmati berbagai pilihan kopi premium dengan kualitas terbaik
            </p>
            
            <div class="row g-4">
                @forelse($products as $index => $product)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card menu-card h-100">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $product->foto ? asset('uploads/' . $product->foto) : asset('images/default-product.jpg') }}"
                                    class="menu-image w-100" alt="{{ $product->nama_produk }}">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-warning">
                                        <i class="bi bi-star-fill me-1"></i>Premium
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->nama_produk }}</h5>
                                <p class="card-text flex-grow-1">
                                    <span class="text-muted">Harga: </span>
                                    <strong class="text-success">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</strong>
                                </p>
                                <p class="card-text">
                                    <span class="text-muted">Atau: </span>
                                    <strong style="color: var(--red-primary);">{{ number_format($product->harga_produk, 0, ',', '.') }} Poin</strong>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <form action="{{route('customer.tukar') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="harga_produk" value="{{ $product->harga_produk }}">
                                    <button type="submit" class="btn btn-primary w-100" 
                                            {{ ($member->total_poin ?? 0) < $product->harga_produk ? 'disabled' : '' }}>
                                        <i class="bi bi-arrow-left-right me-2"></i>
                                        {{ ($member->total_poin ?? 0) < $product->harga_produk ? 'Poin Tidak Cukup' : 'Tukar Sekarang' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up">
                        <div class="text-muted">
                            <i class="bi bi-cup-hot display-1 d-block mb-3"></i>
                            <h4>Menu Sedang Tidak Tersedia</h4>
                            <p>Mohon maaf, saat ini belum ada menu yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Modern Transaction History Section -->
    <section class="section-padding bg-light" id="history" data-aos="fade-up">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Riwayat Penukaran Poin</h2>
            <p class="text-center text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                Lihat semua transaksi penukaran poin Anda
            </p>
            
            <div class="card shadow-lg border-0" data-aos="fade-up" data-aos-delay="400">
                <div class="card-header" style="background: var(--cream-gradient); border: none;">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 fw-bold" style="color: var(--text-primary);">
                                <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi
                            </h5>
                        </div>
                        <div class="col-auto">
                            <span class="badge" style="background: var(--red-gradient);">
                                {{ $voucher->count() }} Transaksi
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3">
                                        <i class="bi bi-calendar-event me-2"></i>Tanggal
                                    </th>
                                    <th class="px-4 py-3">
                                        <i class="bi bi-ticket-perforated me-2"></i>ID Voucher
                                    </th>
                                    <th class="px-4 py-3">
                                        <i class="bi bi-gem me-2"></i>Poin Terpakai
                                    </th>
                                    <th class="px-4 py-3">
                                        <i class="bi bi-check-circle me-2"></i>Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($voucher->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="bi bi-inbox display-1 d-block mb-3 opacity-50"></i>
                                                <h5>Belum Ada Transaksi</h5>
                                                <p class="mb-0">Mulai tukarkan poin Anda dengan menu favorit!</p>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($voucher as $index => $transaction)
                                        <tr style="--row-index: {{ $index }};">
                                            <td class="px-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light rounded-circle p-2 me-3">
                                                        <i class="bi bi-calendar3" style="color: var(--red-primary);"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold">{{ $transaction->created_at->format('d M Y') }}</div>
                                                        <small class="text-muted">{{ $transaction->created_at->format('H:i') }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">
                                                <code class="bg-light px-2 py-1 rounded">{{ $transaction->kode_voucher }}</code>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-gem me-2" style="color: var(--red-primary);"></i>
                                                    <span class="fw-bold">{{ number_format($transaction->poin_terpakai, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">
                                                @php
                                                    $statusClasses = [
                                                        'Terverifikasi' => 'success',
                                                        'Ditolak' => 'danger',
                                                        'Pending' => 'warning'
                                                    ];
                                                    $statusIcons = [
                                                        'Terverifikasi' => 'check-circle-fill',
                                                        'Ditolak' => 'x-circle-fill',
                                                        'Pending' => 'clock-fill'
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $statusClasses[$transaction->status_voucher] ?? 'secondary' }} d-flex align-items-center w-auto">
                                                    <i class="bi bi-{{ $statusIcons[$transaction->status_voucher] ?? 'question-circle-fill' }} me-1"></i>
                                                    {{ $transaction->status_voucher }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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

    <!-- Modern Gallery Section -->
    <section class="section-padding" id="gallery">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Galeri Bach Coffee</h2>
            <p class="text-center text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                Nikmati suasana hangat dan nyaman di kedai kopi kami
            </p>
            
            <div class="row g-4">
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="position-relative overflow-hidden rounded-4">
                        <img src="{{ asset('/uploads/Store.jpeg') }}" class="gallery-img w-100" alt="Bach Coffee Store">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white" 
                             style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h5 class="mb-1">Interior Nyaman</h5>
                            <p class="mb-0 small">Suasana hangat untuk bersantai</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="position-relative overflow-hidden rounded-4">
                        <img src="{{ asset('/uploads/store2.jpeg') }}" class="gallery-img w-100" alt="Bach Coffee Atmosphere">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white" 
                             style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h5 class="mb-1">Pelayanan Terbaik</h5>
                            <p class="mb-0 small">Tim profesional yang ramah</p>
                        </div>
                    </div>
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

    <!-- Modern JavaScript -->
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
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        background-color: rgba(255, 255, 255, 0.5);
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        pointer-events: none;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Modern notification system
            function showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                notification.style.cssText = `
                    top: 20px;
                    right: 20px;
                    z-index: 9999;
                    min-width: 300px;
                    border-radius: var(--border-radius);
                    box-shadow: var(--modern-shadow);
                `;
                notification.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(notification);

                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            }

            // Enhanced form validation
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) {
                        this.classList.remove('is-invalid');
                        if (this.value.trim()) {
                            this.classList.add('is-valid');
                        }
                    }
                });
            });

            // Parallax effect for hero section
            window.addEventListener('scroll', function() {
                const hero = document.querySelector('.hero');
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                if (hero) {
                    hero.style.transform = `translateY(${rate}px)`;
                }
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Add intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('[data-aos]').forEach(el => {
                observer.observe(el);
            });
        });

        // Add CSS for ripple animation and other effects
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .animate-in {
                animation: slideInUp 0.6s ease forwards;
            }
            
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .form-control.is-valid {
                border-color: var(--red-primary);
                box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25);
            }
            
            .form-control.is-invalid {
                border-color: #dc3545;
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            }
        `;
        document.head.appendChild(style);

        // Global functions
        window.BachCoffeeCustomer = {
            showLoading: showLoading,
            hideLoading: hideLoading,
            showNotification: function(message, type = 'success') {
                const notification = document.createElement('div');
                notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                notification.style.cssText = `
                    top: 20px;
                    right: 20px;
                    z-index: 9999;
                    min-width: 300px;
                    border-radius: var(--border-radius);
                    box-shadow: var(--modern-shadow);
                `;
                notification.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    ${message}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(notification);

                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            }
        };
    </script>
</body>

</html>