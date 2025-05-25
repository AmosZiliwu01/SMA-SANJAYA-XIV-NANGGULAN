@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Kategori</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddKategori">
                            <i class="bi bi-plus-circle me-1"></i> Add Kategori
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle table-kategori">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 80px;">No</th>
                                    <th>Kategori</th>
                                    <th class="text-center" style="width: 200px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <span tabindex="0" role="button" class="me-2 text-primary"></span> 1
                                    </td>
                                    <td style="padding-left: 25px">Politik</td>
                                    <td class="text-center">
                                        <a href="#"
                                           class="btn btn-sm btn-info me-1"
                                           title="Edit"
                                           data-bs-toggle="modal"
                                           data-bs-target="#modalEditKategori"
                                           data-nama="Politik">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" onclick="showDeleteAlert()" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                               <tr>
                              <tr>
                                    <td class="text-center">
                                        <span tabindex="0" role="button" class="me-2 text-primary"></span> 1
                                    </td>
                                    <td style="padding-left: 25px">Politik</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-info me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" onclick="showDeleteAlert()" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                               <tr>
                              <tr>
                                    <td class="text-center">
                                        <span tabindex="0" role="button" class="me-2 text-primary"></span> 1
                                    </td>
                                    <td style="padding-left: 25px">Politik</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-info me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#"  onclick="showDeleteAlert()" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                               <tr>

                                <!-- Tambahkan baris lainnya jika perlu -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="modalAddKategori" tabindex="-1" aria-labelledby="modalAddKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="kategoriForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddKategoriLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaKategori" class="form-label fs-6">Nama Kategori</label>
                            <input type="text" class="form-control" id="namaKategori" placeholder="Masukkan nama kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit Kategori -->
    <div class="modal fade" id="modalEditKategori" tabindex="-1" aria-labelledby="modalEditKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="formEditKategori">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditKategoriLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editNamaKategori" class="form-label fs-6">Nama Kategori</label>
                            <input type="text" class="form-control" id="editNamaKategori" placeholder="Masukkan nama kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
