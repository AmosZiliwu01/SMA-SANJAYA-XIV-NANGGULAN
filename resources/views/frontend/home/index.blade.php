@extends('frontend.layout.main')
@section('content')

    <!-- Slider Section (Carousel) -->
    <section>
        <div class="slider_img">
            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                @if($sliderPosts->count() > 0)
                    <ol class="carousel-indicators">
                        @foreach($sliderPosts as $index => $post)
                            <li data-bs-target="#carousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($sliderPosts as $index => $post)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="d-block" src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/slider-1.jpeg') }}" alt="{{ $post->title }}">
                                <div class="carousel-caption d-md-block">
                                    <div class="slider_title">
                                        <!-- Judul responsive - pendek di mobile, panjang di desktop -->
                                        <h1 class="d-none d-md-block">{{ $post->title }}</h1>
                                        <h1 class="d-block d-md-none">{{ Str::limit($post->title, 40) }}</h1>

                                        <!-- Deskripsi hanya tampil di desktop -->
                                        <h4 class="d-none d-md-block">{{ Str::limit(strip_tags($post->content), 100) }}</h4>

                                        <div class="slider-btn">
                                            <a href="{{ route('fe-post.detail', $post->slug) }}" class="btn btn-default">
                                                <!-- Text button responsive -->
                                                <span class="d-none d-md-inline">Baca Selengkapnya</span>
                                                <span class="d-inline d-md-none">Baca</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Default slider if no slider posts -->
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{asset('assets/img/slider-1.jpeg')}}" alt="First slide">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                    <h1>Selamat Datang di SMA Sanjaya XIV Nanggulan</h1>
                                    <h4>Membentuk Generasi Berintegritas, Berprestasi, dan Berakhlak Mulia</h4>
                                    <div class="slider-btn">
                                        <a href="{{route('fe-about.index')}}" class="btn btn-default">Pelajari Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{asset('assets/img/slider-2.jpg')}}" alt="Second slide">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                    <h1>Guru Berkualitas Tinggi</h1>
                                    <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Kami memiliki pengajar terbaik untuk pendidikan optimal.</h4>
                                    <div class="slider-btn">
                                        <a href="{{route('fe-teacher.index')}}" class="btn btn-default">Lihat Profil Guru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{asset('assets/img/slider-3.jpg')}}" alt="Third slide">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                    <h1>Proses Belajar Interaktif</h1>
                                    <h4>Kami menciptakan lingkungan belajar yang menyenangkan dan interaktif<br> untuk mengembangkan potensi siswa secara optimal.</h4>
                                    <div class="slider-btn">
                                        <a href="{{route('fe-gallery.index')}}" class="btn btn-default">Lihat Galeri</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="welcome-header">
                        <h2>WELCOME TO <span class="text-primary">SMA SANJAYA XIV NANGGULAN</span></h2>
                        <div class="welcome-divider">
                            <div class="line"></div>
                            <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <p class="welcome-text">
                        @if($schoolPrincipal && $schoolPrincipal->welcome_message)
                            {{ $schoolPrincipal->welcome_message }}
                        @else
                            Kami Menyambut baik terbitnya Website SMA Sanjaya, dengan harapan dipublikasinya
                            website ini sekolah berharapkan peningkatan layanan pendidikan kepada siswa, orangtua, dan
                            masyarakat pada umumnya semakin meningkat.
                        @endif
                    </p>
                    @if($schoolPrincipal && $schoolPrincipal->name)
                        <div class="principal-info mt-3">
                            <strong>{{ $schoolPrincipal->name }}</strong><br>
                            <em>Kepala Sekolah</em>
                        </div>
                    @endif
                </div>
                <div class="col-lg-5">
                    <div class="welcome-image-container">
                        <img src="{{ $schoolPrincipal && $schoolPrincipal->image ? asset('storage/principals/' . $schoolPrincipal->image) : asset('assets/img/kepala-sekolah.jpg') }}"
                             alt="{{ $schoolPrincipal ? $schoolPrincipal->name : 'Kepala Sekolah' }}"
                             class="welcome-image img-fluid rounded-circle"
                             onerror="this.src='{{ asset('assets/img/kepala-sekolah.jpg') }}'">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section bg-light py-5">
        <div class="container">
            <div class="section-header mb-4">
                <h2 class="section-title-news">Berita Terbaru</h2>
                <a href="{{route('fe-post.index')}}" class="view-all">Baca Semua Berita</a>
            </div>

            <div class="row">
                @if($latestPosts->count() > 0)
                    @foreach($latestPosts as $post)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="{{ route('fe-post.detail', $post->slug) }}" class="text-decoration-none">
                                <div class="news-item">
                                    <div class="news-image">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/slider-1.jpeg') }}" alt="{{ $post->title }}" class="img-fluid">
                                    </div>
                                    <div class="news-content">
                                        <div class="news-date">{{ $post->created_at->format('d-m-Y') }}</div>
                                        <div class="news-category">{{ $post->category ? $post->category->name : 'INFORMASI' }}</div>
                                        <h3 class="news-title">
                                            {{ Str::limit($post->title, 80) }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <!-- Default news items if no posts exist -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="#" class="text-decoration-none">
                            <div class="news-item">
                                <div class="news-image">
                                    <img src="{{asset('assets/img/slider-2.jpg')}}" alt="berita" class="img-fluid">
                                </div>
                                <div class="news-content">
                                    <div class="news-date">{{ date('d-m-Y') }}</div>
                                    <div class="news-category">INFORMASI</div>
                                    <h3 class="news-title">
                                        Belum ada berita terbaru
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Additional Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row">
                <!-- Image Gallery Preview -->
                <div class="col-lg-4 mb-4">
                    <div class="feature-card d-flex flex-column h-100">
                        <div class="feature-header">
                            <h3><i class="fas fa-images me-2"></i> Galeri Kegiatan</h3>
                        </div>
                        <div class="gallery-preview flex-grow-1">
                            <div class="row g-2">
                                @if($galleryImages->count() > 0)
                                    @foreach($galleryImages as $gallery)
                                        <div class="col-4">
                                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center">
                                        Galeri belum tersedia
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center mt-3 mb-3">
                            <a href="{{ route('fe-gallery.index') }}" class="btn btn-outline-primary btn-sm">
                                Lihat Semua Galeri
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Agenda Sekolah -->
                <div class="col-lg-4 mb-4">
                    <div class="feature-card d-flex flex-column h-100">
                        <div class="feature-header">
                            <h3><i class="fas fa-calendar-alt me-2"></i> Agenda Sekolah</h3>
                        </div>
                        <div class="agenda-list flex-grow-1">
                            @if($upcomingAgendas->count() > 0)
                                @foreach($upcomingAgendas as $agenda)
                                    <div class="agenda-item">
                                        <div class="agenda-date">
                                            <span class="day">{{ \Carbon\Carbon::parse($agenda->start_date)->format('d') }}</span>
                                            <span class="month">{{ \Carbon\Carbon::parse($agenda->start_date)->format('M') }}</span>
                                        </div>
                                        <div class="agenda-content">
                                            <h5>{{ $agenda->name }}</h5>
                                            <p class="mb-0">{{ $agenda->time ?? '08:00 WIB' }} - {{ $agenda->place ?? 'Sekolah' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Default agenda if no agenda exists -->
                                <div class="agenda-item">
                                    <div class="agenda-date">
                                        <span class="day">{{ date('d') }}</span>
                                        <span class="month">{{ date('M') }}</span>
                                    </div>
                                    <div class="agenda-content">
                                        <h5>Belum ada agenda yang akan datang</h5>
                                        <p class="mb-0">-</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="text-center mt-3 mb-3">
                            <a href="{{ route('fe-information.index') }}#agenda" class="btn btn-outline-primary btn-sm">Lihat Semua Agenda</a>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="col-lg-4 mb-4">
                    <div class="feature-card d-flex flex-column h-100">
                        <div class="feature-header">
                            <h3><i class="fas fa-bullhorn me-2"></i> Pengumuman</h3>
                        </div>
                        <div class="announcement-list flex-grow-1">
                            @if($latestAnnouncements->count() > 0)
                                @foreach($latestAnnouncements as $announcement)
                                    <div class="announcement-item">
                                        <div class="announcement-date">{{ $announcement->created_at->format('d M Y') }}</div>
                                        <h5><a href="#">{{ $announcement->title }}</a></h5>
                                        <p>{{ Str::limit(strip_tags($announcement->content), 100) }}</p>
                                    </div>
                                @endforeach
                            @else
                                <!-- Default announcement if no announcements exist -->
                                <div class="announcement-item">
                                    <div class="announcement-date">{{ date('d M Y') }}</div>
                                    <h5><a href="#">Belum ada pengumuman terbaru</a></h5>
                                    <p>Pengumuman akan ditampilkan di sini.</p>
                                </div>
                            @endif
                        </div>

                        <div class="text-center mt-3 mb-3">
                            <a href="{{ route('fe-information.index') }}#pengumuman" class="btn btn-outline-primary btn-sm">Lihat Semua Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d256.54141042881093!2d110.21095289137934!3d-7.757428910240969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af118b22cf9cf%3A0xa27f2a76af87475!2sSMA%20Sanjaya%20XIV%20Nanggulan!5e1!3m2!1sen!2sid!4v1747698384225!5m2!1sen!2sid"
                            width="100%"
                            height="400"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
