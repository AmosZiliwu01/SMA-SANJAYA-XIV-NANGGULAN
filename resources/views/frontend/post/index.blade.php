@extends('frontend.layout.main')
@section('content')

    <section class="news-section py-5 mt-3">
        <div class="container">

            <!-- Active Filters Display -->
            @if($appliedFilters['has_filters'])
                <div class="alert alert-info mb-4">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <h6 class="mb-2"><i class="fas fa-filter"></i> Filter Aktif:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @if($appliedFilters['search'])
                                    <span class="badge bg-primary fs-6">
                                    <i class="fas fa-search"></i> "{{ $appliedFilters['search'] }}"
                                </span>
                                @endif
                                @if($appliedFilters['category'])
                                    <span class="badge bg-success fs-6">
                                    <i class="fas fa-folder"></i> {{ $appliedFilters['category']->name }}
                                </span>
                                @endif
                            </div>
                            <small class="text-muted">Ditemukan {{ $posts->total() }} artikel</small>
                        </div>
                        <div class="mt-2 mt-md-0">
                            <a href="{{ route('fe-post.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-times"></i> Hapus Semua Filter
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="row" id="posts-container">
                        @forelse($posts as $post)
                            <div class="col-md-6 mb-4">
                                <a href="{{ route('fe-post.detail', $post->slug) }}" class="text-decoration-none">
                                    <div class="news-card h-100">
                                        <div class="news-img-container">
                                            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('slider-1.jpg') }}"
                                                 alt="{{ $post->title }}" class="news-img" loading="lazy">
                                        </div>
                                        <div class="news-info">
                                            <div class="news-category-badge">
                                                <span class="badge bg-primary">{{ $post->category->name ?? 'Umum' }}</span>
                                            </div>
                                            <h4 class="news-title">
                                                @if($appliedFilters['search'])
                                                    {!! str_ireplace($appliedFilters['search'], '<mark>' . $appliedFilters['search'] . '</mark>', $post->title) !!}
                                                @else
                                                    {{ $post->title }}
                                                @endif
                                            </h4>
                                            <div class="news-divider"></div>
                                            <p class="news-excerpt">
                                                @php
                                                    $excerpt = Str::limit(strip_tags($post->content), 120);
                                                    echo $appliedFilters['search']
                                                        ? str_ireplace($appliedFilters['search'], '<mark>' . $appliedFilters['search'] . '</mark>', $excerpt)
                                                        : $excerpt;
                                                @endphp
                                            </p>
                                            <div class="news-meta">
                                                <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                                                <span><i class="far fa-eye ms-3"></i> {{ number_format($post->views) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning text-center py-5">
                                    @if($appliedFilters['search'] && $appliedFilters['category'])
                                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                        <h5>Tidak Ada Hasil Ditemukan</h5>
                                        <p class="mb-3">
                                            Tidak ada artikel yang sesuai dengan pencarian <strong>"{{ $appliedFilters['search'] }}"</strong>
                                            dalam kategori <strong>{{ $appliedFilters['category']->name }}</strong>
                                        </p>
                                    @elseif($appliedFilters['search'])
                                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                        <h5>Tidak Ada Hasil Pencarian</h5>
                                        <p class="mb-3">Tidak ada artikel yang sesuai dengan <strong>"{{ $appliedFilters['search'] }}"</strong></p>
                                    @elseif($appliedFilters['category'])
                                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                        <h5>Kategori Kosong</h5>
                                        <p class="mb-3">Belum ada artikel dalam kategori <strong>{{ $appliedFilters['category']->name }}</strong></p>
                                    @else
                                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                        <h5>Belum Ada Artikel</h5>
                                        <p class="mb-3">Silakan kembali lagi nanti untuk membaca artikel terbaru</p>
                                    @endif

                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        @if($appliedFilters['has_filters'])
                                            <a href="{{ route('fe-post.index') }}" class="btn btn-primary">
                                                <i class="fas fa-list"></i> Lihat Semua Artikel
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($posts->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $posts->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Box -->
                    <div class="sidebar-box search-box mb-4">
                        <h5 class="sidebar-title mb-3">
                            <i class="fas fa-search"></i> Pencarian Artikel
                        </h5>
                        <form action="{{ route('fe-post.index') }}" method="GET" id="search-form">
                            <!-- Preserve category filter when searching -->
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif

                            <div class="input-group mb-2">
                                <input type="text" name="search" class="form-control"
                                       placeholder="Cari artikel..."
                                       value="{{ request('search') }}"
                                       id="search-input">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            @if(request('search'))
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ request('category') ? route('fe-post.index', ['category' => request('category')]) : route('fe-post.index') }}"
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-times"></i> Hapus Pencarian
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-box mb-4">
                        <h5 class="sidebar-title mb-3">
                            <i class="fas fa-folder"></i> Kategori Artikel
                        </h5>

                        <!-- All Categories -->
                        <a href="{{ request('search') ? route('fe-post.index', ['search' => request('search')]) : route('fe-post.index') }}"
                           class="text-decoration-none">
                            <div class="kategori-item {{ !request('category') ? 'active' : '' }}">
                            <span class="kategori-name">
                                <i class="fas fa-list"></i> Semua Artikel
                            </span>
                                <span class="badge bg-secondary">{{ $allPostsCount }}</span>
                            </div>
                        </a>

                        @forelse($categories as $category)
                            <a href="{{ route('fe-post.index', ['category' => $category->slug] + (request('search') ? ['search' => request('search')] : [])) }}"
                               class="text-decoration-none">
                                <div class="kategori-item {{ request('category') == $category->slug ? 'active' : '' }}">
                                    <span class="kategori-name">{{ $category->name }}</span>
                                    <span class="badge bg-secondary">{{ $category->posts_count }}</span>
                                </div>
                            </a>
                        @empty
                            <div class="text-muted text-center py-4">
                                <i class="fas fa-folder-open fa-2x mb-2"></i>
                                <p class="mb-0">Belum ada kategori</p>
                            </div>
                        @endforelse

                        <!-- Clear Category Filter -->
                        @if(request('category'))
                            <div class="mt-3">
                                <a href="{{ request('search') ? route('fe-post.index', ['search' => request('search')]) : route('fe-post.index') }}"
                                   class="btn btn-sm btn-outline-secondary w-100">
                                    <i class="fas fa-times"></i> Hapus Filter Kategori
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Popular Articles -->
                    <div class="sidebar-box">
                        <h5 class="sidebar-title mb-3">
                            <i class="fas fa-chart-line"></i> Artikel Terpopuler
                        </h5>
                        @forelse($popularPosts as $index => $popularPost)
                            <a href="{{ route('fe-post.detail', $popularPost->slug) }}" class="text-decoration-none">
                                <div class="popular-item">
                                    <div class="popular-rank">
                                        <span class="rank-number">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="popular-image">
                                        <img src="{{ $popularPost->image ? asset('storage/' . $popularPost->image) : asset('slider-1.jpg') }}"
                                             alt="{{ $popularPost->title }}" loading="lazy">
                                    </div>
                                    <div class="popular-content">
                                        <div class="popular-category">
                                            <span class="badge bg-secondary">{{ $popularPost->category->name ?? 'Umum' }}</span>
                                        </div>
                                        <div class="popular-title">{{ Str::limit($popularPost->title, 60) }}</div>
                                        <div class="popular-meta">
                                            <i class="far fa-clock"></i> {{ $popularPost->created_at->diffForHumans() }}
                                            <span class="ms-2">
                                            <i class="far fa-eye"></i> {{ number_format($popularPost->views) }}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="text-muted text-center py-4">
                                <i class="fas fa-chart-line fa-2x mb-2"></i>
                                <p class="mb-0">Belum ada artikel populer</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
