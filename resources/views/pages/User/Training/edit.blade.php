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
                            Edit Educations
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('departement.index')}}" class="btn btn-sm btn-primary">Departement</a>
                        </div>
                    </div>
                    <form action="{{route('departement.update',$departement->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </section>
@endsection
