@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Berita</h5>
                    </div>
                    <div class="card-body px-4 pt-4 pb-2">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-9">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul berita">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary w-100" disabled>Publish</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card border-danger mb-3">
                                        <div class="card-header">
                                            <strong>Isi Berita</strong>
                                        </div>
                                        <div class="card-body pt-1">
                                            <textarea name="isi" id="editor" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-info mb-3">
                                        <div class="card-header">
                                            <strong>Pengaturan Lainnya</strong>
                                        </div>
                                        <div class="card-body pt-1">
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <select name="kategori" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="politik">Politik</option>
                                                    <option value="olahraga">Olahraga</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" name="gambar" class="form-control" disabled>
                                                <small class="text-muted">* Upload tidak aktif, hanya demo tampilan.</small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
