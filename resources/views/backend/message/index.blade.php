@extends('backend.layout.main')

@section('title', 'Data Message')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Message</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $item)
                                    <tr class="{{ $item->is_read ? 'table-light' : '' }}">
                                        <td>{{ ($messages->currentPage() - 1) * $messages->perPage() + $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-start">{{ Str::limit($item->message, 50, '...') ?? $item->message }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            @if($item->is_read)
                                                <span class="badge bg-success">Sudah Dibalas</span>
                                            @else
                                                <span class="badge bg-warning">Belum Dibaca</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_read == 0)
                                                <button type="button" class="btn btn-sm btn-warning me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalReply{{ $item->id }}"
                                                        title="Balas Pesan">
                                                    <i class="bi bi-reply-fill"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-info me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalView{{ $item->id }}"
                                                        title="Lihat Balasan">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                            @endif
                                            <form id="delete-message-{{ $item->id }}" action="{{ route('message.destroy', $item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger" title="Hapus Pesan">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start mt-3 px-2 gap-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $messages->firstItem() }} - {{ $messages->lastItem() }} dari total {{ $messages->total() }} pesan
                            </p>
                            <div class="d-flex justify-content-center">
                                {{ $messages->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal Balas Pesan -->
@foreach ($messages as $item)
    @if($item->is_read == 0)
        <div class="modal fade" id="modalReply{{ $item->id }}" tabindex="-1" aria-labelledby="modalReplyLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('message.reply', $item->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalReplyLabel{{ $item->id }}">Balas Pesan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                <h6><i class="bi bi-info-circle"></i> Informasi:</h6>
                                <p class="mb-0">Setelah Anda mengirim balasan, sistem akan otomatis menambahkan informasi kontak (email dan WhatsApp) untuk komunikasi lebih lanjut.</p>
                            </div>
                            <p><strong>Dari:</strong> {{ $item->name }} ({{ $item->email }})</p>
                            <p><strong>Pesan:</strong></p>
                            <div class="bg-light p-3 rounded mb-3">
                                {{ $item->message }}
                            </div>
                            <div class="mb-3">
                                <label for="reply{{ $item->id }}" class="form-label">Balasan Anda</label>
                                <textarea name="reply" id="reply{{ $item->id }}" class="form-control" rows="5" required placeholder="Tulis balasan Anda di sini..."></textarea>
                            </div>
                            <div class="alert alert-secondary">
                                <small>
                                    <strong>Catatan:</strong> Sistem akan otomatis menambahkan informasi berikut di akhir email:
                                    <br>• Informasi bahwa pesan tidak perlu dibalas
                                    <br>• Email kontak: sma_sanjaya14@yahoo.com
                                    <br>• Nomor WhatsApp untuk komunikasi lebih lanjut
                                </small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Kirim Balasan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal View Balasan untuk pesan yang sudah dibalas -->
    @if($item->is_read == 1)
        <div class="modal fade" id="modalView{{ $item->id }}" tabindex="-1" aria-labelledby="modalViewLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalViewLabel{{ $item->id }}">Detail Pesan & Balasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Pesan Asli:</h6>
                                <p><strong>Dari:</strong> {{ $item->name }} ({{ $item->email }})</p>
                                <div class="bg-light p-3 rounded">
                                    {{ $item->message }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Balasan yang Dikirim:</h6>
                                <div class="bg-primary text-white p-3 rounded">
                                    {{ $item->reply ?? 'Tidak ada balasan tersimpan' }}
                                </div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-check-circle text-success"></i> Balasan telah dikirim dengan informasi kontak lengkap
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-message-' + id).submit();
                }
            });
        }
    </script>
@endpush
