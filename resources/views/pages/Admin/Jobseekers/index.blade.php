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
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{date_format(date_create($item->date_apply),'d M,Y')}}</td>
                                            <td>{{$item->job_name}} <br>
                                                <small>{{date_format(date_create($item->open_date),'d M,Y')}} - {{date_format(date_create($item->Dclose_date),'d M,Y')}}</small>
                                                <br>
                                                <small>Departement : {{$item->departement}}</small><br>
                                                <small>Poisition : {{$item->position}}</small>
                                            </td>
                                            <td>
                                                Name : {{$item->name}} <br>
                                                Email : {{$item->email}} <br>
                                                Phone : {{$item->phone_number}} <br>
                                            </td>
                                            <td>
                                                @switch($item->status_apply)
                                                @case(0)
                                                    <span class="badge bg-warning">Waiting Confirmation</span>
                                                @break

                                                @case(1)
                                                    <span class="badge bg-success">Pass Selection</span>
                                                @break

                                                @case(2)
                                                    <span class="badge bg-danger">Failed Selection</span>
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
