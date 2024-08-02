@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12 col-xl-12">
                @if (session()->has('eror'))
                    <div class="alert alert-danger">
                        {{ session('eror') }}
                    </div>
                @endif
                @if (session()->has('sukses'))
                    <div class="alert alert-success">
                        {{ session('sukses') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            JobSeekers
                        </h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Lowongan</th>
                                        <th>Pelamar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobseekers as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ date_format(date_create($item->date_apply), 'd M,Y') }}</td>
                                            <td>{{ $item->job_name }} <br>
                                                <small>{{ date_format(date_create($item->open_date), 'd M,Y') }} -
                                                    {{ date_format(date_create($item->Dclose_date), 'd M,Y') }}</small>
                                                <br>
                                                <small>Departement : {{ $item->departement }}</small><br>
                                                <small>Poisition : {{ $item->position }}</small>
                                            </td>
                                            <td>
                                                Name : {{ $item->name }} <br>
                                                Email : {{ $item->email }} <br>
                                                Phone : {{ $item->phone_number }} <br>
                                            </td>
                                            <td>
                                                @switch($item->status_apply)
                                                    @case(0)
                                                        Status Selection : <span class="badge bg-warning">Waiting</span>
                                                    @break

                                                    @case(1)
                                                        Status Selection : <span class="badge bg-success">Pass Selection</span>
                                                    @break

                                                    @case(2)
                                                        Status Selection :<span class="badge bg-danger">Failed Selection</span>
                                                    @break

                                                    @default
                                                @endswitch
                                                <hr>
                                                @switch($item->test_status)
                                                    @case(0)
                                                        Test Status : <span class="badge bg-danger">Not Yet</span>
                                                    @break

                                                    @case(1)
                                                        Test Status : <span class="badge bg-warning">Waiting</span>
                                                    @break

                                                    @case(2)
                                                        Test Status :<span class="badge bg-success">Pass</span>
                                                    @break

                                                    @case(3)
                                                        Test Status :<span class="badge bg-success">Failed</span>
                                                    @break

                                                    @default
                                                @endswitch
                                                <hr>
                                                @switch($item->psikotes_status)
                                                    @case(0)
                                                        Psikotes Status : <span class="badge bg-danger">Not Yet</span>
                                                    @break

                                                    @case(1)
                                                        Psikotes Status : <span class="badge bg-warning">Waiting</span>
                                                    @break

                                                    @case(2)
                                                        Psikotes Status :<span class="badge bg-success">Pass</span>
                                                    @break

                                                    @case(3)
                                                        Psikotes Status :<span class="badge bg-success">Failed</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
