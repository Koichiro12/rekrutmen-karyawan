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
                            Create Skills
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('skills.index') }}" class="btn btn-sm btn-primary">Skills</a>
                        </div>
                    </div>
                    <form action="{{ route('skills.update',$skills->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <input type="text" name="skills" id="skills"
                                    class="form-control {{ $errors->first('skills') != null ? 'is-invalid' : '' }}"
                                    placeholder="Skills Name" value="{{$skills->skills}}" required>
                                @if ($errors->first('skills') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('skills') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="skill_level">Skills</label>
                                <select name="skill_level" id="skill_level" class="form-control {{ $errors->first('skill_level') != null ? 'is-invalid' : '' }}" required>
                                    <option value="">-- Skill Level --</option>
                                    <option value="Good" {{$skills->skill_level == 'Good' ? 'selected' : ''}}>Good</option>
                                    <option value="Intermediate" {{$skills->skill_level == 'Intermediate' ? 'selected' : ''}}>Intermediate</option>
                                    <option value="Professional" {{$skills->skill_level == 'Professional' ? 'selected' : ''}}>Professional</option>
                                </select>
                                @if ($errors->first('skill_level') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('skill_level') }}
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
