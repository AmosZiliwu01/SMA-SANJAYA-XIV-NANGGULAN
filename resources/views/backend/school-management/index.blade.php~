@extends('backend.layout.main')
@section('title', 'Manajemen Sekolah')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Manajemen Sekolah</h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Navigation Tabs -->
                        <ul class="nav nav-pills nav-fill mb-4" id="schoolTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ session('active_tab') == 'principals' || !session('active_tab') ? 'active' : '' }}"
                                        id="principals-tab" data-bs-toggle="pill" data-bs-target="#principals"
                                        type="button" role="tab" aria-controls="principals" aria-selected="true">
                                    <i class="bi bi-person-badge me-2"></i>Kepala Sekolah
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ session('active_tab') == 'about' ? 'active' : '' }}"
                                        id="about-tab" data-bs-toggle="pill" data-bs-target="#about"
                                        type="button" role="tab" aria-controls="about" aria-selected="false">
                                    <i class="bi bi-building me-2"></i>Tentang Sekolah
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="schoolTabsContent">
                            <!-- Principals Tab -->
                            <div class="tab-pane fade {{ session('active_tab') == 'principals' || !session('active_tab') ? 'show active' : '' }}"
                                 id="principals" role="tabpanel" aria-labelledby="principals-tab">

                                <!-- Add Principal Button -->
                                <div class="mb-4 text-lg-start">
                                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAddPrincipal">
                                        <i class="bi bi-plus-circle me-1"></i> Tambah Kepala Sekolah
                                    </button>
                                </div>

                                <!-- Principals Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Pesan Sambutan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($principals as $principal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $principal->image ? asset('storage/principals/' . $principal->image) : asset('assets/img/img-not-found.png') }}"
                                                         alt="Foto kepala sekolah"
                                                         width="50"
                                                         height="50"
                                                         class="rounded-circle"
                                                         onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                                </td>
                                                <td>{{ $principal->name }}</td>
                                                <td>
                                                    <div style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $principal->welcome_message }}
                                                    </div>
                                                </td>
                                                <td>
                                                <span class="badge {{ $principal->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $principal->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPrincipal{{ $principal->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <form id="toggle-principal-{{$principal->id}}" action="{{route('school-management.principal.toggle-active', $principal->id)}}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                    </form>
                                                    <button onclick="toggleStatus('principal', {{$principal->id}})" class="btn btn-sm {{ $principal->is_active ? 'btn-warning' : 'btn-success' }} me-1">
                                                        <i class="bi {{ $principal->is_active ? 'bi-toggle-on' : 'bi-toggle-off' }}"></i>
                                                    </button>
                                                    <form id="delete-principal-{{$principal->id}}" action="{{route('school-management.principal.delete', $principal->id)}}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button onclick="confirmDelete('principal', {{$principal->id}})" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">Belum ada data kepala sekolah</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- About School Tab -->
                            <div class="tab-pane fade {{ session('active_tab') == 'about' ? 'show active' : '' }}"
                                 id="about" role="tabpanel" aria-labelledby="about-tab">

                                <!-- Add About School Button -->
                                <div class="mb-4 text-lg-start">
                                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAddAbout">
                                        <i class="bi bi-plus-circle me-1"></i> Tambah Tentang Sekolah
                                    </button>
                                </div>

                                <!-- About School Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar Latar</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($aboutSchools as $about)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $about->background_image ? asset('storage/about-schools/' . $about->background_image) : asset('assets/img/img-not-found.png') }}"
                                                         alt="Gambar latar sekolah"
                                                         width="50"
                                                         height="50"
                                                         class="rounded"
                                                         onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                                </td>
                                                <td>{{ $about->title }}</td>
                                                <td>
                                                    <div style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $about->description }}
                                                    </div>
                                                </td>
                                                <td>
                                                <span class="badge {{ $about->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $about->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditAbout{{ $about->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <form id="toggle-about-{{$about->id}}" action="{{route('school-management.about-school.toggle-active', $about->id)}}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                    </form>
                                                    <button onclick="toggleStatus('about', {{$about->id}})" class="btn btn-sm {{ $about->is_active ? 'btn-warning' : 'btn-success' }} me-1">
                                                        <i class="bi {{ $about->is_active ? 'bi-toggle-on' : 'bi-toggle-off' }}"></i>
                                                    </button>
                                                    <form id="delete-about-{{$about->id}}" action="{{route('school-management.about-school.delete', $about->id)}}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button onclick="confirmDelete('about', {{$about->id}})" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">Belum ada data tentang sekolah</td>
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
        </div>
    </div>

    <!-- Modal Add Principal -->
    <div class="modal fade" id="modalAddPrincipal" tabindex="-1" aria-labelledby="modalAddPrincipalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddPrincipalLabel">Tambah Kepala Sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('school-management.principal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="welcome_message" class="form-label">Pesan Sambutan</label>
                            <textarea name="welcome_message" class="form-control @error('welcome_message') is-invalid @enderror"
                                      id="welcome_message" rows="4" placeholder="Masukkan Pesan Sambutan">{{ old('welcome_message') }}</textarea>
                            @error('welcome_message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="image" class="form-label">Foto</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active">
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Principal -->
    @foreach ($principals as $principal)
        <div class="modal fade" id="modalEditPrincipal{{ $principal->id }}" tabindex="-1" aria-labelledby="modalEditPrincipalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditPrincipalLabel">Edit Kepala Sekolah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('school-management.principal.update', $principal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_name{{ $principal->id }}" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           id="edit_name{{ $principal->id }}" value="{{ old('name', $principal->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_welcome_message{{ $principal->id }}" class="form-label">Pesan Sambutan</label>
                                <textarea name="welcome_message" class="form-control @error('welcome_message') is-invalid @enderror"
                                          id="edit_welcome_message{{ $principal->id }}" rows="4">{{ old('welcome_message', $principal->welcome_message) }}</textarea>
                                @error('welcome_message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_image{{ $principal->id }}" class="form-label">Foto</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                           id="edit_image{{ $principal->id }}">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($principal->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/principals/' . $principal->image) }}"
                                                 alt="Current foto"
                                                 width="100"
                                                 height="100"
                                                 class="rounded-circle"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                            <small class="text-muted d-block">Foto saat ini</small>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                               id="edit_is_active{{ $principal->id }}" {{ $principal->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_is_active{{ $principal->id }}">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Add About School -->
    <div class="modal fade" id="modalAddAbout" tabindex="-1" aria-labelledby="modalAddAboutLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddAboutLabel">Tambah Tentang Sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('school-management.about-school.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                       id="title" placeholder="Masukkan Judul" value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                      id="description" rows="4" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="background_image" class="form-label">Gambar Latar</label>
                                <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror"
                                       id="background_image">
                                @error('background_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="about_is_active">
                                    <label class="form-check-label" for="about_is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit About School -->
    @foreach ($aboutSchools as $about)
        <div class="modal fade" id="modalEditAbout{{ $about->id }}" tabindex="-1" aria-labelledby="modalEditAboutLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditAboutLabel">Edit Tentang Sekolah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('school-management.about-school.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_about_title{{ $about->id }}" class="form-label">Judul</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                           id="edit_about_title{{ $about->id }}" value="{{ old('title', $about->title) }}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_description{{ $about->id }}" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                          id="edit_description{{ $about->id }}" rows="4">{{ old('description', $about->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_background_image{{ $about->id }}" class="form-label">Gambar Latar</label>
                                    <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror"
                                           id="edit_background_image{{ $about->id }}">
                                    @error('background_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($about->background_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/about-schools/' . $about->background_image) }}"
                                                 alt="Current background"
                                                 width="100"
                                                 height="60"
                                                 class="rounded"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                            <small class="text-muted d-block">Gambar saat ini</small>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                               id="edit_about_is_active{{ $about->id }}" {{ $about->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_about_is_active{{ $about->id }}">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function toggleStatus(type, id) {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin mengubah status?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, ubah!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('toggle-' + type + '-' + id).submit();
                }
            });
        }

        function confirmDelete(type, id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-' + type + '-' + id).submit();
                }
            });
        }

        // Auto-close success/error alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>

@endsection
