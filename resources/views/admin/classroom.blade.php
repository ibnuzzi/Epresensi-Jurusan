@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Daftar Kelas</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-md btn-primary">+ Tambah
                        </div>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($classrooms as $classroom)
                                        <tr>
                                            <th class="pt-3" scope="row">{{ $loop->iteration }}</th>
                                            <td class="pt-3">{{ $classroom->name }}</td>
                                            <td class="pt-2">
                                                <button class="btn btn-edit btn-sm btn-warning"
                                                    data-id="{{ $classroom->id }}" id="btn-edit-{{ $classroom->id }}"
                                                    data-name="{{ $classroom->name }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-delete btn-sm btn-danger"
                                                    data-id="{{ $classroom->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <div class="d-flex justify-content-center" style="min-height:19rem">
                                                    <div class="my-auto">
                                                        <img src="{{ asset('assets/images/smk/Asset 1.png') }}"
                                                            width="100%" height="200" />
                                                        <h4 class="text-center mt-4">Data Kelas Kosong!!</h4>
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
    <x-delete-modal />
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <form action="{{ route('classroom.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3 class="modal-title" id="exampleModalLabel">Tambah Kelas</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="formFile" class="form-label">Tambah Kelas</label>
                                <input type="text" value="{{ old('name') }}" placeholder="XII RPL B"
                                    class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary text-white">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <form id="form-update" method="post">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Kelas</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="formFile" class="form-label">Kelas</label>
                                <input type="text" value="{{ old('name') }}" placeholder="XII RPL B"
                                    class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary text-white">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `classroom/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', actionUrl);
            $('#modal-update').modal('show')
        })
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `classroom/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection
