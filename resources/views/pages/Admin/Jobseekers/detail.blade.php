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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Job
                                </h4>

                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Name</td>
                                        <td>: {{ $jobs_data->job_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Departement</td>
                                        <td>: {{ $jobs_data->departement }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>: {{ $jobs_data->position }}</td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Education</td>
                                        <td>: {{ $jobs_data->min_education }}</td>

                                    </tr>
                                    <tr>
                                        <td>Major Educations</td>
                                        <td>: {{ $jobs_data->major_education }}</td>
                                    </tr>
                                    <tr>
                                        <td>Max Age</td>
                                        <td>: {{ $jobs_data->max_age }} Years</td>
                                    </tr>
                                    <tr>
                                        <td>Recruitment Time</td>
                                        <td>: {{ date_format(date_create($jobs_data->open_date), 'd M Y') }} s/d
                                            {{ date_format(date_create($jobs_data->close_date), 'd M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Recruitment </td>
                                        <td>: @switch($jobs_data->status)
                                                @case(0)
                                                    <span class="badge bg-danger">Closed</span>
                                                @break

                                                @case(1)
                                                    <span class="badge bg-success">Open</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Desc</td>
                                        <td>: {{ $jobs_data->job_desc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Criteria</td>
                                        <td>: {{ $jobs_data->job_criteria }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Photo
                                </div>
                            </div>
                            <div class="card-body">
                                <img src="{{ isset($jobseeker_data) && $jobseeker_data->jobseeker_image != '-' && $jobseeker_data->jobseeker_image != null ? asset('uploads/' . $jobseeker_data->jobseeker_image) : asset('/') . 'assets/compiled/jpg/5.jpg' }}"
                                    class="img my-2 " width="100%">
                                <br>
                                <div class="text-center">
                                    <h3>{{ $jobseeker_data->name }}</h3>
                                    <small>Apply Date : {{ $apply_data->date_apply }}</small>
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <a href="{{ isset($jobseeker_data) && $jobseeker_data->jobseeker_cv != '-' && $jobseeker_data->jobseeker_cv != null ? asset('uploads/' . $jobseeker_data->jobseeker_cv) : '#' }}"
                                        class="btn btn-primary form-control">Curiculum Vite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Jobseekers Information
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td width="20%">NIK</td>
                                        <td colspan="3">: {{ $jobseeker_data->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Name</td>
                                        <td colspan="3">: {{ $jobseeker_data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Place</td>
                                        <td>: {{ $jobseeker_data->place_birth }}</td>
                                        <td width="20%">Date </td>
                                        <td>: {{ date_format(date_create($jobseeker_data->date_birth), 'd M, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Gender</td>
                                        <td colspan="3">: {{ $jobseeker_data->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Address</td>
                                        <td colspan="3">: {{ $jobseeker_data->address }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Domisili</td>
                                        <td colspan="3">: {{ $jobseeker_data->domisili }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Phone Number</td>
                                        <td colspan="3">: {{ $jobseeker_data->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Email</td>
                                        <td colspan="3">: {{ $jobseeker_data->email }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Status Residence</td>
                                        <td colspan="3">: {{ $jobseeker_data->status_residence }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Citizen</td>
                                        <td colspan="3">: {{ $jobseeker_data->citizen }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Religion</td>
                                        <td colspan="3">: {{ $jobseeker_data->relegion }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Married Status</td>
                                        <td colspan="3">: {{ $jobseeker_data->married_status }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">NPWP</td>
                                        <td colspan="3">: {{ $jobseeker_data->npwp }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">SIM type</td>
                                        <td colspan="3">: {{ $jobseeker_data->sim }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">SIM Number</td>
                                        <td colspan="3">: {{ $jobseeker_data->sim_number }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Educations
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Last Education</th>
                                            <th>School Name</th>
                                            <th>City</th>
                                            <th>Major</th>
                                            <th>Period</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($education_data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <p>{{ $item->last_education }}</p>
                                                    </td>
                                                    <td>
                                                        {{ $item->school_name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->city }}
                                                    </td>
                                                    <td>{{ $item->major_education }}</td>
                                                    <td>
                                                        {{ date_format(date_create($item->start_year), 'M Y') }} -
                                                        {{ date_format(date_create($item->end_year), 'M Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Experience
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Last Departement</th>
                                            <th>Company Name</th>
                                            <th>Position</th>
                                            <th>Period</th>
                                            <th>Salary & Facility</th>
                                            <th>Reason Stop</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($experience_data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <p>{{ $item->last_job_departement }}</p>
                                                    </td>
                                                    <td>
                                                        {{ $item->company_name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->last_job_position }}
                                                    </td>
                                                    <td>
                                                        {{ date_format(date_create($item->start_job), 'M Y') }} -
                                                        {{ date_format(date_create($item->end_job), 'M Y') }}
                                                    </td>
                                                    <td>Salary : Rp.{{ number_format($item->salary) }},- <br> Facility :
                                                        {{ $item->last_job_facility }}</td>
                                                    <td>{{ $item->reason_stop_working }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Skills
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Skills</th>
                                            <th>Level</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($skill_data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <p>{{ $item->skills }}</p>
                                                    </td>
                                                    <td>
                                                        {{ $item->skill_level }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Training
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Training</th>
                                            <th>Certification</th>
                                            <th>Organizer</th>
                                            <th>Year Of Training</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($training_data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <p>{{ $item->training }}</p>
                                                    </td>
                                                    <td>
                                                        {{ $item->certification }}
                                                    </td>
                                                    <td>
                                                        {{ $item->organizer }}
                                                    </td>
                                                    <td>
                                                        {{ $item->year_of_training }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Test
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Name Of Test</th>
                                            <th>Score</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Test</td>
                                                <td>{{ $apply_data->test_result }}</td>
                                                <td> @switch($apply_data->test_status)
                                                        @case(0)
                                                            <span class="badge bg-danger">Not Yet</span>
                                                        @break

                                                        @case(1)
                                                            <span class="badge bg-warning">Waiting</span>
                                                        @break

                                                        @case(2)
                                                            <span class="badge bg-success">Pass</span>
                                                        @break

                                                        @case(3)
                                                            <span class="badge bg-danger">Failed</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @if ($apply_data->test_status == 1)
                                                        <a href="{{ route('pass_test', $apply_data->id) }}"
                                                            class="btn btn-sm btn-success a-confirm">Pass</a>
                                                        <a href="{{ route('fail_test', $apply_data->id) }}"
                                                            class="btn btn-sm btn-danger a-confirm">Fail</a>
                                                    @else
                                                        <span class="badge bg-danger">No Action</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Psikotest</td>
                                                <td>{{ $apply_data->psikotes_result }}</td>
                                                <td> @switch($apply_data->psikotes_status)
                                                        @case(0)
                                                            <span class="badge bg-danger">Not Yet</span>
                                                        @break

                                                        @case(1)
                                                            <span class="badge bg-warning">Waiting</span>
                                                        @break

                                                        @case(2)
                                                            <span class="badge bg-success">Pass</span>
                                                        @break

                                                        @case(3)
                                                            <span class="badge bg-danger">Failed</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @if ($apply_data->psikotes_status == 1)
                                                        <a href="{{ route('pass_psikotest', $apply_data->id) }}"
                                                            class="btn btn-sm btn-success a-confirm">Pass</a>
                                                        <a href="{{ route('fail_psikotest', $apply_data->id) }}"
                                                            class="btn btn-sm btn-danger a-confirm">Fail</a>
                                                    @else
                                                        <span class="badge bg-danger">No Action</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($apply_data->status_apply == 0)
                                    <a href="{{ route('pass_selection', $apply_data->id) }}"
                                        class="btn btn-sm btn-success a-confirm">Pass Selection</a>
                                    <a href="{{ route('fail_selection', $apply_data->id) }}"
                                        class="btn btn-sm btn-danger a-confirm">Fail Selection</a>
                                @endif
                                @if ($apply_data->status_apply == 1)
                                <a href="{{ route('hired', $apply_data->id) }}"
                                    class="btn btn-sm btn-success a-confirm">Hired</a>
                                <a href="{{ route('not_recruit', $apply_data->id) }}"
                                    class="btn btn-sm btn-danger a-confirm">Not Recruit</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
