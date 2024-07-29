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
                            Educations
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('educations.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>School</th>
                                        <th>Major Education</th>
                                        <th>Year Of Education</th>
                                        <th>Average Scores</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($educations as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <h3>{{$item->school_name}}</h3>
                                            <small>{{$item->last_education}}</small>
                                            <p>{{$item->city}}</p>
                                        </td>
                                        <td>{{$item->major_education}}</td>
                                        <td>{{ date_format(date_create(($item->start_year)),'M Y') }} - {{date_format(date_create(($item->end_year)),'M Y')}}</td>
                                        <td>{{$item->average_value}}</td>
                                        <td>
                                            <form action="{{ route('educations.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('educations.edit', $item->id) }}"
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
