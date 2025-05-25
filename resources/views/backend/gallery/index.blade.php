@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Gallery</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddGallery">
                        <i class="bi bi-plus-circle me-1"></i> Add Gallery
                    </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 300px;">Gambar</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Author</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>
                                        <img src="/path/to/image1.jpg" alt="Gambar Kegiatan" class="img-thumbnail" style="width: 80px;">
                                    </td>
                                    <td class="align-middle text-start">Pentas Seni Sekolah</td>
                                    <td>2025-05-22</td>
                                    <td>Enjelina</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditGallery" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>
                                        <img src="/path/to/image2.jpg" alt="Gambar Kegiatan" class="img-thumbnail" style="width: 80px;">
                                    </td>
                                    <td class="align-middle text-start">Kegiatan Donor Darah</td>
                                    <td>2025-05-21</td>
                                    <td>Jonathan</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditGallery" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Tambahkan baris lainnya di sini -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Galeri -->
    <div class="modal fade" id="modalAddGallery" tabindex="-1" aria-labelledby="modalAddGalleryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddGalleryLabel">Tambah Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author">
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

    <!-- Modal Edit Galeri -->
    <div class="modal fade" id="modalEditGallery" tabindex="-1" aria-labelledby="modalEditGalleryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditGalleryLabel">Edit Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="edit_gambar" class="form-label">Ganti Gambar</label>
                            <input type="file" class="form-control" id="edit_gambar" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="edit_nama_kegiatan" value="Pentas Seni Sekolah">
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tanggal" value="2025-05-22">
                        </div>
                        <div class="mb-3">
                            <label for="edit_author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="edit_author" value="Enjelina">
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



