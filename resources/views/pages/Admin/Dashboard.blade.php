@extends('layouts.app')
@section('content')
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{route('jobseekers_with_status',1)}}"  class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pelamar Baru</h6>
                                    <h6 class="font-extrabold mb-0">{{ $wait }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{route('jobseekers_with_status',2)}}" class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Proses</h6>
                                    <h6 class="font-extrabold mb-0">{{ $proses }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{route('jobseekers_with_status',3)}}" class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Diterima</h6>
                                    <h6 class="font-extrabold mb-0">{{ $pass }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <a href="{{route('jobseekers_with_status',4)}}" class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Gagal</h6>
                                    <h6 class="font-extrabold mb-0">{{ $failed }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Jobseekers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jobseekers</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applyjobs as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    Name : {{ $item->name }} <br>
                                                    Email : {{ $item->email }} <br>
                                                    Phone : {{ $item->phone_number }} <br>
                                                    @switch($item->status_apply)
                                                        @case(0)
                                                            Status : <span class="badge bg-warning">Waiting</span>
                                                        @break

                                                        @case(1)
                                                            Status : <span class="badge bg-success">Pass Selection</span>
                                                        @break

                                                        @case(2)
                                                            Status :<span class="badge bg-danger">Failed Selection</span>
                                                        @break

                                                        @case(3)
                                                            Status : <span class="badge bg-success">Hired</span>
                                                        @break

                                                        @case(4)
                                                            Status :<span class="badge bg-danger">Not Recruit</span>
                                                        @break

                                                        @default
                                                    @endswitch

                                                </td>
                                                <td>
                                                    <a href="{{ route('jobseeker_detail', $item->id_apply) }}"
                                                        class="btn btn-sm btn-primary">Detail</a>
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
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ auth()->user()->user_image != '-' ? asset('uploads/' . auth()->user()->user_image) : asset('/') . 'assets/compiled/jpg/5.jpg' }}"
                                alt="Face 1">
                        </div>
                        <div class="ms-2 name">
                            <p class="font-bold py-0 my-0">{{ auth()->user()->name }}</p>
                            <small class="text-muted mb-0">{{ auth()->user()->role }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
