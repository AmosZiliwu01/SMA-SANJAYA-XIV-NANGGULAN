@extends('backend.layout.main')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            {{-- Common Cards for All Users --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengunjung Hari Ini</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $visitorCountToday }}
                                    </h5>
                                    <p class="mb-0 text-sm">
                                        <span class="text-success font-weight-bolder">{{ now()->format('d M Y') }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengunjung</p>
                                    <h5 class="font-weight-bolder">
                                        {{ number_format($totalUniqueVisitors) }}
                                    </h5>
                                    <p class="mb-0 text-sm">
                                        <span class="text-info font-weight-bolder">Visitor ID Unik</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Artikel</p>
                                    <h5 class="font-weight-bolder">
                                        {{ number_format($totalPosts) }}
                                    </h5>
                                    <p class="mb-0 text-sm">
                                        <span class="text-success font-weight-bolder">Semua Artikel</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Galeri</p>
                                    <h5 class="font-weight-bolder">
                                        {{ number_format($totalGalleries) }}
                                    </h5>
                                    <p class="mb-0 text-sm">
                                        <span class="text-warning font-weight-bolder">Foto Galeri</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-image text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Admin Only Section --}}
        @can('admin')
            <div class="row mt-4">
                {{-- Admin Stats Cards --}}
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                                        <h5 class="font-weight-bolder">{{ $adminData['totalUsers'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-primary font-weight-bolder">Registered Users</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-circle-08 text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Guru</p>
                                        <h5 class="font-weight-bolder">{{ $adminData['totalTeachers'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-info font-weight-bolder">Tenaga Pengajar</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                        <i class="ni ni-hat-3 text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Siswa</p>
                                        <h5 class="font-weight-bolder">{{ $adminData['totalStudents'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-success font-weight-bolder">{{ $adminData['totalClasses'] ?? 0 }} Kelas</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-books text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesan Masuk</p>
                                        <h5 class="font-weight-bolder">{{ $adminData['unreadMessages'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-danger font-weight-bolder">Belum Dibaca</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-email-83 text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Admin Charts --}}
            <div class="row mt-4">
                <div class="col-lg-8 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Statistik Pengunjung (7 Hari Terakhir)</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold">Pengunjung Unik Harian</span>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-visitors" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3 col-12 d-flex justify-content-center">
                            <div class="btn-group" role="group">
                                <div class="mb-4 d-flex justify-content-center align-items-center">
                                    <div class="segmented-control">
                                        <button type="button" class="segment-btn active" onclick="toggle3('categories', this)">
                                            Kategori Populer
                                        </button>
                                        <button type="button" class="segment-btn" onclick="toggle3('posts', this)">
                                            Postingan Populer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- Kategori Populer Content -->
                            <div id="categories-content">
                                @if(isset($adminData['topCategories']) && $adminData['topCategories']->count() > 0)
                                    @foreach($adminData['topCategories'] as $category)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h6 class="mb-0 text-sm">{{ $category->name }}</h6>
                                                <span class="text-xs text-secondary">{{ $category->posts_count }} artikel</span>
                                            </div>
                                            <div class="progress" style="width: 60px; height: 6px;">
                                                <div class="progress-bar bg-gradient-primary"
                                                     style="width: {{ ($category->posts_count / $adminData['topCategories']->max('posts_count')) * 100 }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted text-center">Belum ada data kategori</p>
                                @endif
                            </div>

                            <!-- Postingan Populer Content -->
                            <div id="posts-content" style="display: none;">
                                @if(isset($adminData['topPosts']) && $adminData['topPosts']->count() > 0)
                                    @foreach($adminData['topPosts'] as $post)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-sm">{{ Str::limit($post->title, 40) }}</h6>
                                                <span class="text-xs text-secondary">{{ number_format($post->views) }} views</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge badge-sm bg-gradient-success">{{ $post->views }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @elseif(isset($authorData['topPosts']) && $authorData['topPosts']->count() > 0)
                                    @foreach($authorData['topPosts'] as $post)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-sm">{{ Str::limit($post->title, 40) }}</h6>
                                                <span class="text-xs text-secondary">{{ number_format($post->views) }} views</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge badge-sm bg-gradient-success">{{ $post->views }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted text-center">Belum ada data postingan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Messages for Admin --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Pesan Terbaru</h6>
                        </div>
                        <div class="card-body">
                            @if(isset($adminData['recentMessages']) && $adminData['recentMessages']->count() > 0)
                                @foreach($adminData['recentMessages'] as $message)
                                    <div class="d-flex align-items-center mb-3 p-2 border-radius-lg border">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $message->name }}</h6>
                                            <p class="text-sm mb-0">{{ Str::limit($message->message, 100) }}</p>
                                            <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div>
                                            <span class="badge bg-gradient-warning">Baru</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">Tidak ada pesan baru</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        {{-- Author Only Section --}}
        @can('author')
            <div class="row mt-4">
                {{-- Author Stats Cards --}}
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Artikel Saya</p>
                                        <h5 class="font-weight-bolder">{{ $authorData['myPosts'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-primary font-weight-bolder">Total Artikel</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Views</p>
                                        <h5 class="font-weight-bolder">{{ number_format($authorData['totalViews'] ?? 0) }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-success font-weight-bolder">Pembaca</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-chart-bar-32 text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Galeri Saya</p>
                                        <h5 class="font-weight-bolder">{{ $authorData['myGalleries'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-info font-weight-bolder">Total Foto</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                        <i class="ni ni-image text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Agenda Saya</p>
                                        <h5 class="font-weight-bolder">{{ $authorData['myAgendas'] ?? 0 }}</h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-warning font-weight-bolder">Total Agenda</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-calendar-grid-58 text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Author Charts --}}
            <div class="row mt-4">
                <div class="col-lg-8 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Artikel Bulanan (Tahun Ini)</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold">Produktivitas Menulis</span>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-posts" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-3">Artikel Terpopuler</h6>
                        </div>
                        <div class="card-body p-3">
                            @if(isset($authorData['topPosts']) && $authorData['topPosts']->count() > 0)
                                @foreach($authorData['topPosts'] as $post)
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h6 class="mb-0 text-sm">{{ Str::limit($post->title, 30) }}</h6>
                                            <span class="text-xs text-secondary">{{ $post->views }} views</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge badge-sm bg-gradient-success">{{ $post->views }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">Belum ada artikel</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Posts for Author --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Artikel Terbaru Anda</h6>
                        </div>
                        <div class="card-body">
                            @if(isset($authorData['recentPosts']) && $authorData['recentPosts']->count() > 0)
                                @foreach($authorData['recentPosts'] as $post)
                                    <div class="d-flex align-items-center mb-3 p-2 border-radius-lg border">
                                        <div class="flex-grow-1 me-3">
                                            <h6 class="mb-1">{{ $post->title }}</h6>
                                            <p class="text-sm mb-0">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }} • {{ $post->views }} views</small>
                                        </div>
                                        <div>
                                            <a href="{{ route('fe-post.detail', $post->slug) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-2"></i> Lihat
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">Belum ada artikel</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        {{-- Activity Logs (Common for both) --}}
        <div class="row mt-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header pl-3 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Aktivitas Terkini</h6>
                            <p class="text-sm mb-0">Riwayat aktivitas sistem terbaru</p>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pengguna</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Aktivitas</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($activityLogs as $log)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ $log->user->photo ?? asset('assets/img/team-2.jpg') }}"
                                                         class="avatar avatar-sm me-3" alt="user">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $log->user->name ?? 'System' }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $log->user->email ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $log->activity }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ Str::limit($log->action, 100) }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $log->created_at->diffForHumans() }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada aktivitas</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .toggle-buttons {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 4px;
            border: 1px solid #e9ecef;
        }

        .toggle-btn {
            border: none !important;
            border-radius: 6px !important;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 8px 16px;
            position: relative;
            overflow: hidden;
        }

        .toggle-btn:not(.active) {
            background: transparent !important;
            color: #6c757d !important;
            box-shadow: none !important;
        }

        .toggle-btn.active {
            background: #5e72e4 !important;
            color: white !important;
            box-shadow: 0 2px 4px rgba(94, 114, 228, 0.3) !important;
        }

        .toggle-btn:hover:not(.active) {
            background: #e9ecef !important;
            color: #495057 !important;
        }

        /* Sliding effect */
        .toggle-container {
            position: relative;
            display: inline-flex;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 4px;
            border: 1px solid #e9ecef;
        }

        .toggle-container::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: calc(50% - 4px);
            height: calc(100% - 8px);
            background: #5e72e4;
            border-radius: 6px;
            transition: transform 0.3s ease;
            z-index: 0;
            box-shadow: 0 2px 4px rgba(94, 114, 228, 0.3);
        }

        .toggle-container.posts-active::before {
            transform: translateX(100%);
        }

        .slide-btn {
            position: relative;
            z-index: 1;
            border: none;
            background: transparent;
            padding: 8px 16px;
            border-radius: 6px;
            transition: color 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
            color: #6c757d;
            width: 50%;
        }

        .slide-btn.active {
            color: white;
        }

        /* Modern segmented control */
        .segmented-control {
            display: inline-flex;
            background: #ffffff;
            border-radius: 5px;
            padding: 3px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
        }

        .segment-btn {
            border: none;
            background: transparent;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            color: #6c757d;
            transition: all 0.2s ease;
            position: relative;
        }

        .segment-btn.active {
            background: #5e72e4;
            color: white;
            box-shadow: 0 2px 4px rgba(94, 114, 228, 0.4);
        }

        .segment-btn:hover:not(.active) {
            background: #f8f9fa;
            color: #495057;
        }
    </style>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @can('admin')
                // Visitor Chart for Admin
                if (document.getElementById('chart-visitors')) {
                    const visitorsData = @json($adminData['weeklyVisitors'] ?? []);
                    const visitorsLabels = visitorsData.map(item => new Date(item.date).toLocaleDateString('id-ID', {month: 'short', day: 'numeric'}));
                    const visitorsValues = visitorsData.map(item => item.count);

                    new Chart(document.getElementById('chart-visitors'), {
                        type: 'line',
                        data: {
                            labels: visitorsLabels,
                            datasets: [{
                                label: 'Pengunjung Unik',
                                data: visitorsValues,
                                borderColor: '#5e72e4',
                                backgroundColor: 'rgba(94, 114, 228, 0.1)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }
                @endcan

                @can('author')
                // Posts Chart for Author
                if (document.getElementById('chart-posts')) {
                    const monthlyPostsData = @json($authorData['monthlyPosts'] ?? []);
                    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    const postCounts = Array(12).fill(0);

                    monthlyPostsData.forEach(item => {
                        postCounts[item.month - 1] = item.count;
                    });

                    new Chart(document.getElementById('chart-posts'), {
                        type: 'bar',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Artikel',
                                data: postCounts,
                                backgroundColor: '#11cdef',
                                borderRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }
                @endcan
            });
        </script>
        <script>
            // Style 3: Segmented Control
            function toggle3(type, button) {
                button.parentElement.querySelectorAll('.segment-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
                toggleContent(type);
            }
            function toggleContent(type) {
                const categoriesContent = document.getElementById('categories-content');
                const postsContent = document.getElementById('posts-content');
                const btnCategories = document.getElementById('btn-categories');
                const btnPosts = document.getElementById('btn-posts');

                if (type === 'categories') {
                    // Show categories, hide posts
                    categoriesContent.style.display = 'block';
                    postsContent.style.display = 'none';

                    // Update button states
                    btnCategories.classList.add('active');
                    btnCategories.classList.remove('btn-outline-primary');
                    btnCategories.classList.add('btn-primary');

                    btnPosts.classList.remove('active');
                    btnPosts.classList.remove('btn-primary');
                    btnPosts.classList.add('btn-outline-primary');
                } else {
                    // Show posts, hide categories
                    categoriesContent.style.display = 'none';
                    postsContent.style.display = 'block';

                    // Update button states
                    btnPosts.classList.add('active');
                    btnPosts.classList.remove('btn-outline-primary');
                    btnPosts.classList.add('btn-primary');

                    btnCategories.classList.remove('active');
                    btnCategories.classList.remove('btn-primary');
                    btnCategories.classList.add('btn-outline-primary');
                }
            }
        </script>
    @endpush

@endsection
