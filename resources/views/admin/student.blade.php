@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Daftar Siswa</h3>
                </div>
                <div class="col-6">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <form class=" col-lg-3">
                                <div class="input-group">
                                    <input name="name" type="text" class="form-control" placeholder="Search"
                                        value="">
                                    <div class="input-group-append">
                                        <button class="btn text-white"
                                            style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                            <i data-feather="search" height="20" width="20" class="mt-2" style=""></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="">
                                <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                                    data-bs-target="#samedata-modal" style="background-color: #1B3061">
                                    Tambah
                                </button>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                    <tr>
                                        <th class="pt-3" scope="row">{{ $loop->iteration }}</th>
                                        <td class="pt-3">Mark Jecno </td>
                                        <td class="pt-3">22/08/2022 </td>
                                        <td class="pt-3">On leave </td>
                                        <td class="pt-3">0</td>
                                        <td class="pt-3">29/30</td>
                                        <td class="pt-3">29/30</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="d-flex justify-content-center" style="min-height:19rem">
                                                <div class="my-auto">
                                                    <img src="{{ asset('assets/images/smk/Asset 1.png') }}" width="100%" height="200" />
                                                    <h4 class="text-center mt-4">Data Siswa Kosong!!</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
