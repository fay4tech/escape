@extends('layouts.master')
@section('titel', 'Profile')
@section('content')
    @auth
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-sm-3">
                <div class="card" style="width:320px">
                    <img class="card-img-top mx-auto d-block" src="{{asset('storage/app/public/' . str_replace('public','',auth()->user()->avatar))}}" alt="{{auth()->user()->name}}" style="width: 50%">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{auth()->user()->name}}</h4>
                        <p class="card-text">{{auth()->user()->email}}</p>
                        <p>Company: <br/><a href="{{url('companies/'.$company->id)}}">{{ucfirst($company->name)}}</a></p>
                        <p class="card-text">Member since:</p>
                        <p class="card-title">{{auth()->user()->created_at}}</p>
                        <a href="{{route('users.edit', auth()->user()->id)}}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
    @endauth
@endsection
