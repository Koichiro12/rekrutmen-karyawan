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
                            Search Jobs
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
                                    @foreach ($jobs as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <h1>
                                                    {{ $item->job_name }}
                                                </h1>
                                                @switch($item->status)
                                                    @case(0)
                                                        <span class="badge bg-danger">Closed</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge bg-success">Open</span>
                                                    @break

                                                    @default
                                                @endswitch
                                                <br>
                                                <small>Departement : {{ $item->departement }}</small><br>
                                                <small>Position : {{ $item->position }}</small><br>
                                                <small>Salary : <span
                                                        class="text-primary">{{ number_format($item->salary) }}</span></small>
                                                <hr>
                                                @switch($item->status)
                                                    @case(0)
                                                        <a href="{{ route('detail_job', $item->id) }}"
                                                            class="btn btn-sm btn-light">ReadMore..</a>
                                                    @break

                                                    @case(1)
                                                        @php
                                                            $isApplied = false;
                                                            foreach ($apply_job as $aj) {
                                                                if ($aj->job_id == $item->id) {
                                                                    $isApplied = true;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        @if (!$isApplied)
                                                            <form action="{{ route('apply', $item->id) }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @method('POST')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success form-confirm">Apply
                                                                    Job</button>
                                                                <a href="{{ route('detail_job', $item->id) }}"
                                                                    class="btn btn-sm btn-light">Read More..</a>
                                                            </form>
                                                        @else
                                                        <a href="{{ route('apply_job') }}"
                                                            class="btn btn-sm btn-primary">View My Apply</a>
                                                            <a href="{{ route('detail_job', $item->id) }}"
                                                                class="btn btn-sm btn-light">ReadMore..</a>
                                                        @endif
                                                    @break

                                                    @default
                                                @endswitch
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
