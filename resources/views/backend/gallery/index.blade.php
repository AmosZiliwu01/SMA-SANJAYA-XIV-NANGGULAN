@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Gallery</h5>
                    </div>
                    <div class="m-4 text-lg-start mb-0">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddGallery">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Gallery
                        </button>
                    </div>
                    <div class="card-body mt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Author</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($galleries as  $gallery)
                                    <tr class="text-center">
                                        <td>{{ ($galleries->currentPage() - 1) * $galleries->perPage() + $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}"  width="80" height="80">
                                        </td>
                                        <td class="align-middle text-start">{{ $gallery->title }}</td>
                                        <td>{{ $gallery->user->role ?? 'Unknown' }}</td>
                                        <td>
                                            {{ $gallery->updated_at != $gallery->created_at
                                                ? $gallery->updated_at->format('d M Y')
                                                : $gallery->created_at->format('d M Y') }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditGallery{{ $gallery->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="#" onclick="confirmDelete({{ $gallery->id }})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="delete-galleries-{{ $gallery->id }}" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $galleries->firstItem() }} - {{ $galleries->lastItem() }} dari total {{ $galleries->total() }} Gallery
                            </p>
                            {{ $galleries->links('pagination::bootstrap-5') }}
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
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Input Gambar -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input
                                type="file"
                                class="form-control"
                                id="image"
                                name="image"
                                accept="image/*"
                                onchange="previewImage(event)"
                                data-preview="#preview-image"
                                required
                            >
                            <small class="form-text text-muted">Format: jpeg, png, jpg, gif, svg. Maksimal ukuran: 2MB.</small>
                        </div>


                        <!-- Preview Gambar -->
                        <div class="mb-3">
                            <label for="image" class="form-label d-block">Preview Image</label>
                            <img
                                id="preview-image"
                                src="#"
                                alt="Preview Gambar"
                                class="img-fluid mt-2 d-none"
                                style="max-height: 150px;"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Galeri -->
    @foreach ($galleries as $gallery)
        <div class="modal fade" id="modalEditGallery{{ $gallery->id }}" tabindex="-1" aria-labelledby="modalEditGalleryLabel{{ $gallery->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="modalEditGalleryLabel{{ $gallery->id }}">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <label for="image" class="form-label">Choose Image</label>
                            <input
                                type="file"
                                class="form-control"
                                id="edit_gambar_{{ $gallery->id }}"
                                name="image"
                                accept="image/*"
                                data-preview="#preview-edit-image-{{ $gallery->id }}"
                                onchange="previewImage(event, '{{ $gallery->id }}')"
                            >
                            <small class="form-text text-muted">Format: jpeg, png, jpg, gif, svg. Maksimal ukuran: 2MB.</small>

                            <!-- Gambar Lama -->
                            <label for="image" class="form-label d-block mt-3 mb-2">Preview Image</label>
                            <img
                                src="{{ asset('storage/' . $gallery->image) }}"
                                alt="Gambar Lama"
                                width="100"
                                class="mt-2 mb-4 d-block"
                                id="preview-old-image-{{ $gallery->id }}"
                            >

                            <!-- Preview Gambar Baru -->
                            <img
                                id="preview-edit-image-{{ $gallery->id }}"
                                src="#"
                                alt="Preview Baru"
                                class="img-fluid mt-2 mb-4 d-none"
                                style="max-height: 150px;"
                            >

                            <div class="mb-3">
                                <label for="edit_nama_kegiatan_{{ $gallery->id }}" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="edit_nama_kegiatan_{{ $gallery->id }}" name="title" value="{{ old('title', $gallery->title) }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
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
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-galleries-' + id).submit();
                    });
                }
            });
        }
    </script>
@endsection



