@extends('frontend.layout.main')
@section('content')

    <!-- Informasi Section with Tabs -->
    <section class="informasi-wrapper py-5 mt-3">
        <div class="container">
            <!-- Judul Dinamis -->
            <div class="d-flex align-items-center mb-4">
                <h2 class="section-title-information me-auto" id="dynamic-title">Pengumuman</h2>

                <!-- Tab Navigation (Text-based) -->
                <div class="nav nav-tabs" id="infoTabs" role="tablist">
                    <span class="nav-link-informasi active me-3" id="pengumuman-tab" data-bs-target="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="true">Pengumuman</span>
                    <span class="nav-link-informasi" id="agenda-tab" data-bs-target="#agenda" role="tab" aria-controls="agenda" aria-selected="false">Agenda</span>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="infoTabsContent">
                <!-- Pengumuman Tab -->
                <div class="tab-pane fade show active" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
                    <div class="pengumuman-list">
                        @foreach($announcements as $announcement)
                            <div class="pengumuman-informasi">
                                <div class="date">
                                    <span>{{ \Carbon\Carbon::parse($announcement->created_at)->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="content-informasi">
                                    <strong style="display: inline-block; margin-bottom: 10px; font-size: 20px">{{ $announcement->title }}</strong>
                                    <p style="font-size: 15px;">{{ Str::limit($announcement->content, 150, '...') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Agenda Tab -->
                <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                    @foreach($agendas as $agenda)
                        <div class="agenda-informasi">
                            <div class="date">
                                <span>{{ \Carbon\Carbon::parse($agenda->start_date)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="content-informasi">
                                <strong style="display: inline-block; margin-bottom: 10px; font-size: 20px">{{ $agenda->name }}</strong>
                                <p style="font-size: 15px;">{{ Str::limit($agenda->description, 150, '...') }}</p>
                                <small><em>{{ \Carbon\Carbon::parse($agenda->start_date)->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse($agenda->end_date)->format('d/m/Y') }}</em></small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection
