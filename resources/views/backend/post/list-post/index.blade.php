@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Berita</h5>
                    </div>
                    <div class="mb-0  m-4 text-lg-start">
                        <a href="#" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Post Berita
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center align-middle" style="table-layout: fixed;">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 100px;">Gambar</th>
                                    <th scope="col" style="width: 250px;">Judul</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Baca</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="https://via.placeholder.com/100" alt="gambar" class="img-thumbnail" style="width: 100px;">
                                    </td>
                                    <td>Judul Berita Pertama</td>
                                    <td>22 Mei 2025</td>
                                    <td>Admin</td>
                                    <td>150x</td>
                                    <td>Teknologi</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" onclick="showDeleteAlert()" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="https://via.placeholder.com/100" alt="gambar" class="img-thumbnail" style="width: 100px;">
                                    </td>
                                    <td>Judul Berita Kedua</td>
                                    <td>21 Mei 2025</td>
                                    <td>Editor</td>
                                    <td>90x</td>
                                    <td>Gaya Hidup</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" onclick="showDeleteAlert()" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
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
@endsection


