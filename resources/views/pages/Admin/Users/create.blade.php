@extends('layouts.app')
@section('content')
    <section class="section">
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
                            Create Users
                        </h4>
                    </div>
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <br>
                                <img src="{{ asset('/') . 'assets/compiled/jpg/5.jpg' }}" class="img my-2" width="100"
                                    id="view-img">

                                <input type="file" name="foto" id="user_image" accept="image/*,image/png,image/jpeg"
                                    class="form-input form-control {{ $errors->first('foto') != null ? 'is-invalid' : '' }}">
                                @if ($errors->first('foto') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('foto') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->first('name') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control {{ $errors->first('username') != null ? 'is-invalid' : '' }}"
                                    placeholder="Username" value="{{ old('username') }}">
                                @if ($errors->first('username') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control {{ $errors->first('email') != null ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->first('email') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control {{ $errors->first('password') != null ? 'is-invalid' : '' }}"
                                    placeholder="Password">
                                @if ($errors->first('password') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="user_phone">Phone Number</label>
                                <input type="text" name="user_phone" id="user_phone"
                                    class="form-control {{ $errors->first('user_phone') != null ? 'is-invalid' : '' }}"
                                    placeholder="Phone Number" value="{{ old('user_phone') }}">
                                @if ($errors->first('user_phone') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('user_phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">-- Choose Roles --</option>
                                    <option value="User" {{ old('role') != null && old('role') == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Admin" {{ old('role') != null && old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @if ($errors->first('role') != null)
                                    <div class="invalid-feedback">
                                        {{ $errors->first('role') }}
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
@section('content-script')
    <script>
        $('#user_image').change(function(event) {
            $("#view-img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
        });
    </script>
@endsection
