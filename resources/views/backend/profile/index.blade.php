@extends('backend.layout.main')
@section('title', 'Profil Pengguna')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- Sidebar Kiri: Info Profil --}}
            <div class="col-lg-4 col-md-5">
                {{-- Kartu Profil --}}
                <div class="card shadow-sm border-0 mb-4 sticky-top" style="top: 1rem;">
                    <div class="card-body text-center py-4">
                        {{-- Foto Profil --}}
                        <div class="position-relative d-inline-block mb-3">
                            <div class="position-relative" style="width: 120px; height: 120px;">
                                {{-- Foto Profil --}}
                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/img/img-not-found.png') }}"
                                     alt="Foto Profil"
                                     class="rounded-circle shadow-sm"
                                     style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #f8f9fa;"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/img/img-not-found.png') }}';">
                                {{-- Overlay Kamera --}}
                                <label for="photoInput"
                                       class="position-absolute top-2 start-0 d-flex justify-content-center align-items-center rounded-circle"
                                       style="width: 115px; height: 115px; background: rgba(0, 0, 0, 0.5); opacity: 0; transition: opacity 0.3s; cursor: pointer;">
                                    <i class="bi bi-camera text-white fs-4"></i>
                                </label>
                            </div>
                        </div>

                        {{-- Nama dan Role --}}
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-3">{{ ucfirst($user->role) }}</p>

                        {{-- Statistik Profil --}}
                        <div class="row text-center">
                            <div class="col-4 border-end">
                                <h6 class="mb-0 text-primary">{{ $user->created_at->format('Y') }}</h6>
                                <small class="text-muted">Bergabung</small>
                            </div>
                            <div class="col-4 border-end">
                                <h6 class="mb-0 text-success">{{ $user->updated_at->diffForHumans() }}</h6>
                                <small class="text-muted">Update</small>
                            </div>
                            <div class="col-4">
                                <h6 class="mb-0 text-info"><i class="bi bi-shield-check"></i></h6>
                                <small class="text-muted">Verified</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Status Aktivitas --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Status Aktivitas</h6>
                            <small class="text-muted">Terakhir login: 2 jam yang lalu</small>
                        </div>
                        <span class="badge bg-light text-success">
                        <i class="bi bi-circle-fill me-1"></i> Online
                    </span>
                    </div>
                </div>
            </div>

            {{-- Konten Kanan: Form Update Profil --}}
            <div class="col-lg-8 col-md-7">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Input File Hidden --}}
                    <input type="file" id="photoInput" name="photo" accept="image/*"
                           class="d-none @error('photo') is-invalid @enderror">
                    @error('photo')
                    <div class="alert alert-danger mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i>{{ $message }}
                    </div>
                    @enderror

                    <div class="row g-4">
                        {{-- Informasi Akun --}}
                        <div class="col-lg-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-white border-bottom">
                                    <h6 class="fw-semibold mb-0">
                                        <i class="bi bi-person-circle me-2 text-primary"></i> Informasi Akun
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" name="username"
                                               class="form-control @error('username') is-invalid @enderror"
                                               value="{{ old('username', $user->username) }}" required>
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="name" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Keamanan & Kontak --}}
                        <div class="col-lg-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-header bg-white border-bottom">
                                    <h6 class="fw-semibold mb-0">
                                        <i class="bi bi-shield-lock me-2 text-success"></i> Keamanan & Kontak
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon
                                        </label>
                                        <input type="tel" id="phone" name="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               value="{{ old('phone', $user->phone) }}"
                                               placeholder="Contoh: 08123456789">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" id="password" name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Password baru">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                               class="form-control" placeholder="Ulangi password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="card shadow-sm border-0 mt-4">
                        <div class="card-body d-flex flex-column flex-sm-row gap-2 justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise me-1"></i> Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const inputPhoto = document.getElementById('photoInput');
            const profileImage = document.querySelector('img[alt="Foto Profil"]');

            const originalSrc = profileImage.src;

            inputPhoto.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    profileImage.src = URL.createObjectURL(file);
                } else {
                    profileImage.src = originalSrc;
                }
            });

            const form = inputPhoto.closest('form');
            form.addEventListener('reset', () => {
                profileImage.src = originalSrc;
            });
        </script>
    @endpush
@endsection
