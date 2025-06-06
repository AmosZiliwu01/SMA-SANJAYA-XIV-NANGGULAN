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

                    <div class="m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="bi bi-plus-circle me-1"></i> Add File
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $index => $file)
                                    <tr>
                                        <td>{{ ($files->currentPage() - 1) * $files->perPage() + $loop->iteration }}</td>
                                        <td>{{ $file->title }}</td>
                                        <td>{{ $file->description }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $file->file_path) }}"
                                               target="_blank">{{ $file->file_path }}</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditFile-{{$file->id}}" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form id="delete-file-{{ $file->id }}" action="{{ route('file.destroy', $file->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" title="Hapus"
                                                        onclick="confirmDelete({{$file->id}})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {!! $files->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data"
                  class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="file_path" class="form-label">File</label>
                        <input type="file" name="file_path" id="file_path" class="form-control" required>
                        <small class="text-muted">File yang diizinkan: pdf, doc, docx, ppt, pptx, zip</small>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!--Modal Edit-->
    @foreach($files as $item)
        <div class="modal fade" id="modalEditFile-{{$item->id}}" tabindex="-1" aria-labelledby="modalEditFile"
             aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('file.update', $item->id)}}" method="POST" enctype="multipart/form-data"
                      class="modal-content">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditFile">Edit File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$item->title}}"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="file_path-{{$item->id}}" class="form-label">File</label>
                            <input type="file" name="file_path" id="file_path-{{$item->id}}" class="form-control">
                            <small class="text-muted">File yang diizinkan: pdf, doc, docx, ppt, pptx, zip</small>
                            @if($item->file_path)
                                <div class="mt-1">
                                    <small class="text-muted">File saat ini: <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">{{ $item->file_path }}</a></small>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control"
                                      required>{{$item->title}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
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
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-file-${id}`).submit();
                }
            });
        }
    </script>
@endpush
