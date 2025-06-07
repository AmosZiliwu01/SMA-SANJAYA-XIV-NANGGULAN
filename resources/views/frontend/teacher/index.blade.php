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
                    <!-- Pengumuman 1 -->
                    <div class="pengumuman-informasi">
                        <div class="date"><span>15 Mei 2025</span></div>
                        <div class="content">
                            <strong>Pembukaan Pendaftaran Tahun Ajaran Baru 2024</strong>
                            <p style="font-size: 15px;">Pendaftaran siswa baru untuk tahun ajaran 2024 telah dibuka. Segera daftarkan putra/putri Anda untuk mendapatkan pendidikan berkualitas di SMA Sanjaya Nanggulan.</p>
                        </div>
                    </div>

                    <!-- Pengumuman 2 -->
                    <div class="pengumuman-informasi">
                        <div class="date"><span>10 Mei 2025</span></div>
                        <div class="content">
                            <strong>Jadwal Ujian Akhir Semester Genap</strong>
                            <p style="font-size: 15px;">Diumumkan kepada seluruh siswa bahwa ujian akhir semester genap akan dilaksanakan pada tanggal 1-10 Juni 2025. Persiapkan diri Anda dengan baik.</p>
                        </div>
                    </div>

                    <!-- Pengumuman 3 -->
                    <div class="pengumuman-informasi">
                        <div class="date"><span>5 Mei 2025</span></div>
                        <div class="content">
                            <strong>Pembagian Rapor Semester Genap</strong>
                            <p style="font-size: 15px;">Pembagian rapor semester genap akan dilaksanakan pada tanggal 20 Juni 2025. Harap dihadiri oleh orang tua/wali murid.</p>
                        </div>
                    </div>

                    <!-- Pengumuman 4 -->
                    <div class="pengumuman-informasi">
                        <div class="date"><span>1 Mei 2025</span></div>
                        <div class="content">
                            <strong>Libur Nasional Hari Buruh</strong>
                            <p style="font-size: 15px;">Sekolah akan libur pada tanggal 1 Mei 2025 dalam rangka memperingati Hari Buruh Internasional. Kegiatan belajar mengajar akan dilanjutkan pada tanggal 2 Mei 2025.</p>
                        </div>
                    </div>

                    <!-- Pengumuman 5 -->
                    <div class="pengumuman-informasi">
                        <div class="date"><span>28 April 2025</span></div>
                        <div class="content">
                            <strong>Pendaftaran Lomba Cerdas Cermat</strong>
                            <p style="font-size: 15px;">Pendaftaran lomba cerdas cermat tingkat kabupaten telah dibuka. Pendaftaran ditutup pada tanggal 5 Mei 2025. Segera daftarkan tim Anda!</p>
                        </div>
                    </div>
                </div>

                <!-- Agenda Tab -->
                <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                    <!-- Agenda 1 -->
                    <div class="agenda-informasi">
                        <div class="date"><span>25 Mei 2025</span></div>
                        <div class="content">
                            <strong>Upacara Bendera Khusus</strong>
                            <p style="font-size: 15px;">Upacara khusus memperingati Hari Pendidikan Nasional akan dilaksanakan di lapangan sekolah. Semua siswa wajib hadir dengan seragam lengkap.</p>
                        </div>
                    </div>

                    <!-- Agenda 2 -->
                    <div class="agenda-informasi">
                        <div class="date"><span>20 Mei 2025</span></div>
                        <div class="content">
                            <strong>Workshop Karya Tulis Ilmiah</strong>
                            <p style="font-size: 15px;">Workshop penulisan karya tulis ilmiah untuk siswa kelas XI akan dilaksanakan di ruang multimedia. Peserta diharapkan membawa laptop.</p>
                        </div>
                    </div>

                    <!-- Agenda 3 -->
                    <div class="agenda-informasi">
                        <div class="date"><span>15 Mei 2025</span></div>
                        <div class="content">
                            <strong>Kunjungan Industri</strong>
                            <p style="font-size: 15px;">Kunjungan industri ke PT. Industri Maju untuk siswa kelas XII jurusan IPA. Peserta diharapkan membawa bekal dan air minum.</p>
                        </div>
                    </div>

                    <!-- Agenda 4 -->
                    <div class="agenda-informasi">
                        <div class="date"><span>10 Januari 2025</span></div>
                        <div class="content">
                            <strong>Latihan Dasar Kepemimpinan</strong>
                            <p style="font-size: 15px;">Latihan dasar kepemimpinan untuk pengurus OSIS periode 2025-2026 akan dilaksanakan di Bumi Perkemahan Gunung Kidul.</p>
                        </div>
                    </div>

                    <!-- Agenda 5 -->
                    <div class="agenda-informasi">
                        <div class="date"><span>5 Mei 2025</span></div>
                        <div class="content">
                            <strong>Seminar Kesehatan Remaja</strong>
                            <p style="font-size: 15px;">Seminar kesehatan remaja dengan tema "Hidup Sehat di Era Digital" akan diadakan di aula sekolah. Terbuka untuk semua siswa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
