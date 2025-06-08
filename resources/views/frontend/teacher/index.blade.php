@extends('frontend.layout.main')
@section('content')

    <!-- Teachers Section -->
    <section class="teachers-section py-5 mt-3">
        <div class="container">
            <h2 class="section-title">Guru Kami</h2>

            <div class="row g-4" id="teachers-container">
                @foreach ($teachers as $index => $teacher)
                    <div class="col-lg-3 col-md-6 col-sm-6 teacher-card {{ $index >= 4 ? 'teacher-hidden' : '' }}">
                        <div class="teacher-img-container">
                            <img src="{{ asset('storage/teachers/' . ($teacher->photo ?? 'default.jpg')) }}" alt="{{ $teacher->name }}" class="teacher-img" onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                        </div>
                        <div class="teacher-info">
                            <h4 class="teacher-name">{{ $teacher->name }}</h4>
                            <p class="teacher-subject">{{ $teacher->mapel }}</p>
                            <div class="teacher-divider"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button id="toggleBtn" class="btn btn-primary" aria-expanded="false">Show More</button>
            </div>
        </div>
    </section>


@endsection
