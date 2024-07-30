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
                <form action="" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="date_birth" id="date_birth"
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
                                        {{ isset($job_seekers) && $job_seekers->gender != null && $job_seekers->gender == 'L' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="P"
                                        {{ isset($job_seekers) && $job_seekers->gender != null && $job_seekers->gender == 'P' ? 'selected' : '' }}>
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
                                <select name="religion" id="religion"
                                    class="form-control {{ $errors->first('religion') != null ? 'is-invalid' : '' }}"
                                    required>
                                    <option value="">--Select Religion--</option>
                                </select>
                                @if ($errors->first('religion') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('religion') }}
                                    </div>
                                @endif
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
                                <input type="file" name="jobseeker_cv" id="jobseeker_cv" class="form-control form-input {{ $errors->first('jobseeker_cv') != null ? 'is-invalid' : '' }}">
                                @if ($errors->first('jobseeker_cv') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jobseeker_cv') }}
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
