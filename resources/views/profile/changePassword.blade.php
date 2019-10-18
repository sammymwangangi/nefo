@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title">Change Password</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
                <hr>
                <form class="form" method="post" action="{{ url('/profile/passwordChange/'.Auth::user()->id )}}">
                    {{csrf_field()}}
                    <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" class="form-control" placeholder="password" name="password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password">
                        </div>
                          @if($errors->has('password'))
                           <span class="danger text-muted">{{ $errors->first('password') }}</span>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="password_confirmation">Password Again</label>
                            <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password new">
                        </div>
                        @if($errors->has('password_confirmation'))
                                   <span class="danger text-muted">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop