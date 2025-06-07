@extends('frontend.layout.main')
@section('content')

    <!-- Gallery Section -->
    <section class="photo-gallery-unique" aria-label="School Photo Gallery Section">
        <h2 class="gallery-title mt-5">Gallery SMA Sanjaya XIV Nanggulan </h2>
        <div class="underline-blue"></div>
        <p class="gallery-subtitle">Menampilkan momen terbaik dari aktivitas dan kegiatan sekolah kami</p>

        <div class="gallery" aria-label="School photo gallery">
            <div class="gallery-item" tabindex="0" data-caption="Science Fair 2023" data-index="0">
                <img src="gb.webp" alt="Students presenting science projects at a school science fair" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Science Fair 2023</div>
            </div>
            <div class="gallery-item" tabindex="0" data-caption="Sports Day - Relay Race">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80" alt="Children running during relay race on school sports day" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Sports Day - Relay Race</div>
            </div>
            <div class="gallery-item" tabindex="0" data-caption="Art Workshop">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" alt="Students painting together during an art workshop" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Art Workshop</div>
            </div>
            <div class="gallery-item" tabindex="0" data-caption="Graduation Ceremony">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80" alt="Students wearing caps and gowns at graduation ceremony" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Graduation Ceremony</div>
            </div>
            <div class="gallery-item" tabindex="0" data-caption="School Assembly">
                <img src="https://images.unsplash.com/photo-1531918458765-f6e522bfbce3?auto=format&fit=crop&w=800&q=80" alt="School assembly with students sitting and listening" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">School Assembly</div>
            </div>
            <div class="gallery-item" tabindex="0" data-caption="Library Reading Time">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=800&q=80" alt="Children reading books at school library" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Library Reading Time</div>
            </div>

            <!-- Hidden photos initially -->
            <div class="gallery-item hidden" tabindex="0" data-caption="Music Festival">
                <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=800&q=80" alt="School students performing at a music festival" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Music Festival</div>
            </div>
            <div class="gallery-item hidden" tabindex="0" data-caption="Field Trip" >
                <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80" alt="Students on a field trip outdoors" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Field Trip</div>
            </div>
            <div class="gallery-item hidden" tabindex="0" data-caption="Community Service" >
                <img src="https://images.unsplash.com/photo-1496317556649-f930d733eea6?auto=format&fit=crop&w=800&q=80" alt="Students participating in community service" />
                <div class="overlay" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#003B8E" stroke-width="2" fill="none"></circle><path d="M8 12l2 2 4-4" stroke="#003B8E" stroke-width="2" fill="none" /></svg>
                </div>
                <div class="caption">Community Service</div>
            </div>
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
