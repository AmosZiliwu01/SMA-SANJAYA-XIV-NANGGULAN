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
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" placeholder="Judul berita" value="{{ old('title', $post->title) }}" required>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card border-danger mb-3">
                                        <div class="card-header">
                                            <strong>Isi Berita</strong>
                                        </div>
                                        <div class="card-body pt-1">
                                            <textarea name="content" id="editor" rows="10" class="form-control">{{ old('content', $post->content) }}</textarea>
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
                                                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Choose Image</label>
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id="edit_gambar_{{ $post->id }}"
                                                    name="image"
                                                    accept="image/*"
                                                    data-preview="#preview-edit-image-{{ $post->id }}"
                                                    onchange="previewImage(event, '{{ $post->id }}')"
                                                >
                                                <small class="form-text text-muted">Format: jpeg, png, jpg, gif, svg. Maksimal ukuran: 2MB.</small>

                                                <!-- Gambar Lama -->
                                                <label for="image" class="form-label d-block mt-3 mb-2">Preview Image</label>
                                                <img
                                                    src="{{ asset('storage/' . $post->image) }}"
                                                    alt="Gambar Lama"
                                                    width="100"
                                                    class="mt-2 mb-4 d-block"
                                                    id="preview-old-image-{{ $post->id }}"
                                                >

                                                <!-- Preview Gambar Baru -->
                                                <img
                                                    id="preview-edit-image-{{ $post->id }}"
                                                    src="#"
                                                    alt="Preview Baru"
                                                    class="img-fluid mt-2 mb-4 d-none"
                                                    style="max-height: 150px;"
                                                >

                                            </div>

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="is_slider" name="is_slider" value="1"
                                                    {{ old('is_slider', $post->is_slider) ? 'checked' : '' }}>
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
