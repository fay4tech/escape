@extends('layouts.master')
@section('titel', 'About Us edit')
@auth
@section('tiny')
    @include('layouts.partials._tiny_fr')
@endsection
@section('content')
    <div class="container text-light">
        Editer
        <div class="col-12">
            <div class="col-3"></div>
            <div class="col-9">
                {!! Form::open(['route' => ['about.update', $text['id']], 'method' => 'PUT', 'id' => 'edit' ]) !!}
                
                    @csrf
                    
                    <div class="form-group">
                        <label for="titel">Titre</label> 
                        <input id="titel" name="titel" value="{{ $text->titel }}" type="text" class="form-control here">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label> 
                        <textarea id="text" name="text" rows="40" aria-describedby="commentHelpBlock" class="form-control">{{ $text->text }}</textarea>
                    </div> 
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Editer</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>    
    </div>

@endsection
@endauth
