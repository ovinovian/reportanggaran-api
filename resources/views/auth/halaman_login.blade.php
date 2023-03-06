<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/users/16.png')}}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

</head>

<body class="loading authentication-bg"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-white">
                            <a href="#">
                                <span><img src="{{ ('assets/logo/babel.svg') }}" alt="" style="width: 100px"></span>
                            </a>
                        </div>

                        <div class="card-body p-2">
                            @if(Session::has('sukses'))
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ Session::get('sukses')}}</strong>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Session::has('failled'))
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ Session::get('failled')}}</strong>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Masuk</h4>
                                <p class="text-muted mb-4">Masukkan Email dan Password Anda
                                </p>
                            </div>

                            <form method="POST" action="{{ route('verifikasi.login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address')
                                        }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{
                                        __('Password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Masuk </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum punya akun? <a href="{{ route('register.user') }}"
                                    class="text-muted ms-1"><b>Daftar</b></a></p>
                            <p class="text-muted"><a href="{{ url('/') }}" class="text-muted ms-1"><b>Kembali ke Halaman
                                        Muka</b></a>
                            </p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert.init.js')}}"></script>

    <script>
        @if ($message = Session::get('berhasil'))
            swal(
                "Selamat",
                "{{ $message }}",
                "success"
            )
        @endif
        @if ($message = Session::get('gagal_login'))
            swal(
                "Perhatian !!",
                "{{ $message }}",
                "warning"
            )
        @endif
    </script>

</body>

</html>