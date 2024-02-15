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
                        <form class="d-flex row align-items-center mb-3">
                            <div class="col-3">
                                <input name="name" type="text" class="form-control" placeholder="Search"
                                    value="">
                            </div>
                            <div class="col-3">
                                <select name="" id="" class="form-select">
                                    <option value="">Filter Kelas</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="ms-3">
                                <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                                    data-bs-target="#samedata-modal" style="background-color: #1B3061">
                                    Tambah
                                </button>
                            </div> --}}
                        </form>
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
                                            <td class="pt-3">{{ $student->user->name }}</td>
                                            <td class="pt-3">{{ $student->classroom->name }}</td>
                                            <td class="pt-3">{{ $student->user->email }}</td>
                                            <td class="pt-3">{{ $student->address == '' ? '-' : $student->address }}</td>
                                            <td class="pt-3">
                                                {{ $student->phone_number == '' ? '-' : $student->phone_number }}</td>
                                            <td class="pt-3 pb-2">
                                                <div class="btn btn-primary btn-md">Edit</div>
                                                <div class="btn btn-danger btn-md">Hapus</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="d-flex justify-content-center" style="min-height:19rem">
                                                    <div class="my-auto">
                                                        <img src="{{ asset('assets/images/smk/Asset 1.png') }}"
                                                            width="100%" height="200" />
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
