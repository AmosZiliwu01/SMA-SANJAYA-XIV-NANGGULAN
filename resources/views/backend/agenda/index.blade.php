@extends('backend.layout.main')
@php use Illuminate\Support\Str; @endphp

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Agenda</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddAgenda">
                            <i class="bi bi-plus-circle me-1"></i> Add Agenda
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi Agenda</th>
                                    <th>Author</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Contoh data dummy -->
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>2025-05-23</td>
                                    <td class="align-middle text-start">
                                        <span title="Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.">
                                            {{ Str::limit('Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.', 50, '...') }}
                                        </span>
                                    </td>
                                    <td>Enjelina</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditAgenda" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>2025-05-28</td>
                                    <td class="align-middle text-start">Workshop Pengembangan Website Gereja</td>
                                    <td>Jonathan</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditAgenda" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
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

    <!-- Modal Tambah Agenda -->
    <div class="modal fade" id="modalAddAgenda" tabindex="-1" aria-labelledby="modalAddAgendaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddAgendaLabel">Tambah Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="author" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="judulagenda">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Agenda</label>
                            <textarea class="form-control" id="deskripsi" rows="3"></textarea>
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

    <!-- Modal Edit Agenda -->
    <div class="modal fade" id="modalEditAgenda" tabindex="-1" aria-labelledby="modalEditAgendaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditAgendaLabel">Edit Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editAuthor" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="editJudulAgenda" value="">
                        </div>
                        <div class="mb-3">
                            <label for="editTanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="editTanggal" value="2025-05-23">
                        </div>
                        <div class="mb-3">
                            <label for="editDeskripsi" class="form-label">Deskripsi Agenda</label>
                            <textarea class="form-control" id="editDeskripsi" rows="3">Rapat Koordinasi</textarea>
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




