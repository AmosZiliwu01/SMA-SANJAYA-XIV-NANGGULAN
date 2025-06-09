@extends('frontend.layout.main')
@section('content')

    <section class="py-5 mt-5 mb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 shadow rounded p-4">
                    <div class="row">
                        <!-- Kolom Kontak Kiri -->
                        <div class="col-md-6 mb-4">
                            <h5 class="fw-bold">Hubungi Kami</h5>
                            <p>Silakan isi formulir berikut atau hubungi kami langsung melalui informasi kontak di samping.</p>
                            <p>
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                <strong>Alamat</strong><br>
                                Jati Sarono, Kec. Nanggulan,<br>
                                Kab. Kulon Progo, DIY.
                            </p>
                            <p>
                                <i class="bi bi-telephone-fill text-danger me-2"></i>
                                <strong>Telp</strong><br>
                                085221221215
                            </p>
                            <p>
                                <i class="bi bi-envelope-fill text-danger me-2"></i>
                                <strong>Email</strong><br>
                                sma_sanjaya14@yahoo.com
                            </p>
                        </div>

                        <!-- Kolom Formulir Kanan -->
                        <div class="col-md-6">

                            <form action="{{ route('fe-contact.store') }}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="p-3 rounded" style="background-color: #073b87;">
                                    <h6 class="text-white fw-bold mb-3">Tinggalkan Pesan</h6>
                                    <input type="text" class="form-control mb-2 rounded-3" placeholder="Name" name="name" required>
                                    <input type="email" class="form-control mb-2 rounded-3" placeholder="Email" name="email" required>
                                    <input type="text" class="form-control mb-2 rounded-3" placeholder="Phone" name="phone">
                                    <textarea class="form-control mb-2 rounded-3" rows="4" placeholder="Message" name="message" required></textarea>
                                </div>

                                <!-- Tombol Submit di luar card biru -->
                                <div class="mt-3">
                                    <button type="submit" class="btn text-white px-4 py-1 rounded-3" style="background-color: #073b87; font-size: 14px;">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- End Kolom Formulir -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
