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
                            Create Job
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-primary">Jobs</a>
                        </div>
                    </div>
                    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="job_name">Jobs Name</label>
                                <input type="text" name="job_name" id="job_name"
                                    class="form-control {{ $errors->first('job_name') != null ? 'is-invalid' : '' }}"
                                    placeholder="Jobs Name" value="{{ old('job_name') }}" required />
                                @if ($errors->first('job_name') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('job_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departement_id">Departement</label>
                                        <select name="departement_id" id="departement_id"
                                            class="form-control {{ $errors->first('departement_id') != null ? 'is-invalid' : '' }}"
                                            required>
                                            <option value="">-- Select Departement --</option>
                                            @foreach ($departement as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('departement_id') ? 'selected' : '' }}>
                                                    {{ $item->departement }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->first('departement_id') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('departement_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position_id">Position</label>
                                        <select name="position_id" id="position_id"
                                            class="form-control {{ $errors->first('position_id') != null ? 'is-invalid' : '' }}"
                                            required>
                                            <option value="">-- Select Position --</option>
                                            @foreach ($position as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('position_id') ? 'selected' : '' }}>
                                                    {{ $item->position }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->first('position_id') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('position_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="max_age">Maximum Age</label>
                                <input type="number" name="max_age" id="max_age"
                                    class="form-control {{ $errors->first('max_age') != null ? 'is-invalid' : '' }}"
                                    placeholder="Maximum Age" value="{{ old('max_age') }}" required />
                                @if ($errors->first('max_age') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('max_age') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="min_education">Minimum Educations</label>
                                        <select name="min_education" id="min_education"
                                            class="form-control {{ $errors->first('min_education') != null ? 'is-invalid' : '' }}"
                                            required>
                                            <option value="">-- Select Educations --</option>
                                        </select>
                                        @if ($errors->first('min_education') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('min_education') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="major_education">Major Education</label>
                                        <input type="text" name="major_education" id="major_education"
                                            class="form-control {{ $errors->first('major_education') != null ? 'is-invalid' : '' }}"
                                            placeholder="Major Education" value="{{ old('major_education') }}" required />
                                        @if ($errors->first('major_education') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('major_education') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" id="salary"
                                    class="form-control {{ $errors->first('salary') != null ? 'is-invalid' : '' }}"
                                    placeholder="Salary" value="{{ old('salary') }}" required />
                                @if ($errors->first('salary') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('salary') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="open_date">Open Date</label>
                                        <input type="date" name="open_date" id="open_date"
                                            class="form-control {{ $errors->first('open_date') != null ? 'is-invalid' : '' }}"
                                            placeholder="Open Date" value="{{ old('open_date') }}" required />
                                        @if ($errors->first('open_date') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('open_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="close_date">Close Date</label>
                                        <input type="date" name="close_date" id="close_date"
                                            class="form-control {{ $errors->first('close_date') != null ? 'is-invalid' : '' }}"
                                            placeholder="Close Date" value="{{ old('close_date') }}" required />
                                        @if ($errors->first('close_date') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('close_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job_desc">Job Desc</label>
                                <textarea name="job_desc" id="job_desc" class="form-control {{ $errors->first('job_desc') != null ? 'is-invalid' : '' }}" cols="30" rows="10" placeholder="Job Desc">{{old('job_desc')}}</textarea>
                                @if ($errors->first('job_desc') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('job_desc') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="job_criteria">Job Criteria</label>
                                <input type="text" name="job_criteria" id="job_criteria"
                                    class="form-control {{ $errors->first('job_criteria') != null ? 'is-invalid' : '' }}"
                                    placeholder="Job Criteria" value="{{ old('job_criteria') }}" required />
                                @if ($errors->first('job_criteria') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('job_criteria') }}
                                    </div>
                                @endif
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
