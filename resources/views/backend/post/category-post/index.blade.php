@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Kategori</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCategory">
                            <i class="bi bi-plus-circle me-1"></i> Add Kategori
                        </button>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle table-Category">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 80px;">No</th>
                                    <th>Nama Kategori</th>
                                    <th class="text-center" style="width: 200px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as  $category)
                                    <tr>
                                        <td class="text-center">{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                        <td style="padding-left: 25px">{{ $category->name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditCategory{{ $category->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form id="delete-category-{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" onclick="confirmDelete({{ $category->id }})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $categories->firstItem() }} - {{ $categories->lastItem() }} dari total {{ $categories->total() }} user
                            </p>
                            {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Kategori -->
    <div class="modal fade" id="modalAddCategory" tabindex="-1" aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalAddCategoryLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="namaKategori" class="form-label fs-6">Nama Kategori</label>
                            <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan Nama Kategori">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- Tombol Simpan -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit Kategori -->
    @foreach($categories as $category)
        <div class="modal fade" id="modalEditCategory{{ $category->id }}" tabindex="-1" aria-labelledby="modalEditCategoryLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="modalEditCategoryLabel{{ $category->id }}">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editNamaKategori{{ $category->id }}" class="form-label fs-6">Nama Kategori</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   id="editNamaKategori{{ $category->id }}"
                                   value="{{ old('name', $category->name) }}"
                                   placeholder="Masukkan nama kategori" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                        document.getElementById('delete-category-' + id).submit();
                    });
                }
            });
        }
    </script>
@endsection
