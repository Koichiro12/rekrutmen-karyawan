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
                            Job
                        </h4>
                        {{-- <div class="card-tools">
                            <a href="{{route('educations.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <h1>
                            {{ $job->job_name }}
                        </h1>
                        @switch($job->status)
                            @case(0)
                                <span class="badge bg-danger">Closed</span>
                            @break

                            @case(1)
                                <span class="badge bg-success">Open</span>
                            @break

                            @default
                        @endswitch
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departement : {{ $job->departement }}</small><br>
                                <small>Position : {{ $job->position }}</small><br>
                                <small>Salary : <span class="text-primary">{{ number_format($job->salary) }}</span></small>
                            </div>
                            <div class="col-md-6">
                                <small>Min Educations : {{ $job->min_education }}</small><br>
                                <small>Max Age : {{ $job->max_age }}</small>
                            </div>
                        </div>
                        <hr>
                        <h3>Criteria</h3>
                        <p>{{ $job->job_criteria }}</p>
                        <hr>
                        <h3>Descriptions</h3>
                        <p>{{ $job->job_desc }}</p>
                        <br>
                        @switch($job->status)
                            @case(0)
                                <a href="{{ route('search_job') }}" class="btn btn-sm btn-danger">Back</a>
                            @break

                            @case(1)
                                @php
                                    $isApplied = false;
                                    if ($apply_job != null) {
                                        $isApplied = true;
                                    }
                                @endphp
                                @if (!$isApplied)
                                    <form action="{{ route('apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success form-confirm">Apply Job</button>
                                        <a href="{{ route('search_job') }}" class="btn btn-sm btn-danger">Back</a>
                                    </form>
                                @else
                                    <a href="{{ route('apply_job') }}" class="btn btn-sm btn-primary">View My Apply</a>
                                    <a href="{{ route('search_job') }}" class="btn btn-sm btn-danger">Back</a>
                                @endif
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
