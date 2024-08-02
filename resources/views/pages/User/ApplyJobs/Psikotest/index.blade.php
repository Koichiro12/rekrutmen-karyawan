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
                            Job Psikotest
                        </h4>
                        {{-- <div class="card-tools">
                            <a href="{{route('educations.create')}}" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div> --}}
                    </div>
                    <form action="{{route('submit_apply_psikotest',$id)}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            @foreach ($psikotest as $item)
                                <h6>
                                    {{$loop->index + 1}}. {{$item->question}}
                                  
                                </h6>
                                <br>
                                <div class="form-group">
                                    <input type="radio" name="oq_{{$item->id}}" id="oq_{{$item->id}}" class="form-input form-check-input" value="A">
                                    <label for="oq_{{$item->id}}">{{$item->option_a}}</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="oq_{{$item->id}}" id="oq_{{$item->id}}" class="form-input form-check-input" value="B">
                                    <label for="oq_{{$item->id}}">{{$item->option_b}}</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="oq_{{$item->id}}" id="oq_{{$item->id}}" class="form-input form-check-input" value="C">
                                    <label for="oq_{{$item->id}}">{{$item->option_c}}</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="oq_{{$item->id}}" id="oq_{{$item->id}}" class="form-input form-check-input" value="D">
                                    <label for="oq_{{$item->id}}">{{$item->option_d}}</label>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success form-confirm">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
