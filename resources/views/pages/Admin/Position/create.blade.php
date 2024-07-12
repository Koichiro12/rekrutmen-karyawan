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
                            Create Position
                        </h4>
                        <div class="card-tools">
                            <a href="{{route('position.index')}}" class="btn btn-sm btn-primary">Position</a>
                        </div>
                    </div>
                    <form action="{{route('position.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" id="position" class="form-control  {{ $errors->first('position') != null ? 'is-invalid' : '' }}" placeholder="Position Name" required>
                                @if ($errors->first('position') != null)
                                <div class="invalid-feedback">
                                    {{ $errors->first('position') }}
                                </div>
                            @endif
                            </div>    
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
