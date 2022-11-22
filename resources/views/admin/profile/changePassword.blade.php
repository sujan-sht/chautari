@extends('admin.includes.main')
@section('title')Profile Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<form action="{{route('profile.update_password')}}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.message')
                            
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Current Password</label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success float-right">Change Password</button>
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection