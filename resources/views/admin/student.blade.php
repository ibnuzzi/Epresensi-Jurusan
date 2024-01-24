@extends('layouts.app')
@section('content')
    <div class="container-fluid basic_table">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2 mb-3 fs-5 fw-bolder">Berikut Daftar-daftar klasifikasi Pelatihan</div>
                        <div class="d-flex justify-content-between mb-3">
                            <form class=" col-lg-3">
                                <div class="input-group">
                                    <input name="name" type="text" class="form-control" placeholder="Search"
                                        value="">
                                    <div class="input-group-append">
                                        <bStton class="btn text-white"
                                            style="background-color: #1B3061; border-radius: 0 5px 5px 0;" type="submit">
                                            <i class="fa fa-search"></i>
                                        </bStton>
                                    </div>
                                </div>
                            </form>
                            <div class="">
                                <button class="btn me-2 btn-md btn-create text-white" data-bs-toggle="modal"
                                    data-bs-target="#samedata-modal" style="background-color: #1B3061">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Hours</th>
                                        <th scope="col">Performance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark Jecno </td>
                                        <td>22/08/2022 </td>
                                        <td class="font-danger">On leave </td>
                                        <td>0</td>
                                        <td>29/30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Elana Robbert </td>
                                        <td>21/08/2022 </td>
                                        <td class="font-success">Present</td>
                                        <td>10</td>
                                        <td>30/30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>John Deo </td>
                                        <td>18/08/2022</td>
                                        <td class="font-danger">On leave </td>
                                        <td>8</td>
                                        <td>28/30</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
