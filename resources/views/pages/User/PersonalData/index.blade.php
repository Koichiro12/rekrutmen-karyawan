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
                <form action="{{route('update_personal_data')}}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Personal Data
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <br>
                                <img src="{{ isset($job_seekers) && $job_seekers->jobseeker_image != '-' && $job_seekers->jobseeker_image != null ? asset('uploads/' . $job_seekers->jobseeker_image) : asset('/') . 'assets/compiled/jpg/5.jpg' }}"
                                    class="img my-2" width="100" id="view-img">

                                <input type="file" name="foto" id="user_image" accept="image/*,image/png,image/jpeg"
                                    class="form-input form-control {{ $errors->first('foto') != null ? 'is-invalid' : '' }}">
                                @if ($errors->first('foto') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('foto') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik"
                                    class="form-control {{ $errors->first('nik') != null ? 'is-invalid' : '' }}"
                                    placeholder="NIK"
                                    value="{{ isset($job_seekers) && $job_seekers->nik != null ? $job_seekers->nik : old('nik') }}"
                                    required>
                                @if ($errors->first('nik') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nik') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                    placeholder="Full Name"
                                    value="{{ isset($job_seekers) && $job_seekers->name != null ? $job_seekers->name : old('name') }}"
                                    required>
                                @if ($errors->first('name') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Birthday</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="place_birth">Place</label>
                                        <input type="text" name="place_birth" id="place_birth"
                                            class="form-control {{ $errors->first('place_birth') != null ? 'is-invalid' : '' }}"
                                            placeholder="Place Of Birth"
                                            value="{{ isset($job_seekers) && $job_seekers->place_birth != null ? $job_seekers->place_birth : old('place_birth') }}"
                                            required>
                                        @if ($errors->first('place_birth') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('place_birth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_birth">Date</label>
                                        <input type="date" name="date_birth" id="date_birth"
                                            class="form-control {{ $errors->first('date_birth') != null ? 'is-invalid' : '' }}"
                                            placeholder="Date Of Birth"
                                            value="{{ isset($job_seekers) && $job_seekers->date_birth != null ? $job_seekers->date_birth : old('date_birth') }}"
                                            required>
                                        @if ($errors->first('date_birth') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('date_birth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender"
                                    class="form-control {{ $errors->first('gender') != null ? 'is-invalid' : '' }}"
                                    required>
                                    <option value="">--Select Gender--</option>
                                    <option value="L"
                                        {{ isset($job_seekers) && $job_seekers->gender != null && $job_seekers->gender == 'L' || old('gender') == 'L' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="P"
                                        {{ isset($job_seekers) && $job_seekers->gender != null && $job_seekers->gender == 'P' || old('gender') == 'P' ? 'selected' : '' }}>
                                        Female</option>
                                </select>
                                @if ($errors->first('gender') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" placeholder="Address"
                                    class="form-control {{ $errors->first('address') != null ? 'is-invalid' : '' }}" cols="30" rows="10">{{ isset($job_seekers) && $job_seekers->address != null ? $job_seekers->address : old('address') }}</textarea>
                                @if ($errors->first('address') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="domisili">Domisili</label>
                                <input type="text" name="domisili" id="domisili"
                                    class="form-control {{ $errors->first('domisili') != null ? 'is-invalid' : '' }}"
                                    placeholder="Domisili"
                                    value="{{ isset($job_seekers) && $job_seekers->domisili != null ? $job_seekers->domisili : old('domisili') }}"
                                    required>
                                @if ($errors->first('domisili') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('domisili') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control {{ $errors->first('phone_number') != null ? 'is-invalid' : '' }}"
                                    placeholder="Phone Number"
                                    value="{{ isset($job_seekers) && $job_seekers->phone_number != null ? $job_seekers->phone_number : old('phone_number') }}"
                                    required>
                                @if ($errors->first('phone_number') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control {{ $errors->first('email') != null ? 'is-invalid' : '' }}"
                                    placeholder="Email"
                                    value="{{ isset($job_seekers) && $job_seekers->email != null ? $job_seekers->email : old('email') }}"
                                    required>
                                @if ($errors->first('email') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status_residence">Status Residence</label>
                                <select name="status_residence" id="status_residence"
                                    class="form-control {{ $errors->first('status_residence') != null ? 'is-invalid' : '' }}"
                                    required>
                                    <option value="">--Select Status Residence--</option>
                                    <option value="Live with Family" {{ isset($job_seekers) && $job_seekers->status_residence != null && $job_seekers->status_residence == 'Live with Family' || old('status_residence') == 'Live with Family' ? 'selected' : '' }}>Live with Family</option>
                                    <option value="Own House" {{ isset($job_seekers) && $job_seekers->status_residence != null && $job_seekers->status_residence == 'Own House' || old('status_residence') == 'Own House' ? 'selected' : '' }}>Own House</option>
                                    <option value="Rent" {{ isset($job_seekers) && $job_seekers->status_residence != null && $job_seekers->status_residence == 'Rent' || old('status_residence') == 'Rent' ? 'selected' : '' }}>Rent</option>
                                </select>
                                @if ($errors->first('status_residence') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('status_residence') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="married_status">Married Status</label>
                                <select name="married_status" id="married_status"
                                    class="form-control {{ $errors->first('married_status') != null ? 'is-invalid' : '' }}"
                                    required>
                                    <option value="">--Select Married Status--</option>
                                    <option value="Single" {{ isset($job_seekers) && $job_seekers->married_status != null && $job_seekers->married_status == 'Single' || old('married_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ isset($job_seekers) && $job_seekers->married_status != null && $job_seekers->married_status == 'Married' || old('married_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Ever Married / Divorce" {{ isset($job_seekers) && $job_seekers->married_status != null && $job_seekers->married_status == 'Ever Married / Divorce' || old('married_status') == 'Ever Married / Divorce' ? 'selected' : '' }}>Ever Married / Divorce</option>
                                </select>
                                @if ($errors->first('married_status') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('married_status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="citizen">Citizen</label>
                                <input type="text" name="citizen" id="citizen"
                                    class="form-control {{ $errors->first('citizen') != null ? 'is-invalid' : '' }}"
                                    placeholder="Citizen"
                                    value="{{ isset($job_seekers) && $job_seekers->citizen != null ? $job_seekers->citizen : old('citizen') }}"
                                    required>
                                @if ($errors->first('citizen') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('citizen') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <select name="relegion" id="religion"
                                    class="form-control {{ $errors->first('religion') != null ? 'is-invalid' : '' }}"
                                    required>
                                    <option value="">--Select Religion--</option>
                                    <option value="Islam" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Islam' || old('relegion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Kristen' || old('relegion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Hindu" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Hindu' || old('relegion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Budha' || old('relegion') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Konghucu' || old('relegion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    <option value="Lainnya" {{ isset($job_seekers) && $job_seekers->relegion != null && $job_seekers->relegion == 'Lainnya' || old('relegion') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @if ($errors->first('relegion') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('relegion') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" name="npwp" id="npwp"
                                    class="form-control {{ $errors->first('npwp') != null ? 'is-invalid' : '' }}"
                                    placeholder="NPWP"
                                    value="{{ isset($job_seekers) && $job_seekers->npwp != null ? $job_seekers->npwp : old('npwp') }}">
                                @if ($errors->first('npwp') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('npwp') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sim">SIM</label>
                                        <select name="sim" id="sim"
                                            class="form-control {{ $errors->first('sim') != null ? 'is-invalid' : '' }}"
                                            required>
                                            <option value="">--Select SIM--</option>
                                            <option value="A" {{ isset($job_seekers) && $job_seekers->sim != null && $job_seekers->sim == 'A' || old('sim') == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B1" {{ isset($job_seekers) && $job_seekers->sim != null && $job_seekers->sim == 'B1' || old('sim') == 'B1' ? 'selected' : '' }}>B1</option>
                                            <option value="B2" {{ isset($job_seekers) && $job_seekers->sim != null && $job_seekers->sim == 'B2' || old('sim') == 'B2' ? 'selected' : '' }}>B2</option>
                                            <option value="C" {{ isset($job_seekers) && $job_seekers->sim != null && $job_seekers->sim == 'C' || old('sim') == 'C' ? 'selected' : '' }}>C</option>
                                            <option value="D" {{ isset($job_seekers) && $job_seekers->sim != null && $job_seekers->sim == 'D' || old('sim') == 'D' ? 'selected' : '' }}>D</option>
                                        </select>
                                        @if ($errors->first('sim') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('sim') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sim_number">SIM Number</label>
                                        <input type="text" name="sim_number" id="sim_number"
                                            class="form-control {{ $errors->first('sim_number') != null ? 'is-invalid' : '' }}"
                                            placeholder="Sim Number"
                                            value="{{ isset($job_seekers) && $job_seekers->sim_number != null ? $job_seekers->sim_number : old('sim_number') }}"
                                            required>
                                        @if ($errors->first('sim_number') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('sim_number') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Curiculum Vitae
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jobseeker_cv">Curiculum Vitae</label>
                                @if (isset($job_seekers) && $job_seekers->jobseeker_cv != '-')
                                    <span class="badge bg-primary form-control m-2 p-2">
                                        View Old CV <a href="{{asset('uploads/' . $job_seekers->jobseeker_cv)}}" target="_blank">here</a>
                                    </span>
                                @endif
                                <input type="file" accept=".pdf" name="cv" id="jobseeker_cv"
                                    class="form-control form-input {{ $errors->first('cv') != null ? 'is-invalid' : '' }}">
                                    <small><i>Type File : PDF</i></small>
                                @if ($errors->first('cv') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('cv') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('content-script')
    <script>
        $('#user_image').change(function(event) {
            $("#view-img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
        });
    </script>
@endsection
