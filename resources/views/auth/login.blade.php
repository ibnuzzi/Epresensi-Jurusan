<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/koho/template/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:06:25 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Koho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Koho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/smk/rpl.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/smk/rpl.png') }}" type="image/x-icon">
    <title>Login</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css
" rel="stylesheet">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="../assets/images/login/2.jpg" alt="bg2">
            </div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" style="width: 70%"
                                    src="{{ asset('assets/images/smk/Logo SMKN 2 Trenggalek.png') }}"
                                    alt="logo Image"></a></div>
                        <div class="login-main">
                            <form method="POST" action="{{ route('login') }}" class="theme-form">
                                @csrf
                                <h2 class="text-center">E-Presensi</h2>
                                <p class="text-center">Masukkan email & kata sandi Anda untuk login</p>
                                <div class="form-group">
                                    <label for="email" class="form-label"
                                        style="font-weight: bold">{{ __('Email') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Masukan Email" value="{{ old('email') }}" autocomplete="email"
                                        autofocus style="border-radius: 8px">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label"
                                        style="font-weight: bold">{{ __('Password') }}</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password" placeholder="Masukan Password"
                                        aria-label="Password" aria-describedby="password-addon">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Log in
                                        </button>
                                    </div>
                                </div>
                                <p class="mt-4 mb-0 text-center">Belum Punya Akun?<a class="ms-2"
                                        href="{{ route('register') }}">Register</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- Sidebar jquery-->
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <!-- Theme js-->
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
    </div>
</body>

<!-- Mirrored from admin.pixelstrap.com/koho/template/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:06:25 GMT -->

</html>
