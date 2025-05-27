@extends('backend.layout.auth')
@section('content')

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('assets/img/logo-sekolah.png')}}" alt="Logo Sekolah" class="img-fluid mt-3 mb-4" style="max-width: 150px; height: 100px;">
                                    </div>
                                    <h4 class="font-weight-bolder">Forgot Password</h4>
                                    <p class="mb-0">Enter your email to reset your password</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('send.reset.link') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Reset Password</button>
                                        </div>
                                        <div class="text-center">
                                            <p class="mt-3 mb-1">
                                                <a href="{{ route('auth.login') }}" class="text-primary"><i class="fas fa-chevron-left"></i> Back to Sign In</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('{{ asset('assets/img/hello.jpg') }}');
                                background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
