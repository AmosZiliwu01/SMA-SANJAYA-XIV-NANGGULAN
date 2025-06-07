@extends('backend.layout.main')
@section('title', 'Data Siswa')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Siswa</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAddStudent">
                            <i class="bi bi-plus-circle me-1"></i> Add Siswa
                        </button>
                        <a href="{{ route('student.export') }}" target="_blank" class="btn btn-primary me-2">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel
                        </a>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                           data-bs-target="#importExcelModal">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Import Excel
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $key => $item)
                                    <tr>
                                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('public/storage/photos/students/' . $item->photo) }}"
                                                 alt="Foto siswa" width="50" height="50"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                        </td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->class->name ?? '-' }}</td>
                                        <td class="text-center">
                                            {{-- Tombol Edit --}}
                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditStudent{{ $item->id }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            {{-- Tombol Delete --}}
                                            <form id="delete-student-{{ $item->id }}"
                                                  action="{{ route('student.destroy', $item->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                    class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $students->firstItem() }} - {{ $students->lastItem() }} dari total {{ $students->total() }} siswa
                            </p>
                            {{ $students->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="modalAddStudent" tabindex="-1" aria-labelledby="modalAddStudentLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddStudentLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">NIS</label>
                                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="gender" required>
                                    <option selected disabled>- Pilih Jenis Kelamin -</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kelas</label>
                                <select name="class_id" class="form-select" required>
                                    <option selected disabled>- Pilih Kelas -</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
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

    @foreach ($students as $item)
        <form action="{{ route('student.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal fade" id="modalEditStudent{{ $item->id }}" tabindex="-1"
                 aria-labelledby="modalEditStudentLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="modalEditStudentLabel{{ $item->id }}">Edit Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIS</label>
                                    <input type="number" name="nis" class="form-control"
                                           value="{{ old('nis', $item->nis) }}"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ old('name', $item->name) }}"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="gender" class="form-select form-control" required>
                                        <option
                                            value="" {{ $item->gender !== 'L' && $item->gender !== 'P' ? 'selected' : '' }}>
                                            - Pilih Jenis Kelamin -
                                        </option>
                                        <option value="L" {{ $item->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $item->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Kelas</label>
                                    <select name="class_id" class="form-select" required>
                                        <option value="" disabled>- Pilih Kelas -</option>
                                        @foreach ($classes as $class)
                                            <option
                                                value="{{ $class->id }}" {{ $item->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    <!-- Modal Import Excel -->
    <div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importExcelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importExcelModalLabel">Import Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">File Excel (.xlsx/.xls)</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                    document.getElementById('delete-student-' + id).submit();
                }
            });
        }
    </script>
@endpush
