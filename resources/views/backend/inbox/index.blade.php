@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Inbox Pesan</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengirim</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Andi Pratama</td>
                                    <td>andi@example.com</td>
                                    <td class="text-truncate" style="max-width: 200px;">Halo admin, saya ingin bertanya tentang jadwal kegiatan sekolah minggu ini...</td>
                                    <td>24 Mei 2025</td>
                                    <td><span class="badge bg-warning">Belum Dibaca</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white me-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalViewMessage"
                                                data-nama="Andi Pratama"
                                                data-email="andi@example.com"
                                                data-tanggal="24 Mei 2025"
                                                data-pesan="Halo admin, saya ingin bertanya tentang jadwal kegiatan sekolah minggu ini. Mohon informasinya. Terima kasih.">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Siti Aisyah</td>
                                    <td>siti@example.com</td>
                                    <td class="text-truncate" style="max-width: 200px;">Terima kasih atas kegiatan seminar kemarin. Sangat bermanfaat!</td>
                                    <td>23 Mei 2025</td>
                                    <td><span class="badge bg-success">Sudah Dibaca</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white me-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalViewMessage"
                                                data-nama="Siti Aisyah"
                                                data-email="siti@example.com"
                                                data-tanggal="23 Mei 2025"
                                                data-pesan="Terima kasih atas kegiatan seminar kemarin. Sangat bermanfaat!">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Tambah data pesan lain sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Global -->
    <div class="modal fade" id="modalViewMessage" tabindex="-1" aria-labelledby="modalViewMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalViewMessageLabel">Detail Pesan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Pengirim:</strong> <span id="viewNama"></span></p>
                    <p><strong>Email:</strong> <span id="viewEmail"></span></p>
                    <p><strong>Tanggal:</strong> <span id="viewTanggal"></span></p>
                    <hr>
                    <p><strong>Isi Pesan:</strong></p>
                    <p id="viewPesan"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const modal = document.getElementById('modalViewMessage');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            document.getElementById('viewNama').textContent = button.getAttribute('data-nama');
            document.getElementById('viewEmail').textContent = button.getAttribute('data-email');
            document.getElementById('viewTanggal').textContent = button.getAttribute('data-tanggal');
            document.getElementById('viewPesan').textContent = button.getAttribute('data-pesan');
        });
    </script>
@endpush
