@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Setting Jam Masuk dan Pulang</h3>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xl-12 xl-100">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                href="#pills-monday" role="tab" aria-controls="pills-home" aria-selected="true">Senin
                                <div class="d-flex"></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-tuesday" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Selasa</a></li>
                        <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                href="#pills-wednesday" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Rabu</a></li>
                        <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                href="#pills-thursday" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Kamis</a></li>
                        <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                href="#pills-friday" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Jum'at</a></li>
                    </ul>
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="" data-bs-original-title="Jam Masuk dan Pulang Sudah di Default Setting"><svg
                            xmlns="http://www.w3.org/2000/svg" class="d-flex justify-content-center" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg></button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12 xl-100">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($attendanceRules as $attendanceRule)
                            <div class="tab-pane fade @if ($attendanceRule->day == 'monday') show active @endif"
                                id="pills-{{ $attendanceRule->day }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form action="{{ route('clock-settings.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <input type="hidden" name="day" value="{{ $attendanceRule->day }}">
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Waktu Masuk Dimulai</label>
                                            <input class="form-control" name="checkin_starts" type="time"
                                                value="{{ $attendanceRule->checkin_starts }}">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Waktu Masuk Selesai</label>
                                            <input class="form-control" name="checkin_ends" type="time"
                                                value="{{ $attendanceRule->checkin_ends }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Waktu Pulang Dimulai</label>
                                            <input class="form-control" name="checkout_starts" type="time"
                                                value="{{ $attendanceRule->checkout_starts }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Waktu Pulang Selesai</label>
                                            <input class="form-control" name="checkout_ends" type="time"
                                                value="{{ $attendanceRule->checkout_ends }}">
                                        </div>
                                    </div>
                                    <div class="d-row d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
@endsection
