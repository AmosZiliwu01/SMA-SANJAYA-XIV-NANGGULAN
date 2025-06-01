@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Post Berita</h5>
                    </div>
                    <div class="card-body px-4 pt-4 pb-2">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" placeholder="Judul berita" required>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card border-danger mb-3">
                                        <div class="card-header">
                                            <strong>Isi Berita</strong>
                                        </div>
                                        <div class="card-body pt-1">
                                            <textarea name="content" id="editor" rows="10" class="form-control"></textarea>
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
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

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

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="is_slider" name="is_slider" value="1">
                                                <label class="form-check-label" for="is_slider">Tampilkan di Slider</label>
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
