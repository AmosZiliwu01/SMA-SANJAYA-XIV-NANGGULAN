@extends('backend.layout.main')
@section('title', 'Data Pengguna')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Pengguna</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddUsers">
                            <i class="bi bi-plus-circle me-1"></i> Add Pengguna
                        </button>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th style="width: 100px;">Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kontak</th>
                                    <th>Role</th>
                                    <th style="width: 180px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr class="text-center">
                                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src="{{ Str::startsWith($user->photo, 'http') ? $user->photo : asset('storage/' . $user->photo) }}" class="rounded-circle" width="50" height="50" onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                    </td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditUsers{{ $user->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#modalResetPassword{{ $user->id }}" title="Reset Password">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                        <form id="delete-users-{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <a href="#" onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start mt-3 px-2 gap-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari total {{ $users->total() }} pengguna
                            </p>
                            <div class="d-flex justify-content-center">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Pengguna -->
    <div class="modal fade" id="modalAddUsers" tabindex="-1" aria-labelledby="modalAddUsersLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddUsersLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="namaAdd" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="namaAdd" placeholder="Masukkan nama" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="emailAdd" class="form-label">Email</label>
                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="usernameAdd" class="form-label">Username</label>
                            <input name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="passwordAdd" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordAdd" placeholder="Masukkan password" required>
                        </div>

                        <!-- Kontak -->
                        <div class="mb-3">
                            <label for="kontakAdd" class="form-label">Kontak</label>
                            <input type="text" name="phone" class="form-control" id="kontakAdd" placeholder="Masukkan kontak">
                        </div>

                        <!-- Role -->
                        <select name="role" class="form-select" id="roleAdd" required>
                            <option selected disabled>Pilih role</option>
                            <option value="administrator">Administrator</option>
                            <option value="author">Author</option>
                        </select>


                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="fotoAdd" class="form-label">Foto</label>
                            <input type="file" name="photo" class="form-control" id="fotoAdd" accept="image/*">
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengguna -->
    @foreach($users as $user)
        <div class="modal fade" id="modalEditUsers{{ $user->id }}" tabindex="-1" aria-labelledby="modalEditUsersLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="modalEditUsersLabel{{ $user->id }}">Edit Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nameEdit{{ $user->id }}" class="form-label">Nama</label>
                                <input type="text" name="name" id="nameEdit{{ $user->id }}" class="form-control" value="{{ $user->name }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="emailEdit{{ $user->id }}" class="form-label">Email</label>
                                <input type="email" name="email" id="emailEdit{{ $user->id }}" class="form-control" value="{{ $user->email }}" required>
                            </div>

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="usernameEdit{{ $user->id }}" class="form-label">Username</label>
                                <input type="text" name="username" id="usernameEdit{{ $user->id }}" class="form-control" value="{{ $user->username }}" required>
                            </div>

                            <!-- Kontak -->
                            <div class="mb-3">
                                <label for="phoneEdit{{ $user->id }}" class="form-label">Kontak</label>
                                <input type="text" name="phone" id="phoneEdit{{ $user->id }}" class="form-control" value="{{ $user->phone }}">
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="roleEdit{{ $user->id }}" class="form-label">Role</label>
                                <select name="role" id="roleEdit{{ $user->id }}" class="form-select" required>
                                    <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                                    <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                                </select>
                            </div>

                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="photoEdit{{ $user->id }}" class="form-label">Foto</label>
                                <input type="file" name="photo" id="photoEdit{{ $user->id }}" class="form-control">
                                @if($user->photo)
                                    <small>Foto saat ini: <img src="{{ asset('storage/' . $user->photo) }}" width="30"></small>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Reset Password -->
    @foreach ($users as $user)
        <div class="modal fade" id="modalResetPassword{{ $user->id }}" tabindex="-1" aria-labelledby="modalResetPasswordLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('user.resetPassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="modalResetPasswordLabel{{ $user->id }}">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah kamu yakin ingin mereset password untuk <strong>{{ $user->username }}</strong>?</p>

                            <div class="mb-3">
                                <label for="newPassword{{ $user->id }}" class="form-label">Password Baru</label>
                                <input type="password" name="password" id="newPassword{{ $user->id }}" class="form-control @error('password') is-invalid @enderror" required minlength="6">
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword{{ $user->id }}" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="confirmPassword{{ $user->id }}" class="form-control @error('password_confirmation') is-invalid @enderror" required minlength="6">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function confirmDelete(id){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "User has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-users-' + id).submit();
                    });
                }
            });
        }
    </script>

@endsection
