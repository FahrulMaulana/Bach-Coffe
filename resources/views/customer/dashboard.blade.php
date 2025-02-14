<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bach Coffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3c2415;
            --secondary-color: #8b4513;
            --accent-color:rgb(17, 16, 15);
        }
        .hero {
            position: relative;
            height: 100vh;
            background: url('{{ asset("/build/assets/anime.gif") }}') center/cover no-repeat;
            background-color: #000; /* Fallback */
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .menu-card {
            transition: transform 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .menu-card:hover {
            transform: translateY(-10px);
        }

        .menu-image {
            height: 250px;
            object-fit: cover;
        }

        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;
        }

        .gallery-img {
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }

        .contact-form {
            background: rgba(255,255,255,0.9);
            border-radius: 15px;
            padding: 30px;
        }

        .navbar {
            transition: background 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(0,0,0,0.9) !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
        <nav class="navbar navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img
                    src="/AdminLTE-4.0.0-beta3/dist/assets/img/AdminLTELogo.png"
                    alt="Bach Coffee"
                    class="brand-image opacity-75 shadow"
                    style="width: 50px; height: auto;"
                />
            </a>
            <!-- Remove navbar-toggler button and collapse div -->
            <div class="navbar-nav ms-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img
                            src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                            class="user-image rounded-circle shadow"
                            alt="User Image"
                            width="30"
                            height="30"
                        />
                        <span class="d-inline">{{ Auth::user()->nama_lengkap }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
    <div class="hero-overlay d-flex align-items-center">
        <div class="container text-white">
            <div class="d-flex align-items-center gap-4">
                <img
                    src="/AdminLTE-4.0.0-beta3/dist/assets/img/user2-160x160.jpg"
                    class="user-image rounded-circle shadow"
                    alt="User Image"
                    style="width: 160px; height: 160px;"
                />
                <div>
                    <h1 class="display-1 fw-bold mb-4" data-aos="fade-up">{{ Auth::user()->nama_lengkap}}</h1>
                    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">
                        Point Saya: {{ number_format($member->total_poin ?? 0, 0, ',', '.') }}
                    </p>
                    <a href="#menu" class="btn btn-outline-light btn-lg" data-aos="fade-up" data-aos-delay="400">
                        Pilih Menu
                    </a>
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
                @forelse($products as $product)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card menu-card shadow">
                        <img src="{{ $product->foto ? asset('uploads/' . $product->foto) : asset('images/default-product.jpg') }}" 
                             class="menu-image" alt="{{ $product->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_produk }}</h5>
                            <p class="card-text">Rp {{ number_format($product->harga_produk, 0, ',', '.') }} / {{ number_format($product->harga_produk, 0, ',', '.') }} Point</p>
                        </div>
                        <div class="card-footer">
                            <form action="#" method="post">
                                @csrf
                                <!-- <input type="hidden" name="product_id" value="{{ $product->id }}"> -->
                                <button type="submit" class="btn btn-primary w-100">Tukar</button>
                            </form>
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

    <!-- About Section with Parallax -->
    <section class="parallax" id="about" style="background-image: url('/images/cafe-interior.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <div class="bg-white p-4 rounded shadow">
                    <h2>Cerita Kami</h2>
                    <p class="lead">Menghadirkan Cita Rasa Sejak 2020</p>
                    <p>Berawal dari passion kami terhadap kopi, kami membangun tempat ini untuk berbagi kehangatan dan kebahagiaan melalui secangkir kopi pilihan terbaik.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="bg-white p-4 rounded shadow">
                    <h2>Komitmen Kami</h2>
                    <p class="lead">Memberikan Yang Terbaik</p>
                    <p>Setiap cangkir yang kami sajikan adalah hasil dari dedikasi kami dalam memilih biji kopi terbaik dalam menciptakan pengalaman kopi yang tak terlupakan.</p>
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
                <div class="col-md-4" data-aos="zoom-in">
                  <img src="{{ asset('/build/assets/cafe1.jpg') }}"  class="gallery-img w-100" alt="Gallery">
                </div>
                <!-- Add more gallery items -->
                <div class="col-md-4" data-aos="zoom-in">
                  <img src="{{ asset('/build/assets/cafe2.jpg') }}"  class="gallery-img w-100" alt="Gallery">
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                  <img src="{{ asset('/build/assets/cafe3.jpg') }}"  class="gallery-img w-100" alt="Gallery">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5 bg-dark text-white" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <h2>Contact Us</h2>
                    <div class="mt-4">
                        <p><i class="bi bi-geo-alt me-2"></i> 123 Coffee Street, City</p>
                        <p><i class="bi bi-telephone me-2"></i> (123) 456-7890</p>
                        <p><i class="bi bi-envelope me-2"></i> info@cafeartisan.com</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="contact-form">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">&copy; 2024 Bach Coffe. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init();

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>