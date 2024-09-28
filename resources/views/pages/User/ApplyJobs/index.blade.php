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

                                                    @case(3)
                                                        <span class="badge bg-primary">Hired</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge bg-danger">Fail</span>
                                                    @break

                                                    @case(5)
                                                        <span class="badge bg-danger">Cancel</span>
                                                    @break

                                                    @default
                                                @endswitch
                                                <br>
                                                <small>Departement : {{ $item->departement }}</small><br>
                                                <small>Position : {{ $item->position }}</small><br>
                                                <small>Salary : <span
                                                        class="text-primary">{{ number_format($item->salary) }}</span></small>
                                                <hr>
                                                @if ($item->status_apply == 0)
                                                <a href="{{ route('cancel_apply', $item->id) }}"
                                                    class="btn btn-sm btn-danger a-confirm">Cancel Apply</a>
                                                @endif
                                                @if ($item->status_apply == 1)
                                                    @if ($item->test_result != '-')
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
                                                    @else
                                                        <a href="{{ route('apply_test', $item->id) }}"
                                                            class="btn btn-sm btn-light">Test</a>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if ($item->psikotes_result != '-')
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
                                                    @else
                                                        <a href="{{ route('apply_psikotest', $item->id) }}"
                                                            class="btn btn-sm btn-dark">Psikotest</a>
                                                    @endif
                                                @endif
                                                @if ($item->status_apply == 5)
                                                <a href="{{ route('hapus_apply', $item->id) }}"
                                                    class="btn btn-sm btn-danger a-confirm">Hapus</a>
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
