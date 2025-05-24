@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Komentar</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengomentar</th>
                                    <th>Email</th>
                                    <th>Komentar</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Budi Santoso</td>
                                    <td>budi@example.com</td>
                                    <td class="text-truncate" style="max-width: 250px;">Komentar yang sangat membantu, terima kasih atas informasinya!</td>
                                    <td>23 Mei 2025</td>
                                    <td><span class="badge bg-success">Ditampilkan</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success me-1" title="Tampilkan/Sembunyikan">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sri Wahyuni</td>
                                    <td>sri@example.com</td>
                                    <td class="text-truncate" style="max-width: 250px;">Saya rasa ada beberapa hal yang perlu diperbaiki pada artikel ini.</td>
                                    <td>22 Mei 2025</td>
                                    <td><span class="badge bg-secondary">Disembunyikan</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success me-1" title="Tampilkan/Sembunyikan">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                                <!-- Tambah data komentar lain sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
