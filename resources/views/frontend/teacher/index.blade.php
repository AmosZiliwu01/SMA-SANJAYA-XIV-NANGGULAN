@extends('frontend.layout.main')
@section('content')

    <!-- Teachers Section -->
    <section class="teachers-section py-5 mt-3">
        <div class="container">
            <h2 class="section-title">Guru Kami</h2>

            <div class="row g-4">
                <!-- Teacher Card 1 -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="teacher-card">
                        <div class="teacher-img-container">
                            <img src="kepala-sekolah.jpg" alt="Budi Santoso" class="teacher-img">
                        </div>
                        <div class="teacher-info">
                            <h4 class="teacher-name">Budi Santoso</h4>
                            <p class="teacher-subject">
                                Matematika
                            </p>
                            <div class="teacher-divider"></div>
                        </div>
                    </div>
                </div>

                <!-- Teacher Card 2 -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="teacher-card">
                        <div class="teacher-img-container">
                            <img src="/api/placeholder/400/480" alt="Siti Rahayu" class="teacher-img">
                        </div>
                        <div class="teacher-info">
                            <h4 class="teacher-name">Siti Rahayu</h4>
                            <p class="teacher-subject">
                                Bahasa Inggris
                            </p>
                            <div class="teacher-divider"></div>
                        </div>
                    </div>
                </div>

                <!-- Teacher Card 3 -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="teacher-card">
                        <div class="teacher-img-container">
                            <img src="/api/placeholder/400/480" alt="Ahmad Hidayat" class="teacher-img">
                        </div>
                        <div class="teacher-info">
                            <h4 class="teacher-name">Ahmad Hidayat</h4>
                            <p class="teacher-subject">
                                Fisika
                            </p>
                            <div class="teacher-divider"></div>
                        </div>
                    </div>
                </div>

                <!-- Teacher Card 4 -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="teacher-card">
                        <div class="teacher-img-container">
                            <img src="/api/placeholder/400/480" alt="Dewi Permata" class="teacher-img">
                        </div>
                        <div class="teacher-info">
                            <h4 class="teacher-name">Dewi Permata</h4>
                            <p class="teacher-subject">
                                Kimia
                            </p>
                            <div class="teacher-divider"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
