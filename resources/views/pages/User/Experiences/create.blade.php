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
                            Create Experiences
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('experiences.index') }}" class="btn btn-sm btn-primary">Departement</a>
                        </div>
                    </div>
                    <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="last_job_departement">Departement</label>
                                <input type="text" name="last_job_departement" id="last_job_departement"
                                    class="form-control {{ $errors->first('last_job_departement') != null ? 'is-invalid' : '' }}"
                                    placeholder="Departement Name" value="{{old('last_job_departement')}}" required>
                                @if ($errors->first('last_job_departement') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_job_departement') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" id="company_name"
                                    class="form-control {{ $errors->first('company_name') != null ? 'is-invalid' : '' }}"
                                    placeholder="Company Name" value="{{old('company_name')}}" required>
                                @if ($errors->first('company_name') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('company_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_job_position">Last Job Position</label>
                                <input type="text" name="last_job_position" id="last_job_position"
                                    class="form-control {{ $errors->first('last_job_position') != null ? 'is-invalid' : '' }}"
                                    placeholder="Last Job Position" value="{{old('last_job_position')}}" required>
                                @if ($errors->first('last_job_position') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_job_position') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_job">Start Job</label>
                                        <input type="month" name="start_job" id="start_job"
                                            class="form-control {{ $errors->first('start_job') != null ? 'is-invalid' : '' }}"
                                            placeholder="Start Job" value="{{old('start_job')}}" required>
                                        @if ($errors->first('start_job') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('start_job') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_job">End Job</label>
                                        <input type="month" name="end_job" id="end_job"
                                            class="form-control {{ $errors->first('end_job') != null ? 'is-invalid' : '' }}"
                                            placeholder="End Job" value="{{old('end_job')}}" required>
                                        @if ($errors->first('end_job') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('end_job') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" id="salary"
                                    class="form-control {{ $errors->first('salary') != null ? 'is-invalid' : '' }}"
                                    placeholder="Salary" value="{{old('salary')}}">
                                @if ($errors->first('salary') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('salary') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="intensive_pay">Intensive Pay</label>
                                <input type="number" name="intensive_pay" id="intensive_pay"
                                    class="form-control {{ $errors->first('intensive_pay') != null ? 'is-invalid' : '' }}"
                                    placeholder="Intensive Pay" value="{{old('intensive_pay')}}">
                                @if ($errors->first('intensive_pay') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('intensive_pay') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_job_facility">Last Job Facility</label>
                                <input type="text" name="last_job_facility" id="last_job_facility"
                                    class="form-control {{ $errors->first('last_job_facility') != null ? 'is-invalid' : '' }}"
                                    placeholder="Last Job Facility" value="{{old('last_job_facility')}}">
                                @if ($errors->first('last_job_facility') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_job_facility') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="reason_stop_working">Reason Stop Working</label>
                                <textarea name="reason_stop_working" id="reason_stop_working" class="form-control {{ $errors->first('reason_stop_working') != null ? 'is-invalid' : '' }}" cols="30" rows="10" placeholder="Reason Stop Working">{{old('reason_stop_working')}}</textarea>
                                @if ($errors->first('reason_stop_working') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('reason_stop_working') }}
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
