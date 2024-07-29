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
                            Create Trainings
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('trainings.index') }}" class="btn btn-sm btn-primary">Departement</a>
                        </div>
                    </div>
                    <form action="{{ route('trainings.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="training">Training</label>
                                <input type="text" name="training" id="training"
                                    class="form-control {{ $errors->first('training') != null ? 'is-invalid' : '' }}"
                                    placeholder="Training Name" value="{{old('training')}}" required>
                                @if ($errors->first('training') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('training') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="certification">Certification</label>
                                <input type="text" name="certification" id="certification"
                                    class="form-control {{ $errors->first('certification') != null ? 'is-invalid' : '' }}"
                                    placeholder="Certification" value="{{old('certification')}}" required>
                                @if ($errors->first('certification') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('certification') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="organizer">Organizer</label>
                                <input type="text" name="organizer" id="organizer"
                                    class="form-control {{ $errors->first('organizer') != null ? 'is-invalid' : '' }}"
                                    placeholder="Organizer" value="{{old('organizer')}}" required>
                                @if ($errors->first('organizer') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('organizer') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="year_of_training">Year Of Training</label>
                                <input type="number" min="1900" max="2100" step="1" value="{{date('Y')}}" name="year_of_training" id="year_of_training"
                                    class="form-control {{ $errors->first('year_of_training') != null ? 'is-invalid' : '' }}"
                                    placeholder="Organizer" value="{{old('year_of_training')}}" required>
                                @if ($errors->first('year_of_training') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('year_of_training') }}
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
