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
                                <thead class="table-primary">
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
                                    <tr>
                                        <td>{{ ($messages->currentPage() - 1) * $messages->perPage() + $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-start">{{ $item->message }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ $item->is_read ? 'Dibaca' : 'Belum Dibaca' }}</td>
                                        <td>
                                            {{-- Tombol Balas / Lihat Balasan --}}
                                            @if ($item->is_read == 0)
                                                <!-- Tombol Balas (warna kuning) -->
                                                <button type="button" class="btn btn-sm btn-warning me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalReply{{ $item->id }}">
                                                    <i class="bi bi-reply-fill"></i>
                                                </button>
                                            @else
                                                <!-- Tombol Lihat Balasan (warna hijau) -->
                                                <button type="button" class="btn btn-sm btn-success me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalViewReply{{ $item->id }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                            @endif
                                            {{-- Tombol Delete --}}
                                            <form id="delete-message-{{ $item->id }}" action="{{ route('message.destroy', $item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            {!! $messages->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal Balas Pesan -->
@foreach ($messages as $item)
    <div class="modal fade" id="modalReply{{ $item->id }}" tabindex="-1" aria-labelledby="modalReplyLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('message.reply', $item->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalReplyLabel{{ $item->id }}">Balas Pesan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Dari:</strong> {{ $item->name }} ({{ $item->email }})</p>
                        <p><strong>Pesan:</strong> {{ $item->message }}</p>
                        <div class="mb-3">
                            <label for="reply" class="form-label">Balasan</label>
                            <textarea name="reply" class="form-control" rows="4" required>{{ $item->reply }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-message-' + id).submit();
                }
            });
        }
    </script>
@endpush
