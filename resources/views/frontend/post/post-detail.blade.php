@extends('frontend.layout.main')
@section('content')

    <!-- News Detail Section -->
    <section class="news-detail-section">
        <div class="container">
            <div class="row">
                <!-- Main Content Column (Left side) -->
                <div class="col-lg-8">
                    <!-- News Header -->
                    <div class="news-header mb-4">
                        <h1 class="news-title-detail">Judul Berita</h1>
                        <div class="news-meta">
                            <div class="news-date me-4">
                                <span>16 - 05 - 2025</span>
                            </div>
                            <div class="news-author me-3">
                                <i class="fas fa-user me-1"></i>
                                <span>Admin</span>
                            </div>
                            <div class="news-category-detail">
                                <i class="fas fa-tag me-1"></i>
                                <span>Pendidikan</span>
                            </div>
                        </div>
                    </div>

                    <!-- News Featured Image -->
                    <div class="news-featured-image">
                        <img src="slider-1.jpg" alt="Breaking News" class="img-fluid">
                    </div>

                    <!-- News Content -->
                    <div class="news-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3>Komentar</h3>
                            <button class="btn btn-sm btn-google text-white toggle-comment-form">
                                <i class="fas fa-comment-dots fa-lg text-white me-2"></i>
                                <span class="toggle-text">Tinggalkan Komentar</span>
                            </button>
                        </div>
                        <div class="divider"></div>

                        <!-- Comment Form (Hidden by default) -->
                        <div class="comment-form-container" style="display: none;">
                            <h4 class="comment-title">Tinggalkan Komentar</h4>
                            <div class="divider"></div>
                            <div class="comment-form">
                                <form>
                                    <input type="text" placeholder="Nama Lengkap" required>
                                    <input type="email" placeholder="Email" required>
                                    <textarea rows="5" placeholder="Komentar....." required></textarea>
                                    <button type="submit">Kirim Komentar</button>
                                </form>
                            </div>
                        </div>

                        <!-- Comment Items Container -->
                        <div class="comment-items-container">
                            <!-- Comment Item -->
                            <div class="comment-item mb-4">
                                <div class="d-flex align-items-start">
                                    <img src="user-avatar.jpeg" alt="User Avatar" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <div>
                                        <h5 class="comment-author">Nama Pengomentar</h5>
                                        <span class="comment-date text-muted">16 Mei 2025, 10:30</span>
                                        <p class="comment-content">Ini adalah isi dari komentar yang diberikan oleh pengomentar. Komentar ini bisa berisi pendapat, saran, atau tanggapan terhadap berita.</p>
                                    </div>
                                </div>

                                <!-- Balasan Admin -->
                                <div class="admin-reply mt-3">
                                    <h6>Balasan Admin:</h6>
                                    <p>Terima kasih atas komentarnya!</p>
                                </div>
                            </div>

                            <!-- Comment Item -->
                            <div class="comment-item mb-4">
                                <div class="d-flex align-items-start">
                                    <img src="user-avatar.jpeg" alt="User Avatar" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <div>
                                        <h5 class="comment-author">Nama Pengomentar 2</h5>
                                        <span class="comment-date text-muted">16 Mei 2025, 11:00</span>
                                        <p class="comment-content">Komentar kedua ini juga berisi pendapat atau tanggapan terhadap berita yang sama.</p>
                                    </div>
                                </div>

                                <!-- Balasan Admin -->
                                <div class="admin-reply mt-3">
                                    <h6>Balasan Admin:</h6>
                                    <p>Balasan untuk komentar kedua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column (Right side) -->
                <div class="col-lg-4">
                    <!-- First Row: Social Share -->
                    <div class="sidebar-section social-share">
                        <div class="share-text">
                            <h5>Bagikan Ke :</h5>
                        </div>
                        <div class="row social-buttons">
                            <div class="col-6 mb-2"> <!-- Kolom 1 -->
                                <a href="#" class="btn btn-twitter d-block">
                                    <i class="fab fa-twitter me-2"></i>
                                    <span>Twitter</span>
                                </a>
                            </div>
                            <div class="col-6 mb-2"> <!-- Kolom 2 -->
                                <a href="#" class="btn btn-facebook d-block">
                                    <i class="fab fa-facebook-f me-2"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="col-6 mb-2"> <!-- Kolom 1 -->
                                <a href="#" class="btn btn-linkedin d-block">
                                    <i class="fab fa-linkedin-in me-2"></i>
                                    <span>LinkedIn</span>
                                </a>
                            </div>
                            <div class="col-6 mb-2"> <!-- Kolom 2 -->
                                <a href="#" class="btn btn-pinterest d-block">
                                    <i class="fab fa-pinterest-p me-2"></i>
                                    <span>Pinterest</span>
                                </a>
                            </div>
                            <div class="col-6 mb-2"> <!-- Kolom 1 -->
                                <a href="#" class="btn btn-google d-block">
                                    <i class="fab fa-google me-2"></i>
                                    <span>Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
