@extends('layouts.master')
@section('titel', 'Change Password')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-md-4 col-md-offset-4">
                <div class="card-title text-center bg-primary mb-0">
                    <h3><strong>{{ucfirst(Auth()->user()->name)}} Password edit</strong></h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading text-center bg-info mt-0"><strong>Change password</strong></div>
                        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-12">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">New Password</label>
                                <div class="col-md-12">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>
                                    @if ($errors->has('new-password'))
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new-password-confirm" class="col-md-12 control-label">Confirm New Password</label>
                                <div class="col-md-12">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Change Password
                                    </button>
                                    <a href="{{url("users")}}" class="btn btn-info btn-block">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection