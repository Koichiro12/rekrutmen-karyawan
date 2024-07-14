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
                            Jobs
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('jobs.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Requirement</th>
                                        <th>Period</th>
                                        <th>Status</th>
                                        <th>Test</th>
                                        <th>Psikotes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $item)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$item->job_name}}</td>
                                            <td>Departement : {{$item->departement}} <br>
                                                Position : {{$item->position}} <br>
                                                Min Education : {{$item->min_education}} <br>
                                                Major Education : {{$item->major_education}} <br>
                                                Max Age : {{$item->max_age}} <br>
                                                 </td>
                                            <td>{{date_format(date_create($item->open_date),'d M Y')}} s/d {{date_format(date_create($item->close_date),'d M Y')}}</td>
                                            <td>
                                                @switch($item->status)
                                                    @case(0)
                                                        <span class="badge bg-danger">Closed</span>
                                                        @break
                                                    @case(1)
                                                    <span class="badge bg-success">Open</span>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{route('view_test',$item->id)}}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                                            </td>
                                            <td>
                                                <a href="{{route('view_psikotest',$item->id)}}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('jobs.destroy', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('jobs.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger form-confirm">Delete</button>
                                                </form>
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
