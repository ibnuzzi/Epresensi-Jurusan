@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid default-page">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="card profile-greeting">
                    <div class="card-body">
                        <div>
                            <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
                            <p> You have completed 40% of your this week! Start a new goal &amp; improve your result</p><a
                                class="btn" href="user-profile.html">Continue<svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg></a>
                        </div>
                        <div class="greeting-img"><img class="img-fluid"
                                src="../assets/images/dashboard/profile-greeting/bg.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
