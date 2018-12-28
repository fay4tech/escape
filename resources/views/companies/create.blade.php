@extends('layouts.master')
@section('titel', 'Create')
@section('tiny')
    @include('layouts.partials._tiny_fr')
@endsection
@section('content')
    <div class="container-fluid">
            {!! form_start($form) !!}
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-4">
                    {!! form_row($form->name) !!}
                    {!! form_row($form->adress) !!}
                    {!! form_row($form->city) !!}
                    <div class="row">
                        <div class="col-sm-6">{!! form_row($form->region) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->zip) !!}</div>
                    </div>
                    {!! form_row($form->country) !!}
                    <div class="row">
                        <div class="col-sm-6">{!! form_row($form->open) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->close) !!}</div>
                    </div>
                    <p>Prices :</p>
                    <div class="row">
                        <div class="col-sm-6">{!! form_row($form->pricemin) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->pricemax) !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">{!! form_row($form->email) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->url) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->tel) !!}</div>
                        <div class="col-sm-6">{!! form_row($form->roomNb) !!}</div>
                    </div>

                </div>
                <div class="col-5">
                    {!! form_row($form->avis) !!}
                    {!! form_row($form->sale) !!}
                    {!! form_row($form->image) !!}
                    {!! form_row($form->submit) !!}
                    <a href="{{url("companies")}}" class="btn btn-info">Cancel</a>
                    <div>

                    </div>
                </div>
            </div>
            {!! form_end($form) !!}
    </div>



@endsection