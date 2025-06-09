@extends('frontend.layout.main')
@section('content')

    <section class="about-section">
        <div class="background-container">
            <img src="{{ $aboutSchool && $aboutSchool->background_image ? asset('storage/about-schools/' . $aboutSchool->background_image) : asset('assets/img/about.png') }}"
                 alt="SMA Sanjaya XIV Nanggulan"
                 class="background-image img-fluid"
                 onerror="this.src='{{ asset('assets/img/about.png') }}'">
            <div class="overlay"></div>
            <div class="content" style="text-align: left;">
                <h1 class="title">
                    {{ $aboutSchool ? $aboutSchool->title : 'SELAMAT DATANG DI SMA SANJAYA XIV NANGGULAN' }}
                </h1>
                <div class="description">
                    @if($aboutSchool)
                        {!! nl2br(e($aboutSchool->description)) !!}
                    @else
                        Di era digital saat ini, website sekolah merupakan pintu gerbang informasi terdepan sebagai sarana untuk menyebarkan berbagai publikasi terkait kemajuan pendidikan dan pencapaian SMA Sanjaya XIV Nanggulan terkini.<br><br>
                        Sebagai media pembelajaran, website sekolah juga diarahkan dapat mendatangkan kemanfaatan sebagai sarana pembelajaran dengan memuat blog, e-learning, karya, dan media pembelajaran yang dibuat oleh pendidik serta para siswa.<br><br>
                        Di sisi lain kami sungguh berharap Website ini juga dapat menjadi sarana silaturahmi dan komunikasi antara sekolah dengan para alumni di berbagai tempat, sebagai sebuah keluarga besar yang solid serta dapat berkontribusi dalam memajukan pendidikan di SMA Sanjaya XIV Nanggulan tercinta.<br><br>
                        Kami menyadari website SMA Sanjaya XIV Nanggulan ini masih memiliki banyak kekurangan, oleh karena itu, kami akan terus belajar dan meng-update diri, sehingga konten dan kualitas tampilan website sekolah ini akan semakin berkembang. Kritik, saran dan masukan dari berbagai stakeholder sekolah tentu sangat kami harapkan.<br><br>
                        Kepada tim pengembang dan pengelola, kami berharap agar dapat terus menyempurnakannya dengan penuh semangat. Terima kasih atas kerjasamanya, mari terus berkarya menuju SMA Sanjaya XIV Nanggulan yang lebih berkualitas dan berjaya dalam mencerdaskan kehidupan anak bangsa Indonesia.<br><br>
                        Kiranya Tuhan Yang Maha Esa senantiasa melindungi dan memberkati setiap pelayanan mulia kita di bidang pendidikan ini.
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Section Testimoni Alumni -->
    <section class="testimonial-section">
        <h2 class="testimonial-heading">Testimoni Alumni</h2>

        @if($testimonials && $testimonials->count() > 0)
            <div class="testimonial-carousel">
                <div class="testimonial-container">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-card">
                            <p class="testimonial-text">"{{ $testimonial->message }}"</p>
                            <img src="{{ $testimonial->photo ? asset('storage/testimonials/' . $testimonial->photo) : 'https://placehold.co/400' }}"
                                 alt="{{ $testimonial->name }}"
                                 class="alumni-img img-fluid"
                                 onerror="this.src='https://placehold.co/400'">
                            <p class="alumni-name">{{ $testimonial->name }}</p>
                            <p class="alumni-year">Lulusan {{ $testimonial->graduation_year }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pagination" id="pagination">
                <!-- Pagination dots will be added here by JavaScript -->
            </div>
        @else
            <div class="testimonial-carousel">
                <div class="testimonial-container">
                    <!-- Default testimonials jika tidak ada data dari database -->
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Sekolah ini memberikan bekal yang solid untuk perjalanan karier saya. Guru-gurunya sangat mendukung pengembangan bakat."</p>
                        <img src="https://placehold.co/400" alt="Alumni" class="alumni-img img-fluid">
                        <p class="alumni-name">Anisa Rahma</p>
                        <p class="alumni-year">Lulusan 2019</p>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Pengalaman belajar di sini sangat berharga. Saya merasa siap menghadapi tantangan di dunia nyata."</p>
                        <img src="https://placehold.co/400" alt="Alumni" class="alumni-img img-fluid">
                        <p class="alumni-name">Budi Santoso</p>
                        <p class="alumni-year">Lulusan 2018</p>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Berkat pembinaan di SMA Sanjaya, saya diterima di perguruan tinggi favorit. Terima kasih atas semua bimbingannya."</p>
                        <img src="https://placehold.co/400" alt="Alumni" class="alumni-img img-fluid">
                        <p class="alumni-name">Citra Dewi</p>
                        <p class="alumni-year">Lulusan 2020</p>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-text">"SMA Sanjaya tidak hanya fokus pada akademik tetapi juga mengembangkan karakter. Hal ini sangat membantu saya di dunia kerja."</p>
                        <img src="https://placehold.co/400" alt="Alumni" class="alumni-img img-fluid">
                        <p class="alumni-name">Dimas Prayogo</p>
                        <p class="alumni-year">Lulusan 2017</p>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Para guru selalu memberikan motivasi dan inspirasi. Mereka bukan hanya mengajar tetapi juga menjadi mentor kehidupan."</p>
                        <img src="https://placehold.co/400" alt="Alumni" class="alumni-img img-fluid">
                        <p class="alumni-name">Elsa Putri</p>
                        <p class="alumni-year">Lulusan 2021</p>
                    </div>
                </div>
            </div>

            <div class="pagination" id="pagination">
                <!-- Pagination dots will be added here by JavaScript -->
            </div>
        @endif
    </section>
@endsection
