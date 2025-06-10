@extends('backend.layout.main')
@section('title', 'FAQ & Bantuan')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- Sidebar Kiri: Quick Actions --}}
            <div class="col-lg-4 col-md-5">
                {{-- Kartu Bantuan Cepat --}}
                <div class="card shadow-sm border-0 mb-4 sticky-top" style="top: 1rem;">
                    <div class="card-header bg-primary text-white">
                        <h6 class="fw-semibold mb-0">
                            <i class="bi bi-headset me-2"></i> Bantuan & Informasi
                        </h6>
                    </div>
                    <div class="card-body text-center py-4">
                        {{-- Manual Book Download --}}
                        <div class="mb-4">
                            <i class="bi bi-file-earmark-pdf text-danger mb-2" style="font-size: 3rem;"></i>
                            <h6 class="mb-2">Manual Book</h6>
                            <p class="text-muted small mb-3">Panduan lengkap penggunaan sistem website sekolah</p>
                            <a href="{{ asset('assets/manual/manual-book-sekolah.pdf') }}"
                               class="btn btn-outline-danger btn-sm w-100"
                               download="Manual-Book-Sistem-Sekolah.pdf">
                                <i class="bi bi-download me-1"></i> Download Manual
                            </a>
                        </div>

                        <hr class="my-4">

                        {{-- Kontak untuk Pertanyaan --}}
                        <div class="mb-3">
                            <i class="bi bi-chat-dots text-info mb-2" style="font-size: 3rem;"></i>
                            <h6 class="mb-2">Butuh Bantuan?</h6>
                            <p class="text-muted small mb-3">Hubungi administrator sekolah atau tim IT untuk bantuan penggunaan sistem</p>
                        </div>

                        {{-- Status Informasi --}}
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <small class="text-muted">Support:</small>
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Tersedia
                                </span>
                            </div>
                            <small class="text-muted d-block mt-1">Melalui admin sekolah</small>
                        </div>
                    </div>
                </div>

                {{-- Informasi Penting --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-badge text-primary me-3"></i>
                            <div>
                                <small class="text-muted d-block">Bantuan Sistem</small>
                                <span class="fw-medium">Admin Sekolah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock text-primary me-3"></i>
                            <div>
                                <small class="text-muted d-block">Jam Operasional</small>
                                <span class="fw-medium">Sesuai jam sekolah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Konten Kanan: FAQ --}}
            <div class="col-lg-8 col-md-7">
                {{-- Header FAQ --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-question-circle text-primary mb-3" style="font-size: 3rem;"></i>
                        <h4 class="mb-2">Frequently Asked Questions</h4>
                        <p class="text-muted">Temukan jawaban untuk pertanyaan yang sering ditanyakan seputar penggunaan sistem website sekolah</p>
                    </div>
                </div>

                {{-- FAQ Accordion --}}
                <div class="accordion" id="faqAccordion">
                    {{-- FAQ 1: Role Administrator vs Author --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                <i class="bi bi-person-plus me-2 text-primary"></i>
                                Apa perbedaan role Administrator dan Author?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Administrator:</strong></p>
                                <ul>
                                    <li>Akses penuh ke seluruh fitur sistem</li>
                                    <li>Dapat mengelola pengguna dan mengatur role</li>
                                    <li>Mengelola data master (Data Guru, Data Siswa, Class)</li>
                                    <li>Akses ke Manajemen Sekolah dan Message</li>
                                </ul>
                                <p><strong>Author:</strong></p>
                                <ul>
                                    <li>Fokus pada pengelolaan konten website</li>
                                    <li>Dapat mengelola Berita, Agenda, Pengumuman</li>
                                    <li>Akses ke Gallery dan File management</li>
                                    <li>Dashboard yang disesuaikan dengan kebutuhan konten</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 2: Reset Password --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                <i class="bi bi-key me-2 text-warning"></i>
                                Lupa password sistem, bagaimana cara reset?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Untuk reset password sistem:</p>
                                <ol>
                                    <li>Hubungi administrator sekolah untuk reset manual</li>
                                    <li>Administrator akan memberikan password baru</li>
                                    <li>Login dan segera ubah password (min. 8 karakter)</li>
                                    <li>Simpan password baru dengan aman</li>
                                </ol>
                                <div class="alert alert-info mt-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Hubungi administrator sekolah atau tim IT untuk bantuan reset password.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 3: Mengelola Berita --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                <i class="bi bi-newspaper me-2 text-success"></i>
                                Bagaimana cara mengelola berita dan pengumuman?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Mengelola Berita:</strong></p>
                                <ol>
                                    <li>Masuk ke menu "List Berita" untuk melihat semua berita</li>
                                    <li>Gunakan "Post Berita" untuk membuat berita baru</li>
                                    <li>Kelola "Kategori" untuk mengorganisir berita</li>
                                    <li>Berita dapat diedit, dan dihapus</li>
                                </ol>
                                <p><strong>Mengelola Pengumuman:</strong></p>
                                <ol>
                                    <li>Akses menu "Pengumuman"</li>
                                    <li>Buat pengumuman baru</li>
                                    <li>Pengumuman dapat diedit, dan dihapus</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 4: Gallery dan File --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                <i class="bi bi-images me-2 text-info"></i>
                                Bagaimana cara mengelola Gallery dan File?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Mengelola Gallery:</strong></p>
                                <ol>
                                    <li>Masuk ke menu "Gallery"</li>
                                    <li>Upload foto dengan format JPG/PNG</li>
                                    <li>Tambahkan Title</li>
                                    <li>Foto dapat diedit, dan dihapus</li>
                                </ol>
                                <p><strong>Mengelola File:</strong></p>
                                <ol>
                                    <li>Akses menu "File"</li>
                                    <li>Upload dokumen (PDF, DOC, XLS maksimal 10MB)</li>
                                    <li>Tambahkan Title dan deskripsi</li>
                                    <li>File dapat diedit, dan dihapus</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 5: Informasi Sekolah --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                <i class="bi bi-building me-2 text-primary"></i>
                                Bagaimana cara mengatur informasi sekolah di website?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Untuk mengatur informasi sekolah:</p>
                                <ol>
                                    <li>Masuk ke menu "Manajemen Sekolah" (khusus Administrator)</li>
                                    <li>Upload foto Kepala Sekolah (format JPG/PNG, max 2MB)</li>
                                    <li>Tulis kata sambutan dari Kepala Sekolah</li>
                                    <li>Lengkapi informasi "About Sekolah"</li>
                                    <li>Simpan perubahan untuk update website</li>
                                </ol>
                                <div class="alert alert-success mt-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Perubahan akan langsung terlihat di halaman utama website.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 6: Data Guru dan Siswa --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                <i class="bi bi-people me-2 text-warning"></i>
                                Bagaimana cara mengelola Data Guru dan Siswa?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Mengelola Data Guru:</strong></p>
                                <ol>
                                    <li>Akses menu "Data Guru" (khusus Administrator)</li>
                                    <li>Tambah data guru baru dengan lengkap</li>
                                    <li>Upload foto profil guru</li>
                                    <li>Atur mata pelajaran yang diampu</li>
                                    <li>Export data dalam format Excel jika diperlukan</li>
                                </ol>
                                <p><strong>Mengelola Data Siswa:</strong></p>
                                <ol>
                                    <li>Masuk ke menu "Data Siswa"</li>
                                    <li>Input data siswa per angkatan</li>
                                    <li>Kelompokkan dalam "Class"</li>
                                    <li>Export data dalam format Excel jika diperlukan</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 7: Keamanan Data --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                <i class="bi bi-shield-exclamation me-2 text-warning"></i>
                                Bagaimana keamanan data di sistem ini?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Keamanan data sistem website sekolah:</p>
                                <ul>
                                    <li><strong>Akses Terbatas:</strong> Sistem role-based (Administrator & Author)</li>
                                    <li><strong>Enkripsi Password:</strong> Password dienkripsi dengan algoritma aman</li>
                                    <li><strong>Input Validation:</strong> Semua input data divalidasi</li>
                                    <li><strong>Hosting Terpercaya:</strong> Server dikelola pihak hosting profesional</li>
                                </ul>
                                <div class="alert alert-info mt-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Untuk informasi backup dan keamanan server, hubungi administrator sekolah.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 8: Troubleshooting --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                <i class="bi bi-exclamation-triangle me-2 text-danger"></i>
                                Sistem tidak bisa diakses, apa yang harus dilakukan?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Jika sistem website sekolah tidak bisa diakses:</p>
                                <ol>
                                    <li><strong>Cek Koneksi:</strong> Pastikan internet stabil</li>
                                    <li><strong>Refresh Browser:</strong> Tekan Ctrl+F5 atau Cmd+R</li>
                                    <li><strong>Clear Cache:</strong> Hapus cache dan cookies browser</li>
                                    <li><strong>Coba Browser Lain:</strong> Gunakan Chrome, Firefox, atau Edge</li>
                                </ol>

                                <div class="alert alert-warning mt-3">
                                    <h6 class="alert-heading">
                                        <i class="bi bi-exclamation-triangle me-2"></i>Masalah Server/Hosting?
                                    </h6>
                                    <p class="mb-2">Jika langkah di atas tidak berhasil, kemungkinan ada masalah server/hosting.</p>
                                    <p class="mb-1"><strong>Hubungi:</strong></p>
                                    <ul class="mb-0">
                                        <li>Administrator sekolah</li>
                                        <li>Pihak hosting yang mengelola server</li>
                                    </ul>
                                </div>

                                <div class="alert alert-info mt-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Konsultasikan dengan administrator sekolah atau tim IT untuk bantuan lebih lanjut.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 9: Message dan Testimonial --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                                <i class="bi bi-chat-dots me-2 text-success"></i>
                                Bagaimana cara mengelola Message dan Testimonial?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Mengelola Message:</strong></p>
                                <ol>
                                    <li>Akses menu "Message" (khusus Administrator)</li>
                                    <li>Lihat pesan masuk dari form kontak website</li>
                                    <li>Balas atau tandai pesan sebagai sudah dibaca</li>
                                    <li>Hapus pesan yang tidak relevan</li>
                                </ol>
                                <p><strong>Mengelola Testimonial:</strong></p>
                                <ol>
                                    <li>Masuk ke menu "Testimonial"</li>
                                    <li>Input testimonial dari siswa/orang tua/alumni</li>
                                    <li>Upload foto dan atur status tampil</li>
                                    <li>Testimonial akan muncul di halaman utama website</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 10: Batasan Support --}}
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq10" aria-expanded="false" aria-controls="faq10">
                                <i class="bi bi-info-circle me-2 text-primary"></i>
                                Sistem support dan bantuan penggunaan
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-success">
                                            <i class="bi bi-check-circle me-2"></i>Bantuan Tersedia:
                                        </h6>
                                        <ul>
                                            <li>Panduan penggunaan fitur sistem</li>
                                            <li>Manual book download</li>
                                            <li>Tutorial penggunaan menu</li>
                                            <li>FAQ sistem</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-info">
                                            <i class="bi bi-person-badge me-2"></i>Kontak Bantuan:
                                        </h6>
                                        <ul>
                                            <li>Administrator sekolah</li>
                                            <li>Tim IT sekolah</li>
                                            <li>Penanggung jawab sistem</li>
                                            <li>Operator sekolah</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="alert alert-primary mt-3">
                                    <h6 class="alert-heading">
                                        <i class="bi bi-info-circle me-2"></i>Catatan Penting
                                    </h6>
                                    <p class="mb-0">Untuk bantuan penggunaan sistem, troubleshooting, atau pertanyaan teknis, silakan hubungi administrator sekolah atau tim IT yang bertanggung jawab mengelola sistem website sekolah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tidak Menemukan Jawaban --}}
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-question-circle-fill text-muted mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="mb-2">Masih ada pertanyaan tentang penggunaan sistem?</h5>
                        <p class="text-muted mb-4">Silakan hubungi administrator sekolah atau tim IT untuk bantuan lebih lanjut</p>
                        <div class="row g-2 justify-content-center">
                            <div class="col-sm-6">
                                <a href="https://publuu.com/flip-book/4001/1970795/page/1?cover" class="show-publuu-viewer" style="width: auto; height: 240px; position: relative; display: inline-block;">
                                    <img src="https://p6aqvvqp5i.execute-api.us-east-2.amazonaws.com/images/cover/4001/1970795" style="height: 100%;"></a>
                                <script src="https://publuu.com/account/js/embed-viewer.js"></script>
                            </div>
                        </div>
                        <div class="alert alert-light mt-4 text-start">
                            <h6 class="alert-heading">
                                <i class="bi bi-headset me-2 text-primary"></i>Untuk Bantuan Sistem:
                            </h6>
                            <p class="mb-1">Jika memerlukan bantuan penggunaan sistem atau mengalami kendala teknis, silakan hubungi:</p>
                            <ul class="mb-0">
                                <li><strong>Administrator Sekolah</strong> - pengelola utama sistem</li>
                                <li><strong>Tim IT Sekolah</strong> - support teknis</li>
                                <li><strong>Operator Sekolah</strong> - bantuan operasional</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
