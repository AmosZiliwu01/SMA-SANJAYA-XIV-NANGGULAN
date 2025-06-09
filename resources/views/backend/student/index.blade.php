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
                    <div class="m-4 text-lg-start">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAddStudent">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
                        </button>
                        <a href="{{ route('students.export') }}" class="btn btn-primary me-2">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel
                        </a>
                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importExcelModal">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Import Excel
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Kelas</th>
                                    <th>Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $row)
                                    <tr>
                                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/students/' . $row->photo) }}" alt="Foto siswa"
                                                 width="50" height="50"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                        </td>
                                        <td>{{ $row->nis }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->class->name ?? '-' }}</td>
                                        <td>{{ $row->entry_year ?? '-' }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditStudent{{ $row->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form id="delete-student-{{ $row->id }}"
                                                  action="{{ route('students.destroy', $row->id) }}" method="POST"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" onclick="confirmDelete({{ $row->id }})"
                                               class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start mt-3 px-2 gap-2">
                                <p class="text-muted small mb-0">
                                    Menampilkan {{ $students->firstItem() }} - {{ $students->lastItem() }} dari total {{ $students->total() }} siswa
                                </p>
                                <div class="d-flex justify-content-center">
                                    {{ $students->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Siswa -->
        <div class="modal fade" id="modalAddStudent" tabindex="-1" aria-labelledby="modalAddStudentLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalAddStudentLabel">Tambah Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis"
                                           placeholder="Masukkan NIS">
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" class="form-select" id="gender">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="class_id" class="form-label">Pilih Kelas</label>
                                    <select name="class_id" id="class_id" class="form-select" required>
                                        <option selected disabled>-- Pilih Kelas --</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="entry_year" class="form-label">Tahun Masuk</label>
                                    <input type="number" name="entry_year" class="form-control" id="entry_year"
                                           placeholder="Masukkan Tahun Masuk" value="{{ date('Y') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" name="photo" class="form-control" id="photo">
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

        <!-- Modal Edit Siswa -->
        @foreach ($students as $row)
            <div class="modal fade" id="modalEditStudent{{ $row->id }}" tabindex="-1"
                 aria-labelledby="modalEditStudentLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="modalEditStudentLabel">Edit Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('students.update', $row->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_nis" class="form-label">NIS</label>
                                        <input type="text" name="nis" class="form-control" id="edit_nis"
                                               value="{{ $row->nis }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" id="edit_name"
                                               value="{{ $row->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="gender" id="edit_gender">
                                            <option value="L" {{ $row->gender == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P" {{ $row->gender == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_class_id" class="form-label">Pilih Kelas</label>
                                        <select name="class_id" id="edit_class_id" class="form-select" required>
                                            <option selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                        {{ $row->class_id == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_entry_year" class="form-label">Tahun Masuk</label>
                                        <input type="number" name="entry_year" class="form-control"
                                               id="edit_entry_year" value="{{ $row->entry_year }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_photo" class="form-label">Foto</label>
                                        <input type="file" name="photo" class="form-control" id="edit_photo">
                                        @if($row->photo)
                                            <img src="{{ asset('storage/students/' . $row->photo) }}" alt="Foto siswa"
                                                 width="100" height="auto"
                                                 onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                        @else
                                            <p>Belum ada foto</p>
                                        @endif
                                        <input type="hidden" name="old_photo" value="{{ $row->photo }}">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>
                                    <button type="submit" class="btn btn-warning text-white">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal Import Excel -->
        <div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importExcelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="importExcelModalLabel">Import Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="importFile" class="form-label">Pilih File Excel</label>
                                <input type="file" name="file-import" class="form-control" id="importFile" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Data siswa akan dihapus permanen!",
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
    </div>
@endsection
