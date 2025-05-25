@extends('backend.layout.main')
@php use Illuminate\Support\Str; @endphp

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Pengumuman</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddPengumuman">
                            <i class="bi bi-plus-circle me-1"></i> Add Pengumuman
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Post</th>
                                    <th>Author</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Contoh data dummy -->
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Hari Pendidikan Nasional</td>
                                    <td class="align-middle text-start">
                                        <span title="Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.">
                                            {{ Str::limit('Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.', 50, '...') }}
                                        </span>
                                    </td>
                                    <td class="text-center">2025-05-02</td>
                                    <td class="text-center">Enjelina</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPengumuman">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Libur Semester</td>
                                    <td class="align-middle text-start">
                                        <span title="Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.">
                                            {{ Str::limit('Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.', 50, '...') }}
                                        </span>
                                    </td>                                    <td class="text-center">2025-05-22</td>
                                    <td class="text-center">Jonathan</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPengumuman">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Pengumuman -->
    <div class="modal fade" id="modalAddPengumuman" tabindex="-1" aria-labelledby="modalAddPengumumanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddPengumumanLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukkan judul">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3" placeholder="Isi pengumuman..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPost" class="form-label">Tanggal Post</label>
                            <input type="date" class="form-control" id="tanggalPost">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengumuman -->
    <div class="modal fade" id="modalEditPengumuman" tabindex="-1" aria-labelledby="modalEditPengumumanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditPengumumanLabel">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editJudul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="editJudul" value="Hari Pendidikan Nasional">
                        </div>
                        <div class="mb-3">
                            <label for="editDeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="editDeskripsi" rows="3">Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editTanggalPost" class="form-label">Tanggal Post</label>
                            <input type="date" class="form-control" id="editTanggalPost" value="2025-05-02">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-info">Update</button>
                </div>
            </div>
        </div>
    </div>

@endsection




