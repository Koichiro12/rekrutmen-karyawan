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
                            Trainings
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('trainings.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Training</th>
                                        <th>Certification</th>
                                        <th>Organizer</th>
                                        <th>Year Of Training</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($trainings as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->training}}</td>
                                        <td>{{$item->certification}}</td>
                                        <td>{{$item->organizer}}</td>
                                        <td>{{$item->year_of_training}}</td>
                                        <td>
                                            <form action="{{ route('trainings.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('trainings.edit', $item->id) }}"
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
