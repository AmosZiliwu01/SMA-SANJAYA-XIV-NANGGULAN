@extends('frontend.layout.main')
@section('content')

    <!-- Download Section -->
    <section class="py-5 mt-3">
        <div class="container">
            <h2 class="text-center fw-bold mb-2">Download Dokumen</h2>
            <p class="text-center text-muted mb-4">Unduh berbagai dokumen penting sekolah dengan mudah</p>

            <!-- Daftar Dokumen -->
            <div class="d-flex flex-column gap-3">
                @foreach($files as $file)
                    <div class="d-flex align-items-center p-3 rounded bg-light shadow-sm">
                        <div class="me-3">
                            <i class="fas fa-file-alt fa-2x" style="color: #003B8F;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-semibold">{{ $file->title }}</div>
                            <div class="text-muted small">{{ Str::limit($file->description, 50) }}</div>
                        </div>
                        <a href="{{ asset('storage/' . $file->file_path) }}" download class="btn ms-3"
                           style="background-color: #003B8F; color: white;">Download</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
