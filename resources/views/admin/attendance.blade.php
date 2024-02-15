@extends('layouts.app')
@section('content')
    <style>
        img {
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }
    </style>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Daftar Kehadiran Siswa</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="position-relative mb-3 col-lg-3">
                <input type="text" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select classroom" id="classroom">
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <input type="date" class="form-control date" value="" id="date">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="width:20%;">Foto</th>
                                        <th scope="col">File Izin</th>
                                    </tr>
                                </thead>
                                <tbody id="data">

                                </tbody>
                            </table>
                            <div id="loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-show-file" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        File Izin Siswa
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="" class="show-file" alt="" width="100%" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white font-medium" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            get();

            var tanggalSaatIni = new Date();
            var tahun = tanggalSaatIni.getFullYear();
            var bulan = (tanggalSaatIni.getMonth() + 1).toString().padStart(2, '0');
            var hari = tanggalSaatIni.getDate().toString().padStart(2, '0');

            var today = tahun + '-' + bulan + '-' + hari;

            $('input[type="date"]').val(today);

            let debounceTimer;

            $('#search-name').keyup(function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function() {
                    get();
                }, 500);
            });

            $('#classroom').change(function() {
                get();
            });

            $('#date').change(function() {
                get();
            });

            function get() {
                $.ajax({
                    url: '{{ route('attendance.index') }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        name: $('#search-name').val(),
                        classroom: $('#classroom option:selected').text(),
                        date: $('#date').val(),
                    },
                    beforeSend: function() {
                        $('#data').html('');
                        $('#loading').html(showLoading());
                    },
                    success: function(response) {
                        if (response.data.length > 0) {
                            $('#loading').html('');

                            $.each(response.data, function(index, data) {
                                $('#data').append(studentRow(index + 1, data));
                            });

                            $('.btn-show-file').click(function() {
                                const id = $(this).data('id');
                                const student = response.data.find(item => item.id === id);
                                const imageUrl = student.file;

                                $('.show-file').attr('src', imageUrl);
                                $('#modal-show-file').modal('show');
                            });
                        } else {
                            $('#loading').html(showNoData(
                                'Belum ada siswa yang absen'));
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                }).done(function(response) {
                    if (response.data.length === 0 && $('#search-name').val() !== '') {
                        $('#loading').html(showNoData('Siswa tidak ada'));
                    }
                });
            }

            function studentRow(index, student) {
                return `<tr>
                <th class="py-3">${index}</th>
                <td class="py-3">${student.name}</td>
                <td class="py-3">${student.check_in == null ? 'Tidak absen' : student.check_in}</td>
                <td class="py-3">${student.check_out == null ? 'Tidak absen' : student.check_out}</td>
                <td class="py-3">
                    <span class="fs-6 fw-semibold fs-6 badge font-medium
                        ${student.status == 'present' ? 'bg-light-success text-success' :
                            student.status == 'permission' ? 'bg-light-warning text-warning' :
                            student.status == 'sick' ? 'bg-light-info text-info' :
                            student.status == 'alpha' ? 'bg-light-danger text-danger' :
                            student.status == 'late' ? 'bg-light-danger text-danger' : '' }">
                        ${student.status == 'present' ? 'Masuk' :
                            student.status == 'permission' ? 'Izin' :
                            student.status == 'sick' ? 'Sakit' :
                            student.status == 'alpha' ? 'Alfa' :
                            student.status == 'late' ? 'Terlambat' : ''}
                    </span>
                </td>
                <td class="py-2">
                    ${student.status === 'alpha' || student.status === 'permission' || student.status === 'alpha' ? '-' : `<img style="width:100%;" src="${student.photo}" alt="Foto ${student.name}">`}
                </td>
                <td class="py-2">
                    ${student.status === 'alpha' ? `
                                                                                                                                                                                            <button type="button" class="btn btn-info btn-rounded m-t-10 mb-3 btn-upload-file" id="btn-upload-file-${student.id}" data-id="${student.id}">
                                                                                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                                                                                                                                                    <path fill="currentColor" d="m19.41 7.41l-4.83-4.83c-.37-.37-.88-.58-1.41-.58H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8.83c0-.53-.21-1.04-.59-1.42zM14.8 15H13v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H9.21c-.45 0-.67-.54-.35-.85l2.8-2.79c.2-.19.51-.19.71 0l2.79 2.79c.3.31.08.85-.36.85zM14 9c-.55 0-1-.45-1-1V3.5L18.5 9H14z"/>
                                                                                                                                                                                                </svg>
                                                                                                                                                                                            </button>` : student.status == 'permission' || student.status == 'sick' ? `
                                                                                                                                                                                            <button type="button" class="btn btn-info btn-rounded m-t-10 mb-3 btn-show-file" id="btn-show-file-${student.id}" data-id="${student.id}">
                                                                                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9h5.5L13 3.5V9M6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m0 18h12v-8l-4 4l-2-2l-6 6M8 9a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2Z"/></svg>
                                                                                                                                                                                            </button>` : '<p class="fs-4 fw-semibold fs-2">-</p>'}
                </td>
            </tr>`;
            }
        });
    </script>
@endsection
