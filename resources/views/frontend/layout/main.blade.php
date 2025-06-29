<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon-sma-sanjaya.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-sma-sanjaya.jpg') }}">

    @if(isset($post))
        <title>SMA Sanjaya XIV Nanggulan</title>
        <!-- Primary Meta Tags -->
        <meta name="title" content="{{ $post->title }} | SMA Sanjaya Nanggulan">
        <meta name="description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
        <meta name="keywords" content="SMA Sanjaya, Nanggulan, Sekolah, Pendidikan, {{ $post->category ? $post->category->name : 'Artikel' }}">
        <meta name="author" content="{{ $post->user ? $post->user->name : ($post->author ?? 'Admin SMA Sanjaya') }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $post->title }} | SMA Sanjaya Nanggulan">
        <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
        @if($post->image)
            <meta property="og:image" content="{{ asset('storage/' . $post->image) }}">
        @endif
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="SMA Sanjaya Nanggulan">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $post->title }} | SMA Sanjaya Nanggulan">
        <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
        @if($post->image)
            <meta name="twitter:image" content="{{ asset('storage/' . $post->image) }}">
        @endif
        <meta name="twitter:site" content="@sma_sanjaya">
    @else
        <title>SMA Sanjaya Nanggulan</title>

        <!-- Default Meta Tags -->
        <meta name="description" content="Website resmi SMA Sanjaya Nanggulan. Menyajikan informasi akademik, kegiatan sekolah, dan berita terkini.">
        <meta name="keywords" content="SMA Sanjaya, Nanggulan, Sekolah, Pendidikan, Artikel">
        <meta name="author" content="Admin SMA Sanjaya">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="SMA Sanjaya Nanggulan">
        <meta property="og:description" content="Website resmi SMA Sanjaya Nanggulan. Menyajikan informasi akademik, kegiatan sekolah, dan berita terkini.">
        <meta property="og:image" content="{{ asset('assets/images/og-default.jpg') }}"> <!-- Gambar default -->
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="SMA Sanjaya Nanggulan">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="SMA Sanjaya Nanggulan">
        <meta name="twitter:description" content="Website resmi SMA Sanjaya Nanggulan. Menyajikan informasi akademik, kegiatan sekolah, dan berita terkini.">
        <meta name="twitter:image" content="{{ asset('assets/images/og-default.jpg') }}">
        <meta name="twitter:site" content="@sma_sanjaya">
    @endif

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Instrument+Sans:wght@600&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @if(config('app.env') === 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID');
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inisialisasi tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipEl) {
                return new bootstrap.Tooltip(tooltipEl)
            })
    </script>
</head>
<!-- Top Bar -->
<div id="topBar" class="top-bar">
    <div class="container">
        <div class="social-icons">
            <span>Follow Us:</span>
            <a href="#"><div class="social-icon facebook"><i class="fab fa-facebook-f"></i></div></a>
            <a href="#"><div class="social-icon instagram"><i class="fab fa-instagram"></i></div></a>
            <a href="#"><div class="social-icon youtube"><i class="fab fa-youtube"></i></div></a>
        </div>
        <div class="contact-wrapper">
            <div class="contact-info">
                <i class="fas fa-phone"></i> (0274) 6522887
            </div>
            <div class="contact-info">
                <i class="fas fa-envelope"></i> sma_sanjaya14@yahoo.com
            </div>
        </div>
        <div class="location-info">
            <i class="fas fa-map-marker-alt"></i> Jati Sarono, Kec. Nanggulan, Kab. Kulon Progo, DIY
        </div>
    </div>
</div>

<!-- Navbar Container (In Front of Hero) -->
<div class="navbar-container" id="navbarContainer">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="logo-section">
                <div class="logo-container">
                    <img src="{{ asset('assets/img/logo-sma-sanjaya.jpg') }}" alt="Logo SMA Sanjaya" class="logo-img" style="width: 30px;">
                    <div class="school-name">
                        SMA Sanjaya<br>XIV Nanggulan
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-about.index') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-teacher.index') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-information.index') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-document.index') }}">Dokumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe-contact.index') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

@yield('content')

<!-- Footer -->
<footer class="footer">
    <div class="container py-4">
        <div class="row">
            <!-- School Info Column -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo-sma-sanjaya.jpg') }}" alt="SMA Sanjaya Logo" class="me-3" style="width: 80px; height: auto;">
                    <div>
                        <h3 class="mb-0 text-white fw-bold">SMA SANJAYA XIV</h3>
                        <h5 class="text-white fw-light">NANGGULAN</h5>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-white-50">
                    Menyediakan pendidikan berkualitas untuk meningkatkan potensi siswa dan mempersiapkan mereka menuju masa depan yang cerah.
                </p>
            </div>

            <!-- Quick Links Column -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="row">
                    <!-- Tentang Section -->
                    <div class="col-6">
                        <h5 class="text-white fw-bold mb-3">Tentang</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('fe-home.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Home
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('fe-about.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>About
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('fe-post.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Berita
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('fe-gallery.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Gallery
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Akademik Section -->
                    <div class="col-6">
                        <h5 class="text-white fw-bold mb-3">Akademik</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('fe-teacher.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Guru
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('fe-information.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Informasi
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('fe-document.index') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-chevron-right text-white-50 me-2"></i>Dokumen
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Info Column -->
            <div class="col-lg-4">
                <h5 class="text-white fw-bold mb-3">Hubungi Kami</h5>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-map-marker-alt text-white bg-white-10 p-2 rounded me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background-color: rgba(255,255,255,0.1);"></i>
                        <a href="https://www.google.com/maps/place/SMA+Sanjaya+XIV+Nanggulan/@-7.7574289,110.2109529,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7af118b22cf9cf:0xa27f2a76af87475!8m2!3d-7.7574289!4d110.2109529!16s%2Fg%2F11c5m0j8_4?entry=ttu"
                           target="_blank"
                           class="text-white text-decoration-none">
                            Jati Sarono, Kec. Nanggulan,<br>Kab. Kulon Progo, DIY.
                        </a>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-phone-alt text-white bg-white-10 p-2 rounded me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background-color: rgba(255,255,255,0.1);"></i>
                        <span class="text-white">(0274) 6522887</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-envelope text-white bg-white-10 p-2 rounded me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background-color: rgba(255,255,255,0.1);"></i>
                        <span class="text-white">sma_sanjaya14@yahoo.com</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="copyright py-3" style="background-color: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(255, 255, 255, 0.1);">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white-50">
                &copy; 2025 SMA Sanjaya XIV Nanggulan. Developer By: Amos Ziliwu <a href="https://ukrim.ac.id/" class="text-warning">UKRIM UNIVERSITY.</a>
            </div>
            <div class="social-links">
                <a href="#" class="mx-2 text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="mx-2 text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="mx-2 text-white"><i class="fab fa-youtube"></i></a>
                <a href="#" class="mx-2 text-white"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Admin WA -->
<a href="https://wa.me/6281234567890" target="_blank" class="student-whatsapp-button">
    <img src="{{ asset('assets/img/whatsapp.png') }}" alt="Gabung SMA Sanjaya Nanggulan" class="student-image">
</a>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 5000,
        toast: true,
        width: '30rem'
    });
    @endif
</script>
</body>
</html>
