@extends('backend.layout.main')
@section('title', 'Data Testimonial')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Testimoni</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAddTestimonial">
                            <i class="bi bi-plus-circle me-1"></i> Add Testimoni
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Tahun Lulus</th>
                                        <th>Testimoni</th>
                                        <th>Tanggal Post</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($testimonials as $row)
                                        <tr>
                                            <td>{{ ($testimonials->currentPage() - 1) * $testimonials->perPage() + $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/testimonials/' . $row->photo) }}"
                                                     alt="Foto testimonial"
                                                     width="50"
                                                     height="50"
                                                     class="rounded-circle mt-2"
                                                     onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->graduation_year }}</td>
                                            <td class="text-start">{{ Str::limit($row->message, 50, '...') }}</td>
                                            <td>{{ $row->created_at->format('d M Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modalEditTestimonial{{ $row->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <form id="delete-testimonial-{{$row->id}}" action="{{ route('testimonial.destroy', $row->id) }}" method="post" style="display:none;">
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
                                    Menampilkan {{ $testimonials->firstItem() }} - {{ $testimonials->lastItem() }} dari total {{ $testimonials->total() }} testimoni
                                </p>
                                <div class="d-flex justify-content-center">
                                    {{ $testimonials->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Testimoni -->
    <div class="modal fade" id="modalAddTestimonial" tabindex="-1" aria-labelledby="modalAddTestimonialLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddTestimonialLabel">Tambah Data Testimoni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="col-md-6">
                                <label for="graduation_year" class="form-label">Tahun Lulus</label>
                                <input type="number" name="graduation_year" class="form-control" id="graduation_year" placeholder="Contoh: 2024" min="1900" max="{{ date('Y') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="message" class="form-label">Testimoni</label>
                                <textarea name="message" class="form-control" id="message" rows="4" placeholder="Masukkan testimoni..." required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" name="photo" class="form-control" id="photo">
                                <small class="text-muted">Format: JPG, JPEG, PNG, GIF, SVG. Maksimal 2MB.</small>
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

    <!-- Modal Edit Testimoni -->
    @foreach ($testimonials as $row)
        <div class="modal fade" id="modalEditTestimonial{{ $row->id }}" tabindex="-1" aria-labelledby="modalEditTestimonialLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalEditTestimonialLabel">Edit Data Testimoni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('testimonial.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_name" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="edit_name" value="{{ $row->name }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_graduation_year" class="form-label">Tahun Lulus</label>
                                    <input type="number" name="graduation_year" class="form-control" id="edit_graduation_year" value="{{ $row->graduation_year }}" min="1900" max="{{ date('Y') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_message" class="form-label">Testimoni</label>
                                    <textarea name="message" class="form-control" id="edit_message" rows="4" required>{{ $row->message }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="edit_photo" class="form-label">Foto</label>
                                    <input type="file" name="photo" class="form-control" id="edit_photo">
                                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF, SVG. Maksimal 2MB.</small>
                                    @if($row->photo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/testimonials/' . $row->photo) }}"
                                                 alt="Foto testimonial"
                                                 width="100"
                                                 height="auto"
                                                 class="rounded"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                        </div>
                                    @else
                                        <p class="mt-2 text-muted">Belum ada foto</p>
                                    @endif
                                    <input type="hidden" name="old_photo" value="{{ $row->photo }}">
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
                        text: "Your testimonial has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-testimonial-' + id).submit();
                    });
                }
            });
        }
    </script>
@endsection
