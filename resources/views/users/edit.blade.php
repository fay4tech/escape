@extends('layouts.master')
@section('titel', 'edit Profile')
@auth
    @section('content')
        <div class="container align-content-center">
            @include('flash::message')
            {!! form_start($form) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-4"></div>
                <div class="col-sm-4">
                    <div class="card-title text-center bg-primary">
                        <h3><strong>{{ucfirst($user->name)}} Profile edit</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! form_row($form->name) !!}
                        {!! form_row($form->email) !!}
                        @if(auth()->user()->lvl == 10 )
                            {!! form_row($form->lvl) !!}
                            {!! form_row($form->company_id) !!}
                        @endif
                        <div class="form-check mt-lg-3">
                            <div class="row">
                                @foreach($avatars as $avatar)
                                    <div class="col-3">
                                        <input class="custom-checkbox" type="radio" name="avatar" id="avatar" value="{{$avatar}}"
                                               @if($avatar == $user->avatar)
                                               checked
                                                @endif
                                        >
                                        <label class="form-check-label pr-4" for="{{$avatar}}">
                                            <img src="{{asset('storage/app/public/' . str_replace('public','',$avatar))}}" width="50px">
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-block btn-secondary text-danger" href="/changePassword">Change Password</a>
                    {!! form_row($form->submit) !!}
                    <a href="{{url("rooms")}}" class="btn btn-info btn-block">Cancel</a>
                </div>
                <div class="col-4">
                </div>
            </div>
            {!! form_end($form, false) !!}
        </div>
    @endsection
@endauth
