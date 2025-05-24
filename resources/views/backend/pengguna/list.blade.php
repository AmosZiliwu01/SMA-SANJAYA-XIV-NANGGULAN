@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Pengguna</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddPengguna">
                            <i class="bi bi-plus-circle me-1"></i> Add Pengguna
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                <tr class="text-center">
                                    <th style="width: 100px;">Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th> <!-- Tambahan -->
                                    <th>Password</th>
                                    <th>Kontak</th>
                                    <th>Role</th>
                                    <th style="width: 180px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td class="text-center">
                                        <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Foto" width="50" height="50">
                                    </td>
                                    <td>Jonathan Doe</td>
                                    <td>jonathan@example.com</td> <!-- Tambahan -->
                                    <td>••••••••</td>
                                    <td>0821-1234-5678</td>
                                    <td>User</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPengguna" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#modalResetPassword" title="Reset Password">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                               <tr class="text-center">
                                    <td class="text-center">
                                        <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Foto" width="50" height="50">
                                    </td>
                                    <td>Jonathan Doe</td>
                                    <td>jonathan@example.com</td> <!-- Tambahan -->
                                    <td>••••••••</td>
                                    <td>0821-1234-5678</td>
                                    <td>User</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPengguna" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#modalResetPassword" title="Reset Password">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Pengguna -->
    <div class="modal fade" id="modalAddPengguna" tabindex="-1" aria-labelledby="modalAddPenggunaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddPenggunaLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="namaAdd" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaAdd" placeholder="Masukkan nama">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="emailAdd" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailAdd" placeholder="Masukkan email">
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="usernameAdd" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameAdd" placeholder="Masukkan username">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="passwordAdd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordAdd" placeholder="Masukkan password">
                        </div>

                        <!-- Kontak -->
                        <div class="mb-3">
                            <label for="kontakAdd" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontakAdd" placeholder="Masukkan kontak">
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label for="roleAdd" class="form-label">Role</label>
                            <select class="form-select" id="roleAdd">
                                <option selected disabled>Pilih role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="fotoAdd" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="fotoAdd">
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
    <div class="modal fade" id="modalEditPengguna" tabindex="-1" aria-labelledby="modalEditPenggunaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditPenggunaLabel">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="namaEdit" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaEdit" placeholder="Masukkan nama">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="emailEdit" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailEdit" placeholder="Masukkan email">
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="usernameEdit" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameEdit" placeholder="Masukkan username">
                        </div>

                        <!-- Kontak -->
                        <div class="mb-3">
                            <label for="kontakEdit" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontakEdit" placeholder="Masukkan kontak">
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label for="roleEdit" class="form-label">Role</label>
                            <select class="form-select" id="roleEdit">
                                <option selected disabled>Pilih role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="fotoEdit" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="fotoEdit">
                        </div>

                        <!-- Tombol Update -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Reset Password -->
    <div class="modal fade" id="modalResetPassword" tabindex="-1" aria-labelledby="modalResetPasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalResetPasswordLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin mereset password pengguna ini?</p>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Masukkan password baru">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi password">
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

@endsection
