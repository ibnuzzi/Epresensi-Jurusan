<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/koho/template/sign-up-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:06:26 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Koho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Koho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Register</title>
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
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="../assets/images/login/3.jpg" alt="bg3">
            </div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-center" href="index.html"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/smk/Logo SMKN 2 Trenggalek.png') }}" style="width: 50%"
                                    alt="logo image"></a></div>
                        <div class="login-main">
                            <form action="{{ route('register') }}" method="POST" class="theme-form">
                                @method('POST')
                                @csrf
                                <h2>Daftar Sekarang</h2>
                                <p>Daftar untuk membuat akun baru</p>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Nama</label>
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <input
                                                class="form-control @error('name') is-invalid
                                        @enderror"
                                                type="text" name="name" placeholder="Nama">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input
                                        class="form-control @error('email') is-invalid
                                    @enderror"
                                        type="email" name="email" placeholder="Test@gmail.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control @error('password') is-invalid
                                        @enderror"
                                            type="password" name="password" placeholder="*********">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Konfirmasi Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control @error('eamil') is-invalid
                                        @enderror"
                                            type="password" name="password_confirmation"
                                            placeholder="*********">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Daftar
                                        Sekarang</button>
                                </div>
                                <p class="mt-4 mb-0 text-center">
                                    Sudah punya akun?<a class="ms-2" href="{{ route('login') }}">Login</a></p>
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
    </div>
</body>

<!-- Mirrored from admin.pixelstrap.com/koho/template/sign-up-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:06:26 GMT -->

</html>
