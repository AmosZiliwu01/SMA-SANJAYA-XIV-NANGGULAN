@extends('frontend.layout.main')
@section('content')

    <!-- Hero Section for News Detail -->
    <section class="news-hero-section">
        <!-- Background Image -->
        @if($post->image)
            <div class="hero-background" style="background-image: url('{{ asset('storage/' . $post->image) }}');">
                <div class="hero-overlay"></div>
            </div>
        @else
            <div class="hero-background hero-default-bg">
                <div class="hero-overlay"></div>
            </div>
        @endif

        <!-- Hero Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="hero-content">
                        <div class="hero-content-wrapper align-items-start">
                            <!-- Date Box (Left side) - Hidden on mobile -->
                            <div class="hero-date-box d-none d-md-block">
                                <div class="date-number">{{ $post->created_at->format('d') }}</div>
                                <div class="date-month">{{ strtoupper($post->created_at->format('M')) }}</div>
                            </div>

                            <!-- Content (Right side) -->
                            <div class="hero-text-content">
                                <!-- Title -->
                                <h1 class="hero-title">{{ $post->title }}</h1>

                                <!-- Meta Information -->
                                <div class="hero-meta">
                                    <span class="meta-author">OLEH: {{ strtoupper($post->user ? $post->user->name : ($post->author ?? 'ADMIN')) }}</span>
                                    <span class="meta-separator">/</span>
                                    @if($post->category)
                                        <span class="meta-category">{{ strtoupper($post->category->name) }}</span>
                                    @else
                                        <span class="meta-category">ARTIKEL</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('fe-home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('fe-post.index') }}">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 150) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- News Content Section -->
    <section class="news-content-section">
        <div class="container">
            <div class="row">
                <!-- Main Content Column (Left side) -->
                <div class="col-lg-8">
                    <!-- News Content - Removed card background -->
                    <div class="news-content">
                        {!! $post->content !!}
                    </div>
                </div>

                <!-- Sidebar Column (Right side) -->
                <div class="col-lg-4">
                    <!-- Social Share Section -->
                    <div class="sidebar-section social-share">
                        <div class="share-text mb-3">
                            <h5 class="fw-bold">Bagikan Artikel:</h5>
                        </div>
                        <div class="row g-2">
                            <!-- Facebook -->
                            <div class="col-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($post->title . ' - ' . Str::limit(strip_tags($post->content), 100)) }}"
                                   target="_blank"
                                   class="btn btn-facebook d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan ke Facebook">
                                    <i class="fab fa-facebook-f me-2"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>

                            <!-- Twitter -->
                            <div class="col-6">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title . ' - ' . Str::limit(strip_tags($post->content), 70)) }}&hashtags=SMA_Sanjaya"
                                   target="_blank"
                                   class="btn btn-twitter d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan ke Twitter">
                                    <i class="fab fa-twitter me-2"></i>
                                    <span>Twitter</span>
                                </a>
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-6">
                                <a href="https://wa.me/?text={{ urlencode('*' . $post->title . '*' . "\n\n" . Str::limit(strip_tags($post->content), 100) . "\n\n" . 'Baca selengkapnya: ' . url()->current()) }}"
                                   target="_blank"
                                   class="btn btn-whatsapp d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan via WhatsApp">
                                    <i class="fab fa-whatsapp me-2"></i>
                                    <span>WhatsApp</span>
                                </a>
                            </div>

                            <!-- LinkedIn -->
                            <div class="col-6">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}&summary={{ urlencode(Str::limit(strip_tags($post->content), 200)) }}"
                                   target="_blank"
                                   class="btn btn-linkedin d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan ke LinkedIn">
                                    <i class="fab fa-linkedin-in me-2"></i>
                                    <span>LinkedIn</span>
                                </a>
                            </div>

                            <!-- Telegram -->
                            <div class="col-6">
                                <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title . "\n\n" . Str::limit(strip_tags($post->content), 100)) }}"
                                   target="_blank"
                                   class="btn btn-telegram d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan via Telegram">
                                    <i class="fab fa-telegram-plane me-2"></i>
                                    <span>Telegram</span>
                                </a>
                            </div>

                            <!-- Email -->
                            <div class="col-6">
                                <a href="mailto:?subject={{ rawurlencode($post->title) }}&body={{ rawurlencode('Baca artikel ini: ' . url()->current() . "\n\n" . Str::limit(strip_tags($post->content), 150)) }}"
                                   class="btn btn-email d-flex align-items-center justify-content-center py-2"
                                   data-bs-toggle="tooltip"
                                   title="Bagikan via Email">
                                    <i class="fas fa-envelope me-2"></i>
                                    <span>Email</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel Info Box -->
                    <div class="sidebar-section mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Informasi Artikel</h6>
                            </div>
                            <div class="card-body">
                                <div class="info-item mb-2">
                                    <strong>Dipublikasikan:</strong><br>
                                    <small class="text-muted">{{ $post->created_at->format('d F Y, H:i') }} WIB</small>
                                </div>
                                @if($post->updated_at != $post->created_at)
                                    <div class="info-item mb-2">
                                        <strong>Diperbarui:</strong><br>
                                        <small class="text-muted">{{ $post->updated_at->format('d F Y, H:i') }} WIB</small>
                                    </div>
                                @endif
                                <div class="info-item mb-2">
                                    <strong>Penulis:</strong><br>
                                    <small class="text-muted">{{ $post->user ? $post->user->name : ($post->author ?? 'Admin') }}</small>
                                </div>
                                @if($post->category)
                                    <div class="info-item mb-2">
                                        <strong>Kategori:</strong><br>
                                        <small class="text-muted">{{ $post->category->name }}</small>
                                    </div>
                                @endif
                                <div class="info-item">
                                    <strong>Dibaca:</strong><br>
                                    <small class="text-muted">{{ number_format($post->views) }} kali</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.news-content img').forEach(img => {
            img.style.maxWidth = '100%';
            img.style.borderRadius = '8px';
            img.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';

            img.classList.add('content-image');
        });
    </script>
@endsection
