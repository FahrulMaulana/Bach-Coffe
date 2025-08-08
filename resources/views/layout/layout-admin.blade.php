<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bach Coffee | Admin Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Bach Coffee | Admin Dashboard" />
    <meta name="author" content="Bach Coffee" />
    <meta name="description"
        content="Bach Coffee Admin Dashboard - Modern Coffee Shop Management System" />
    <meta name="keywords"
        content="coffee shop, admin dashboard, bach coffee, management system, modern ui" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/AdminLTE-4.0.0-beta3/dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
    <!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />
    
    <!-- Custom Modern Styles -->
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

        /* Modern Header */
        .app-header {
            background: var(--red-gradient) !important;
            border-bottom: none !important;
            box-shadow: var(--modern-shadow) !important;
            backdrop-filter: blur(20px);
            padding: 0.75rem 0 !important;
        }

        .app-header .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 0 5px;
            padding: 10px 15px !important;
        }

        .app-header .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            color: white !important;
            transform: translateY(-2px);
        }

        /* Modern Sidebar */
        .app-sidebar {
            background: var(--cream-gradient) !important;
            border-right: 1px solid var(--cream-dark) !important;
            box-shadow: var(--modern-shadow) !important;
            width: 280px !important;
        }

        .sidebar-brand {
            background: var(--red-gradient) !important;
            border-bottom: none !important;
            padding: 1.5rem 1rem !important;
        }

        .brand-link {
            color: white !important;
            text-decoration: none !important;
            display: flex !important;
            align-items: center !important;
            gap: 15px !important;
        }

        .brand-image {
            width: 45px !important;
            height: 45px !important;
            border-radius: 12px !important;
            object-fit: cover !important;
        }

        .brand-text {
            font-size: 1.4rem !important;
            font-weight: 700 !important;
            color: white !important;
        }

        /* Modern Sidebar Menu */
        .sidebar-menu .nav-item {
            margin: 5px 15px !important;
        }

        .sidebar-menu .nav-link {
            border-radius: var(--border-radius) !important;
            color: var(--text-primary) !important;
            font-weight: 500 !important;
            padding: 12px 20px !important;
            margin: 3px 0 !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }

        .sidebar-menu .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu .nav-link:hover {
            background: var(--red-light) !important;
            color: var(--red-primary) !important;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.2);
        }

        .sidebar-menu .nav-link.active {
            background: var(--red-gradient) !important;
            color: white !important;
            box-shadow: var(--modern-shadow);
        }

        .sidebar-menu .nav-link.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .spinning {
            animation: spin 1s linear infinite;
        }

        /* Modern Main Content */
        .app-main {
            background: var(--cream-light) !important;
            min-height: calc(100vh - 80px);
            padding: 1rem !important;
        }

        /* Modern Footer */
        .app-footer {
            background: var(--cream-gradient) !important;
            border-top: 1px solid var(--cream-dark) !important;
            color: var(--text-secondary) !important;
            padding: 0.75rem 1rem !important;
            font-weight: 500;
        }

        /* Modern Dropdown */
        .dropdown-menu {
            border: none !important;
            border-radius: var(--border-radius) !important;
            box-shadow: var(--modern-shadow-lg) !important;
            background: white !important;
        }

        .dropdown-item {
            color: var(--text-primary) !important;
            font-weight: 500 !important;
            padding: 12px 20px !important;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--red-light) !important;
            color: var(--red-primary) !important;
        }

        /* Modern User Menu */
        .user-image {
            border: 3px solid rgba(255, 255, 255, 0.3) !important;
            transition: all 0.3s ease;
        }

        .user-menu:hover .user-image {
            border-color: white !important;
            transform: scale(1.05);
        }

        .user-header {
            background: var(--red-gradient) !important;
            color: white !important;
            text-align: center !important;
            padding: 2rem 1rem !important;
        }

        /* Modern Badges */
        .navbar-badge {
            background: var(--red-primary) !important;
            color: white !important;
            font-weight: 600 !important;
            border-radius: 10px !important;
            padding: 4px 8px !important;
            font-size: 0.75rem !important;
        }

        /* Modern Buttons */
        .btn-default {
            background: var(--cream-secondary) !important;
            border: 2px solid var(--cream-dark) !important;
            color: var(--text-primary) !important;
            font-weight: 600 !important;
            border-radius: var(--border-radius) !important;
            padding: 10px 20px !important;
            transition: all 0.3s ease;
        }

        .btn-default:hover {
            background: var(--red-primary) !important;
            border-color: var(--red-primary) !important;
            color: white !important;
            transform: translateY(-2px);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .app-sidebar {
                width: 250px !important;
            }
            
            .app-main {
                margin-left: 0 !important;
                padding: 0.75rem !important;
            }
            
            .app-footer {
                margin-left: 0 !important;
                padding: 0.5rem 0.75rem !important;
            }
        }

        /* Smooth Animations */
        * {
            transition: all 0.3s ease;
        }

        /* Content Loading Animation */
        #main-content {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .content-loading {
            opacity: 0.7;
            transform: translateY(10px);
        }

        .content-loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth page transitions */
        .page-transition {
            animation: slideInFromRight 0.4s ease-out;
        }

        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced loading animation */
        .loading-content {
            animation: fadeIn 0.3s ease-in;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--red-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--red-secondary);
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(245, 241, 235, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--cream-dark);
            border-top: 5px solid var(--red-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg">
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link">
                            <i class="bi bi-house-door me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link">
                            <i class="bi bi-telephone me-2"></i>Kontak
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Navbar Search-->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button" title="Pencarian">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!--end::Navbar Search-->
                    <!--begin::Messages Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" title="Pesan">
                            <i class="bi bi-chat-text"></i>
                            <span class="navbar-badge badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="dropdown-header">
                                <strong>3 Pesan Baru</strong>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/AdminLTE-4.0.0-beta3/dist/assets/img/user1-128x128.jpg"
                                            alt="User Avatar" class="img-size-50 rounded-circle me-3" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Manager Kafe
                                            <span class="float-end fs-7 text-danger"><i
                                                    class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">Laporan penjualan hari ini tersedia</p>
                                        <p class="fs-7 text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 2 Jam yang lalu
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
                        </div>
                    </li>
                    <!--end::Messages Dropdown Menu-->
                    <!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" title="Notifikasi">
                            <i class="bi bi-bell-fill"></i>
                            <span class="navbar-badge badge">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="dropdown-header">
                                <strong>5 Notifikasi</strong>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-cup-hot me-2 text-primary"></i> Pesanan baru masuk
                                <span class="float-end text-secondary fs-7">5 menit</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-people-fill me-2 text-success"></i> Member baru terdaftar
                                <span class="float-end text-secondary fs-7">1 jam</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-exclamation-triangle me-2 text-warning"></i> Stok kopi menipis
                                <span class="float-end text-secondary fs-7">3 jam</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer"> Lihat Semua Notifikasi </a>
                        </div>
                    </li>
                    <!--end::Notifications Dropdown Menu-->
                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen" title="Layar Penuh">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                                class="user-image rounded-circle shadow" alt="User Image" />
                            <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header">
                                <img src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                                    class="rounded-circle shadow" alt="User Image" />
                                <p>
                                    {{ Auth::user()->name ?? 'Admin' }} - Bach Coffee
                                    <small>Administrator</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Body-->
                            <li class="user-body">
                                <!--begin::Row-->
                                <div class="row text-center">
                                    <div class="col-4">
                                        <a href="#" class="text-decoration-none">
                                            <i class="bi bi-people-fill d-block"></i>
                                            <span>Member</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="text-decoration-none">
                                            <i class="bi bi-graph-up d-block"></i>
                                            <span>Penjualan</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="text-decoration-none">
                                            <i class="bi bi-cup-hot d-block"></i>
                                            <span>Produk</span>
                                        </a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </li>
                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer d-flex justify-content-between">
                                <a href="#" class="btn btn-default">
                                    <i class="bi bi-person-circle me-2"></i>Profil
                                </a>
                                <a href="{{route('logout')}}" class="btn btn-default">
                                    <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                </a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar shadow" data-bs-theme="light">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="/admin/layout" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="/uploads/logobach.png" alt="Bach Coffee"
                        class="brand-image" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text">Bach Coffee</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-3">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/admin/layout" class="nav-link {{ Request::is('admin/layout') ? 'active' : '' }}">
                                <i class="bi bi-speedometer2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @if(Auth::user()->id_level == 1)
                            <li class="nav-item">
                                <a href="{{route('kasir')}}" class="nav-link {{ Request::is('admin/kasir*') ? 'active' : '' }}">
                                    <i class="bi bi-person-badge"></i>
                                    <p>Kelola Kasir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member')}}" class="nav-link {{ Request::is('admin/member*') ? 'active' : '' }}">
                                    <i class="bi bi-people"></i>
                                    <p>Kelola Member</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('produk')}}" class="nav-link {{ Request::is('admin/produk*') ? 'active' : '' }}">
                                    <i class="bi bi-cup-hot"></i>
                                    <p>Kelola Produk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('transaksi')}}" class="nav-link {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
                                    <i class="bi bi-receipt"></i>
                                    <p>Transaksi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('voucher') }}" class="nav-link {{ Request::is('admin/voucher*') ? 'active' : '' }}">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <p>Verifikasi Voucher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('laporan')}}" class="nav-link {{ Request::is('admin/laporan*') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->id_level == 2)
                            <li class="nav-item">
                                <a href="{{ route('voucher') }}" class="nav-link {{ Request::is('admin/voucher*') ? 'active' : '' }}">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <p>Verifikasi Voucher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('transaksi')}}" class="nav-link {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
                                    <i class="bi bi-receipt"></i>
                                    <p>Transaksi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('laporan')}}" class="nav-link {{ Request::is('admin/laporan*') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->id_level == 3)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-gift"></i>
                                    <p>Tukar Poin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-megaphone"></i>
                                    <p>Promo</p>
                                </a>
                            </li>
                        @endif
                        
                        <!-- Divider -->
                        <li class="nav-item mt-4">
                            <div style="border-top: 1px solid var(--cream-dark); margin: 0 20px;"></div>
                        </li>
                        
                        <!-- Additional Menu Items -->
                        <!-- <li class="nav-item mt-3">
                            <a href="#" class="nav-link">
                                <i class="bi bi-gear"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-question-circle"></i>
                                <p>Bantuan</p>
                            </a>
                        </li> -->
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        
        <!--begin::Main Content-->
        <main class="app-main">
            <div id="main-content">
                @yield('content')
            </div>
            
            <!-- Loading Content Overlay -->
            <div id="content-loading" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(245, 241, 235, 0.8); z-index: 999; backdrop-filter: blur(3px);">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: var(--red-primary);">
                    <div class="loading-spinner" style="width: 40px; height: 40px; margin: 0 auto 1rem;"></div>
                    <div>Memuat konten...</div>
                </div>
            </div>
        </main>
        <!--end::Main Content-->
        
        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">
                <strong>Bach Coffee Admin v2.0</strong>
            </div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; {{ date('Y') }}&nbsp;
                <a href="#" class="text-decoration-none">Bach Coffee</a>.
            </strong>
            Semua hak dilindungi.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="/AdminLTE-4.0.0-beta3/dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)-->
    
    <!-- Custom Modern JavaScript -->
    <script>
        // Modern Admin Dashboard Functions
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize OverlayScrollbars
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = {
                scrollbarTheme: 'os-theme-light',
                scrollbarAutoHide: 'leave',
                scrollbarClickScroll: true,
            };

            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }

            // Loading overlay functions
            function showLoading() {
                document.getElementById('loadingOverlay').style.display = 'flex';
            }

            function hideLoading() {
                document.getElementById('loadingOverlay').style.display = 'none';
            }

            // Auto-hide loading after page load
            window.addEventListener('load', function() {
                setTimeout(hideLoading, 500);
            });

            // Add loading to all navigation links
            document.querySelectorAll('.nav-link[href]:not([href="#"])').forEach(link => {
                link.addEventListener('click', function(e) {
                    showLoading();
                });
            });

            // AJAX Navigation for Sidebar Links
            document.querySelectorAll('.sidebar-menu .nav-link[href]:not([href="#"])').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const url = this.getAttribute('href');
                    const currentActive = document.querySelector('.sidebar-menu .nav-link.active');
                    
                    // Prevent multiple rapid clicks
                    if (this.classList.contains('loading')) {
                        return;
                    }
                    
                    // Add loading state to the clicked link
                    this.classList.add('loading');
                    const originalHTML = this.innerHTML;
                    this.innerHTML = originalHTML.replace(/(<i[^>]*><\/i>)/, '$1<i class="bi bi-arrow-clockwise spinning ms-1"></i>');
                    
                    // Remove active class from current link
                    if (currentActive) {
                        currentActive.classList.remove('active');
                    }
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show content loading
                    showContentLoading();
                    
                    // Load content via AJAX
                    loadContent(url)
                        .then(() => {
                            // Update browser URL without refresh
                            history.pushState({url: url}, '', url);
                        })
                        .finally(() => {
                            // Remove loading state
                            this.classList.remove('loading');
                            this.innerHTML = originalHTML;
                        });
                });
            });

            // Handle browser back/forward buttons
            window.addEventListener('popstate', function(e) {
                if (e.state && e.state.url) {
                    showContentLoading();
                    loadContent(e.state.url);
                    updateActiveMenu(e.state.url);
                }
            });

            // Content loading functions
            function showContentLoading() {
                document.getElementById('content-loading').style.display = 'block';
            }

            function hideContentLoading() {
                document.getElementById('content-loading').style.display = 'none';
            }

            function loadContent(url) {
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    // Extract content from the response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    
                    // Try different selectors to find the main content
                    let newContent = doc.querySelector('#main-content, .app-main .container-fluid, .content-wrapper, .content, main .container-fluid, .main-content');
                    
                    if (!newContent) {
                        // If no main content found, try to extract from @yield('content') area
                        const bodyContent = doc.body;
                        if (bodyContent) {
                            // Look for content between typical Laravel blade sections
                            const contentElements = bodyContent.querySelectorAll('.container-fluid, .container, .row, .col, .card, .content, .main');
                            if (contentElements.length > 0) {
                                newContent = contentElements[0];
                            } else {
                                // Last resort: create a wrapper with the body content
                                const wrapper = document.createElement('div');
                                wrapper.innerHTML = bodyContent.innerHTML;
                                newContent = wrapper;
                            }
                        }
                    }
                    
                    if (newContent) {
                        // Clear and update main content
                        const mainContentEl = document.getElementById('main-content');
                        mainContentEl.innerHTML = '';
                        
                        // Copy the content
                        if (newContent.id === 'main-content') {
                            mainContentEl.innerHTML = newContent.innerHTML;
                        } else {
                            mainContentEl.appendChild(newContent.cloneNode(true));
                        }
                    } else {
                        throw new Error('Content not found in response');
                    }
                    
                    hideContentLoading();
                    
                    // Re-initialize any JavaScript components in the new content
                    initializeNewContent();
                    
                    // Show success notification
                    BachCoffeeAdmin.showNotification('Halaman berhasil dimuat', 'success');
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    hideContentLoading();
                    
                    // Show error notification
                    BachCoffeeAdmin.showNotification('Gagal memuat halaman. Mengalihkan...', 'warning');
                    
                    // Fallback to normal navigation after a short delay
                    setTimeout(() => {
                        window.location.href = url;
                    }, 1000);
                });
            }

            function updateActiveMenu(url) {
                // Remove active class from all menu items
                document.querySelectorAll('.sidebar-menu .nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                
                // Add active class to matching menu item
                document.querySelectorAll('.sidebar-menu .nav-link[href]').forEach(link => {
                    if (link.getAttribute('href') === url) {
                        link.classList.add('active');
                    }
                });
            }

            function initializeNewContent() {
                // Add smooth animation to new content
                const mainContent = document.getElementById('main-content');
                mainContent.classList.add('page-transition');
                
                // Remove animation class after animation completes
                setTimeout(() => {
                    mainContent.classList.remove('page-transition');
                }, 400);

                // Re-initialize tooltips for new content
                const newTooltips = [].slice.call(document.querySelectorAll('#main-content [data-bs-toggle="tooltip"], #main-content [title]'));
                newTooltips.forEach(function (tooltipTriggerEl) {
                    new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Re-initialize popovers for new content
                const newPopovers = [].slice.call(document.querySelectorAll('#main-content [data-bs-toggle="popover"]'));
                newPopovers.forEach(function (popoverTriggerEl) {
                    new bootstrap.Popover(popoverTriggerEl);
                });

                // Re-initialize modals for new content
                const newModals = [].slice.call(document.querySelectorAll('#main-content .modal'));
                newModals.forEach(function (modalEl) {
                    new bootstrap.Modal(modalEl);
                });

                // Re-apply hover effects to new cards
                document.querySelectorAll('#main-content .card').forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-5px)';
                        this.style.boxShadow = 'var(--modern-shadow-lg)';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = 'var(--modern-shadow)';
                    });
                });

                // Re-apply ripple effect to new buttons
                document.querySelectorAll('#main-content .btn').forEach(button => {
                    if (!button.hasAttribute('data-ripple-enabled')) {
                        button.setAttribute('data-ripple-enabled', 'true');
                        button.addEventListener('click', function(e) {
                            const ripple = document.createElement('span');
                            const rect = this.getBoundingClientRect();
                            const size = Math.max(rect.width, rect.height);
                            const x = e.clientX - rect.left - size / 2;
                            const y = e.clientY - rect.top - size / 2;
                            
                            ripple.style.cssText = `
                                position: absolute;
                                width: ${size}px;
                                height: ${size}px;
                                left: ${x}px;
                                top: ${y}px;
                                background: rgba(255, 255, 255, 0.3);
                                border-radius: 50%;
                                transform: scale(0);
                                animation: ripple 0.6s ease-out;
                                pointer-events: none;
                            `;
                            
                            this.style.position = 'relative';
                            this.style.overflow = 'hidden';
                            this.appendChild(ripple);
                            
                            setTimeout(() => {
                                ripple.remove();
                            }, 600);
                        });
                    }
                });

                // Re-enable AJAX forms if any
                document.querySelectorAll('#main-content form[data-ajax="true"]').forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        
                        const formData = new FormData(this);
                        const url = this.action;
                        const method = this.method;
                        
                        BachCoffeeAdmin.showContentLoading();
                        
                        fetch(url, {
                            method: method,
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            BachCoffeeAdmin.hideContentLoading();
                            
                            if (data.success) {
                                BachCoffeeAdmin.showNotification(data.message || 'Operasi berhasil', 'success');
                                
                                if (data.redirect) {
                                    BachCoffeeAdmin.loadContent(data.redirect)
                                        .then(() => {
                                            history.pushState({url: data.redirect}, '', data.redirect);
                                        });
                                }
                            } else {
                                BachCoffeeAdmin.showNotification(data.message || 'Terjadi kesalahan', 'danger');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            BachCoffeeAdmin.hideContentLoading();
                            BachCoffeeAdmin.showNotification('Terjadi kesalahan sistem', 'danger');
                        });
                    });
                });

                // Scroll to top after content load
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Modern tooltip initialization
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"], [title]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
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
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(notification);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            }

            // Add hover effects to cards
            document.querySelectorAll('.card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = 'var(--modern-shadow-lg)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'var(--modern-shadow)';
                });
            });

            // Modern search functionality
            const searchInput = document.querySelector('[data-widget="navbar-search"]');
            if (searchInput) {
                searchInput.addEventListener('click', function(e) {
                    e.preventDefault();
                    const searchModal = `
                        <div class="modal fade" id="searchModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="border-radius: var(--border-radius); border: none; box-shadow: var(--modern-shadow-lg);">
                                    <div class="modal-header" style="background: var(--red-gradient); color: white;">
                                        <h5 class="modal-title">
                                            <i class="bi bi-search me-2"></i>Pencarian Cepat
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Ketik untuk mencari..." style="border-radius: var(--border-radius); border: 2px solid var(--cream-dark);">
                                            <button class="btn btn-outline-secondary" type="button" style="border-radius: var(--border-radius);">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                        <div class="search-results">
                                            <p class="text-muted">Mulai ketik untuk melihat hasil pencarian...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    if (!document.getElementById('searchModal')) {
                        document.body.insertAdjacentHTML('beforeend', searchModal);
                    }
                    
                    const modal = new bootstrap.Modal(document.getElementById('searchModal'));
                    modal.show();
                });
            }

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

            // Add CSS for ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);

            // Modern active link highlighting
            const currentPath = window.location.pathname;
            document.querySelectorAll('.sidebar-menu .nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                    link.parentElement.classList.add('menu-open');
                }
            });

            // Responsive sidebar toggle
            const sidebarToggle = document.querySelector('[data-lte-toggle="sidebar"]');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-collapse');
                });
            }

            // Auto-close alerts
            document.querySelectorAll('.alert').forEach(alert => {
                if (!alert.querySelector('.btn-close')) {
                    setTimeout(() => {
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 300);
                    }, 5000);
                }
            });

            // Initialize all tooltips and popovers
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        });

        // Global functions for modern features
        window.BachCoffeeAdmin = {
            showLoading: function() {
                document.getElementById('loadingOverlay').style.display = 'flex';
            },
            hideLoading: function() {
                document.getElementById('loadingOverlay').style.display = 'none';
            },
            showContentLoading: function() {
                document.getElementById('content-loading').style.display = 'block';
            },
            hideContentLoading: function() {
                document.getElementById('content-loading').style.display = 'none';
            },
            loadContent: function(url) {
                return fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    const newContent = doc.querySelector('main .app-main, main, .content-wrapper, .content, #content, .main-content');
                    
                    if (newContent) {
                        document.getElementById('main-content').innerHTML = newContent.innerHTML;
                    } else {
                        const fallbackContent = doc.querySelector('body').innerHTML;
                        const contentMatch = fallbackContent.match(/<main[^>]*>([\s\S]*?)<\/main>/i);
                        if (contentMatch) {
                            document.getElementById('main-content').innerHTML = contentMatch[1];
                        } else {
                            document.getElementById('main-content').innerHTML = doc.querySelector('body').innerHTML;
                        }
                    }
                    
                    // Re-initialize components
                    if (typeof initializeNewContent === 'function') {
                        initializeNewContent();
                    }
                    
                    return data;
                });
            },
            showNotification: function(message, type = 'info') {
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
                    <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle'}-fill me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(notification);

                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            },
            enableSmoothNavigation: function() {
                // This function can be called to re-enable smooth navigation after dynamic content changes
                document.querySelectorAll('.sidebar-menu .nav-link[href]:not([href="#"])').forEach(link => {
                    if (!link.hasAttribute('data-ajax-enabled')) {
                        link.setAttribute('data-ajax-enabled', 'true');
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            
                            const url = this.getAttribute('href');
                            const currentActive = document.querySelector('.sidebar-menu .nav-link.active');
                            
                            if (currentActive) {
                                currentActive.classList.remove('active');
                            }
                            
                            this.classList.add('active');
                            BachCoffeeAdmin.showContentLoading();
                            
                            BachCoffeeAdmin.loadContent(url)
                                .then(() => {
                                    BachCoffeeAdmin.hideContentLoading();
                                    history.pushState({url: url}, '', url);
                                    BachCoffeeAdmin.showNotification('Halaman berhasil dimuat', 'success');
                                })
                                .catch(error => {
                                    console.error('Error loading content:', error);
                                    BachCoffeeAdmin.hideContentLoading();
                                    BachCoffeeAdmin.showNotification('Gagal memuat halaman. Silakan coba lagi.', 'danger');
                                    window.location.href = url;
                                });
                        });
                    }
                });
            }
        };
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>