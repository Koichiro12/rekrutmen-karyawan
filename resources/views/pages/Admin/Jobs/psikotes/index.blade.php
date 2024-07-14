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
                        <div class="card-tools">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah" name="create"
                                id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Test</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($psikotest as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><b> Question: </b> <br>
                                            {{ $item->question }}
                                            <br>
                                            <b>Answer :</b> {{ $item->answer }}
                                            <hr>
                                            <b>Optional</b><br>
                                            <ul>
                                                <li>A. {{ $item->option_a }}</li>
                                                <li>B. {{ $item->option_b }}</li>
                                                <li>C. {{ $item->option_c }}</li>
                                                <li>D. {{ $item->option_d }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <form action="{{route('delete_psikotest',$item->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit-{{$item->id}}" class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger form-confirm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Create Psikotest </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{route('store_psikotest')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="jobs_id" id="jobs_id" value="{{$id}}">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" name="question" value="{{old('question')}}" id="question" class="form-control form-input"
                                    placeholder="Questions" required>
                                    @if ($errors->first('question') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('question') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>A.</h5>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option_a" value="{{old('option_a')}}" id="option_a" class="form-control form-input"
                                            placeholder="Option Answer A" required>
                                            @if ($errors->first('option_a') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('option_a') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>B.</h5>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option_b" value="{{old('option_b')}}" id="option_b" class="form-control form-input"
                                            placeholder="Option Answer B" required>
                                            @if ($errors->first('option_b') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('option_b') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>C.</h5>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option_c" value="{{old('option_c')}}" id="option_c" class="form-control form-input"
                                            placeholder="Option Answer C" required>
                                            @if ($errors->first('option_c') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('option_c') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>D.</h5>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option_d" value="{{old('option_d')}}" id="option_d" class="form-control form-input"
                                            placeholder="Option Answer D" required>
                                            @if ($errors->first('option_d') != null)
                                            <div class="invalid-feedback">
                                                {{ $errors->first('option_d') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <select name="answer" id="answer" class="form-control form-input" required>
                                    <option value="">-- Choose Option --</option>
                                    <option value="A" {{old('answer') != null && old('answer') == 'A' ? 'selected' : ''}}>A</option>
                                    <option value="B" {{old('answer') != null && old('answer') == 'B' ? 'selected' : ''}}>B</option>
                                    <option value="C" {{old('answer') != null && old('answer') == 'C' ? 'selected' : ''}}>C</option>
                                    <option value="D" {{old('answer') != null && old('answer') == 'D' ? 'selected' : ''}}>D.</option>
                                </select>
                                @if ($errors->first('answer') != null)
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary"> <span
                                    class="d-none d-sm-block">Save</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach ($psikotest as $item)
            <div class="modal fade text-left" id="modalEdit-{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Psikotest </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{route('update_psikotest',$item->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="jobs_id" id="jobs_id" value="{{$id}}">
                                    <label for="question">Question</label>
                                    <input type="text" name="question" value="{{$item->question}}" id="question" class="form-control form-input"
                                        placeholder="Questions" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <h5>A.</h5>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="option_a" id="option_a"
                                                class="form-control form-input" value="{{$item->option_a}}" placeholder="Option Answer A" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <h5>B.</h5>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="option_b" id="option_b"
                                                class="form-control form-input" value="{{$item->option_b}}" placeholder="Option Answer B" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <h5>C.</h5>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="option_c" id="option_c"
                                                class="form-control form-input" value="{{$item->option_c}}" placeholder="Option Answer C" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <h5>D.</h5>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="option_d" id="option_d"
                                                class="form-control form-input" value="{{$item->option_d}}" placeholder="Option Answer D" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <select name="answer" id="answer" class="form-control form-input" required>
                                        <option value="">-- Choose Option --</option>
                                        <option value="A" {{$item->answer == 'A' ? 'selected' : ''}}>A</option>
                                        <option value="B" {{$item->answer == 'B' ? 'selected' : ''}}>B</option>
                                        <option value="C" {{$item->answer == 'C' ? 'selected' : ''}}>C</option>
                                        <option value="D" {{$item->answer == 'D' ? 'selected' : ''}}>D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary"> <span
                                        class="d-none d-sm-block">Save</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
