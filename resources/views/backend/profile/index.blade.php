@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Kartu Profil --}}
                <div class="card shadow-lg border-0 mb-4">
                    <div class="card-body text-center pb-0">
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}"
                                 class="rounded-circle shadow"
                                 style="width: 130px; height: 130px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/img/img-not-found.png') }}"
                                 class="rounded-circle shadow"
                                 style="width: 130px; height: 130px; object-fit: cover;">
                        @endif

                        <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted">{{ ucfirst($user->role) }}</p>
                    </div>

                    <hr class="mx-4 mt-4">

                    {{-- Form --}}
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="px-4 pb-4">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text"
                                       class="form-control @error('username') is-invalid @enderror"
                                       id="username"
                                       name="username"
                                       value="{{ old('username', $user->username) }}"
                                       required>
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name', $user->name) }}"
                                       required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Kosongkan jika tidak diubah">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="Konfirmasi password">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Kontak</label>
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone', $user->phone) }}"
                                   placeholder="Masukkan nomor telepon">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Profil Baru</label>
                            <input type="file"
                                   class="form-control @error('photo') is-invalid @enderror"
                                   id="photo"
                                   name="photo"
                                   accept="image/*">
                            @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ ucfirst($user->role) }}"
                                   readonly>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
