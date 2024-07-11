@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Jobs
                        </h4>
                        <div class="card-tools">
                            <a href="#" name="create" id="create" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
