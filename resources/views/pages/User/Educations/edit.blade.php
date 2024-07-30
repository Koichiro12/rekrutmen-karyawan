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
                            Edit Educations
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('educations.index') }}" class="btn btn-sm btn-primary">Educations</a>
                        </div>
                    </div>
                    <form action="{{ route('educations.update',$education->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="last_education">Grade</label>
                                <select name="last_education" id="last_education" class="form-control {{ $errors->first('last_education') != null ? 'is-invalid' : '' }}" required>
                                    <option value="">--Select Grade--</option>
                                    <option value="SD" {{$education->last_education == 'SD' ? 'selected' : ''}}>SD</option>
                                    <option value="SMP" {{$education->last_education == 'SMP' ? 'selected' : ''}}>SMP</option>
                                    <option value="SMA / SMK Sederajat" {{$education->last_education == 'SMA / SMK Sederajat' ? 'selected' : ''}}>SMA / SMK Sederajat</option>
                                    <option value="D3" {{$education->last_education == 'D3' ? 'selected' : ''}}>D3</option>
                                    <option value="D4 / S1" {{$education->last_education == 'D4 / S1' ? 'selected' : ''}}>S1</option>
                                    <option value="S2" {{$education->last_education == 'S2' ? 'selected' : ''}}>S2</option>
                                    <option value="S3" {{$education->last_education == 'S3' ? 'selected' : ''}}>S3</option>
                                </select>
                                @if ($errors->first('last_education') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_education') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input type="text" name="school_name" id="school_name"
                                    class="form-control {{ $errors->first('school_name') != null ? 'is-invalid' : '' }}"
                                    placeholder="School Name" value="{{$education->school_name}}" required>
                                @if ($errors->first('school_name') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('school_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="major_education">Major</label>
                                <input type="text" name="major_education" id="major_education"
                                    class="form-control {{ $errors->first('major_education') != null ? 'is-invalid' : '' }}"
                                    placeholder="Major Education" value="{{$education->major_education}}" required>
                                @if ($errors->first('major_education') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('major_education') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city"
                                    class="form-control {{ $errors->first('city') != null ? 'is-invalid' : '' }}"
                                    placeholder="City" value="{{$education->city}}" required>
                                @if ($errors->first('city') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('city') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="average_value">Average Scores</label>
                                <input type="text" name="average_value" id="average_value"
                                    class="form-control {{ $errors->first('average_value') != null ? 'is-invalid' : '' }}"
                                    placeholder="Average Scores" value="{{$education->average_value}}" required>
                                @if ($errors->first('average_value') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('average_value') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Year Of Education</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_year">Start Year</label>
                                        <input type="month" name="start_year" id="start_year"
                                            class="form-control {{ $errors->first('start_year') != null ? 'is-invalid' : '' }}"
                                            placeholder="School Name" value="{{$education->start_year}}" required>
                                        @if ($errors->first('start_year') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('start_year') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_year">End Year</label>
                                        <input type="month" name="end_year" id="end_year"
                                            class="form-control {{ $errors->first('end_year') != null ? 'is-invalid' : '' }}"
                                            placeholder="End Year" value="{{$education->end_year}}" required>
                                        @if ($errors->first('end_year') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('end_year') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
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
