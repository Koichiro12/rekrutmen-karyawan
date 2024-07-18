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
