@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Izin/Sakit</h3>
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
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h3>Form Izin</h3><span>Untuk izin atau sakit anda bisa memilih sesuai status dan upload file
                                bukti</span>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" action="{{ route('permissions-store', auth()->user()->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">Email address</label>
                                        <select name="status" id="" class="form-select">
                                            <option value="permission">Izin</option>
                                            <option value="sick">Sakit</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label pt-0" for="exampleInputPassword1">Butki Foto</label>
                                        <input class="form-control" name="file" id="exampleInputPassword1"
                                            type="file">
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary" data-bs-original-title=""
                                title="">Kirim</button>
                            <button class="btn btn-danger" data-bs-original-title="" title="">Batal</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
