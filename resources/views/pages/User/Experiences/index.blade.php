@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12 col-xl-12">
                @if (session()->has('eror'))
                <div class="alert alert-danger">
                    {{session('eror')}}
                </div>
            @endif
            @if (session()->has('sukses'))
            <div class="alert alert-success">
                {{session('sukses')}}
            </div>
        @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Experiences
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('experiences.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Last Experience</th>
                                        <th>Length Of Work</th>
                                        <th>Facility & Salary</th>
                                        <th>Reason Stop Working</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($experience as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <h3>{{$item->last_job_position}}</h3>
                                            <p>{{$item->company_name}} <br>
                                            <small>{{$item->last_job_departement}}</small></p>
                                        </td>
                                        <td>{{ date_format(date_create(($item->start_job)),'M Y') }} - {{date_format(date_create(($item->end_job)),'M Y')}}</td>
                                        <td>Facilities : <br>
                                            {{$item->last_job_facility}}
                                            <br>
                                            Salary : <br>
                                            Rp.{{number_format($item->salary)}} <br>
                                            Intensive Pay : <br>
                                            Rp.{{number_format($item->intensive_pay)}}
                                        </td>
                                        <td>{{$item->reason_stop_working}}</td>
                                        <td>
                                            <form action="{{ route('experiences.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('experiences.edit', $item->id) }}"
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
