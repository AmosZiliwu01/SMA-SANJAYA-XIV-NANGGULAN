@extends('frontend.layout.main')
@section('content')

    <!-- Gallery Section -->
    <section class="photo-gallery-unique" aria-label="School Photo Gallery Section">
        <h2 class="gallery-title mt-5">Gallery SMA Sanjaya XIV Nanggulan </h2>
        <div class="underline-blue"></div>
        <p class="gallery-subtitle">Menampilkan momen terbaik dari aktivitas dan kegiatan sekolah kami</p>

        <div class="gallery">
            @foreach($galleries as $index => $gallery)
                <div class="gallery-item {{ $index >= 6 ? 'hidden' : '' }}" tabindex="0" data-caption="{{ $gallery->title }}" data-index="{{ $index }}">

                    <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}"
                         alt="{{ $gallery->title }}" />
                    <div class="overlay" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle>
                            <path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <div class="caption">{{ $gallery->title }}</div>
                </div>
            @endforeach
        </div>


        <button class="show-more-btn" aria-expanded="false" aria-controls="photo-gallery-section">Tampilkan Lebih Banyak</button>
    </section>

    <!-- Modal structure -->
    <div class="photo-gallery-modal" role="dialog" aria-modal="true" aria-labelledby="modal-caption" aria-describedby="modal-desc" tabindex="-1">
        <button class="photo-gallery-close-btn" aria-label="Close">&times;</button>
        <div class="photo-gallery-modal-content">
            <img src="" alt="" />
            <div id="modal-caption" class="photo-gallery-modal-caption"></div>
        </div>
        <button class="photo-gallery-modal-nav photo-gallery-modal-prev" aria-label="Previous image" tabindex="0">&#10094;</button>
        <button class="photo-gallery-modal-nav photo-gallery-modal-next" aria-label="Next image" tabindex="0">&#10095;</button>
    </div>

@endsection
