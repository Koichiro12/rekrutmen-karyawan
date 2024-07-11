@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="avatar avatar-xl mb-3">
                            <img src="{{$user->user_image != '-' ? asset('uploads/'.$user->user_image) : asset('/').'assets/compiled/jpg/5.jpg' }}" class="img" width="100%">
                        </div>
                        
                        <h3>{{$user->name}} </h3>
                        <small>{{$user->email}}</small><br>
                        <span class="badge bg-success">{{$user->role}}</span>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                           Update Profile
                        </h4>
                    </div>
                    <form action="{{ route('updateProfile') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_image">Profile Image</label>
                                <br>
                                <img src="{{$user->user_image != '-' ? asset('uploads/'.$user->user_image) : asset('/').'assets/compiled/jpg/5.jpg' }}" class="img my-2" width="100"  id="view-img">
                                
                                <input type="file" name="user_image" id="user_image" class="form-input form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="user_phone">Phone Number</label>
                                <input type="text" name="user_phone" id="user_phone" class="form-control"
                                    placeholder="Phone Number" value="{{ $user->user_phone }}">
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
    $('#user_image').change( function(event) {
        $("#view-img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
  </script>
      
@endsection
