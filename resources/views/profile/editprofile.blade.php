@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title">Edit Profile</h4>
        </div>
        <div class="card-body">
            <div class="card-block card-dashboard">
                <hr>
                <form class="form" method="post" action="{{ url('/profile/editprofile/'.Auth::id() )}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-sm-4 offset-sm-4 mb-3">
                            <img class="rounded-circle" src="{{asset('images/users/'.Auth::user()->avatar)}}" alt="user" style="height: 150px; width: 200px;">
                    </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="name"
                                           name="name" data-toggle="tooltip" data-trigger="hover"
                                           data-placement="top" data-title="name"
                                           value="{{$user->name ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                           data-toggle="tooltip" data-trigger="hover"
                                           data-placement="top" data-title="email"
                                           value="{{$user->email ?? ''}}">
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label  for="form-username">Profile Photo</label>
                                <input type="file" name="avatar" value="{{ $user->avatar }}" class="form-username form-control-file" >
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Save
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop