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



