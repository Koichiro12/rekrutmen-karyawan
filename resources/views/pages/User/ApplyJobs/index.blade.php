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
                            My Apply Jobs
                        </h4>
                        {{-- <div class="card-tools">
                            <a href="{{route('educations.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Jobs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apply_job as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <h1>
                                                    {{ $item->job_name }}
                                                </h1>
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
                                                <br>
                                                <small>Departement : {{ $item->departement }}</small><br>
                                                <small>Position : {{ $item->position }}</small><br>
                                                <small>Salary : <span
                                                        class="text-primary">{{ number_format($item->salary) }}</span></small>
                                                <hr>
                                                @if ($item->status_apply == 1)
                                                    <a href="#" class="btn btn-sm btn-light">Test</a>
                                                    <a href="#" class="btn btn-sm btn-dark">Psikotest</a>
                                                @endif
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
