@extends('backend.layout.main')

@section('title', 'Data File Pedoman')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data File Pedoman</h5>
                    </div>

                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="bi bi-plus-circle me-1"></i> Add File
                        </button>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ ($files->currentPage() - 1) * $files->perPage() + $loop->iteration }}</td>
                                        <td class="text-start">{{ $file->title }}</td>
                                        <td class="text-start">{{ Str::limit($file->description, 50) }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $file->file_path) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-file-earmark-text me-1"></i>
                                                Lihat File
                                            </a>
                                        </td>
                                        <td>{{ $file->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEditFile{{ $file->id }}"
                                                    title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form id="delete-file-{{ $file->id }}"
                                                  action="{{ route('file.destroy', $file->id) }}"
                                                  method="POST"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus"
                                                    onclick="confirmDelete({{$file->id}})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start mt-3 px-2 gap-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $files->firstItem() }} - {{ $files->lastItem() }} dari total {{ $files->total() }} file
                            </p>
                            <div class="d-flex justify-content-center">
                                {{ $files->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah File -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah File Pedoman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       placeholder="Masukkan judul file" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="file_path" class="form-label">File</label>
                                <input type="file" name="file_path" id="file_path" class="form-control" required>
                                <small class="text-muted">File yang diizinkan: pdf, doc, docx, ppt, pptx, zip (Max: 10MB)</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control"
                                          rows="4" placeholder="Masukkan deskripsi file" required></textarea>
                            </div>
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

    <!-- Modal Edit File -->
    @foreach($files as $item)
        <div class="modal fade" id="modalEditFile{{$item->id}}" tabindex="-1"
             aria-labelledby="modalEditFileLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditFileLabel">Edit File Pedoman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('file.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_title_{{$item->id}}" class="form-label">Judul</label>
                                    <input type="text" name="title" id="edit_title_{{$item->id}}"
                                           class="form-control" value="{{$item->title}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_file_path_{{$item->id}}" class="form-label">File</label>
                                    <input type="file" name="file_path" id="edit_file_path_{{$item->id}}"
                                           class="form-control">
                                    <small class="text-muted">File yang diizinkan: pdf, doc, docx, ppt, pptx, zip (Max: 10MB)</small>
                                    @if($item->file_path)
                                        <div class="mt-2 p-2 bg-light rounded">
                                            <small class="text-muted">File saat ini: </small>
                                            <a href="{{ asset('storage/' . $item->file_path) }}"
                                               target="_blank" class="text-primary">
                                                <i class="bi bi-file-earmark-text me-1"></i>{{ basename($item->file_path) }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_description_{{$item->id}}" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="edit_description_{{$item->id}}"
                                              class="form-control" rows="4" required>{{$item->description}}</textarea>
                                </div>
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
@endsection

@push('scripts')
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
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(() => {
                        document.getElementById(`delete-file-${id}`).submit();
                    });
                }
            });
        }
    </script>
@endpush
