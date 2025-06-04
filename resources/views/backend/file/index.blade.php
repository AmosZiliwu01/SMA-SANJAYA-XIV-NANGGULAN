@extends('backend.layout.main')
@section('title', 'Data File')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data File</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddDownload">
                            <i class="bi bi-plus-circle me-1"></i> Add File
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>File</th>
                                    <th>Deskripsi</th>
                                    <th>Oleh</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Contoh data dummy -->
                                <tr class="text-center">
                                    <td>1</td>
                                    <td class="align-middle text-start">laporan_tahunan.pdf</td>
                                    <td class="align-middle text-start">Laporan tahunan perusahaan</td>
                                    <td>Enjelina</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditDownload" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td class="align-middle text-start">panduan_pengguna.docx</td>
                                    <td class="align-middle text-start">Panduan penggunaan aplikasi</td>
                                    <td>Jonathan</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditDownload" title="Edit">
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

    <!-- Modal Tambah Download -->
    <div class="modal fade" id="modalAddDownload" tabindex="-1" aria-labelledby="modalAddDownloadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddDownloadLabel">Tambah File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">File</label>
                            <input type="file" class="form-control" id="fileUpload" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip">
                            <small class="text-muted">File yang diizinkan: pdf, doc, docx, ppt, pptx, zip</small>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Deskripsi file"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Oleh</label>
                            <input type="text" class="form-control" id="author" placeholder="Nama pembuat/file uploader">
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


    <!-- Modal Edit Download -->
    <div class="modal fade" id="modalEditDownload" tabindex="-1" aria-labelledby="modalEditDownloadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalEditDownloadLabel">Edit File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">File</label>
                            <input type="file" class="form-control" id="fileUpload" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip">
                            <small class="text-muted">File yang diizinkan:pdf, doc, docx, ppt, pptx, zip</small>
                        </div>

                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="editDescription" rows="3">Laporan tahunan perusahaan</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editAuthor" class="form-label">Oleh</label>
                            <input type="text" class="form-control" id="editAuthor" value="Enjelina">
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
