@extends('backend.layout.main')
@section('title', 'Data Pengumuman')
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
                                @foreach ($announcements as $row)
                                    <tr>
                                        <td class="text-center">{{ ($announcements->currentPage() - 1) * $announcements->perPage() + $loop->iteration }}</td>
                                        <td>{{ Str::limit($row->title, 50, '...') }}</td>
                                        <td class="align-middle text-start">
                                        <span title="{{ $row->content }}">
                                            {{ Str::limit($row->content, 50, '...') }}
                                        </span>
                                        </td>
                                        <td class="text-center">{{ $row->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">{{ $row->user->name ?? 'Unknown' }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditPengumuman{{ $row->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form id="delete-announcement-{{$row->id}}" action="{{route('announcement.destroy', $row->id)}}" method="post" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" onclick="confirmDelete({{$row->id}})" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start mt-3 px-2 gap-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $announcements->firstItem() }} - {{ $announcements->lastItem() }} dari total {{ $announcements->total() }} pengumuman
                            </p>
                            <div class="d-flex justify-content-center">
                                {{ $announcements->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pengumuman -->
    <div class="modal fade" id="modalAddPengumuman" tabindex="-1" aria-labelledby="modalAddPengumumanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddPengumumanLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('announcement.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Deskripsi</label>
                            <textarea name="content" class="form-control" id="content" rows="5" placeholder="Isi pengumuman..." required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengumuman -->
    @foreach ($announcements as $row)
        <div class="modal fade" id="modalEditPengumuman{{ $row->id }}" tabindex="-1" aria-labelledby="modalEditPengumumanLabel{{ $row->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditPengumumanLabel{{ $row->id }}">Edit Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('announcement.update', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="edit_title{{ $row->id }}" class="form-label">Judul</label>
                                <input type="text" name="title" class="form-control" id="edit_title{{ $row->id }}" value="{{ $row->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_content{{ $row->id }}" class="form-label">Deskripsi</label>
                                <textarea name="content" class="form-control" id="edit_content{{ $row->id }}" rows="5" required>{{ $row->content }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function confirmDelete(id){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your announcement has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-announcement-' + id).submit();
                    });
                }
            });
        }
    </script>

@endsection
