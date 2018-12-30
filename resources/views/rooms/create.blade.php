@extends('layouts.master')
@section('titel', 'créer une mission')
@auth
@section('tiny')
    @include('layouts.partials._tiny_fr')
@endsection
@section('content')
    @php
        $pitch = 'pitch_'.config('app.locale');
        $theme = 'theme_'.config('app.locale');
        $resum = 'resum_'.config('app.locale');
        $avis = 'avis_'.config('app.locale');
        $positive = 'positive_'.config('app.locale');
        $negative = 'negative_'.config('app.locale');
    @endphp

    <div class="container text-light">

        {!! form_start($form) !!}

        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-5 col-sm-12">

                {!! form_row($form->name) !!}

                {!! form_row($form->$theme) !!}

                <div class="row">

                    <div class="col-md-6 col-sm-12">

                        {!! form_row($form->lvl) !!}

                        {!! form_row($form->company_id) !!}

                    </div>

                    <div class="col-md-3 col-sm-6">

                        {!! form_row($form->maxplayers) !!}

                        {!! form_row($form->timeplay) !!}

                    </div>

                    <div class="col-md-3 col-sm-6">

                        {!! form_row($form->minplayers) !!}

                        {!! form_row($form->success) !!}

                    </div>

                    <div class="col-sm-10">

                        <div class="form-group">

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-group col-md-7 col-sm-12">

                {!! form_row($form->activ) !!}

                {!! form_row($form->$resum) !!}

                {!! form_row($form->image) !!}

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                {!! form_row($form->$pitch) !!}
            </div>
        </div>

        <div class="alert alert-info text-center mb-0 ">

            <h4 class="alert-heading"><strong>Notre expérience !</strong></h4>

        </div>

        <div class="row">

            <div class="col-12">

                {!! form_row($form->$avis) !!}

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 col-sm-12">

                {!! form_row($form->$positive) !!}

            </div>

            <div class="col-md-6 col-sm-12">

                {!! form_row($form->$negative) !!}

            </div>

        </div>

        <div class="row">

            <div class="col-md-4 col-sm-12">

                {!! form_row($form->teams) !!}

                <div class="d-inline-flex">

                    {!! form_row($form->enigmas) !!}
                    <spam class="mx-1"> </spam>
                    {!! form_row($form->enigmas_ench) !!}

                </div>

                <div class="d-inline-flex">

                    {!! form_row($form->enigmas_quant) !!}
                    <spam class="mx-1"> </spam>
                    {!! form_row($form->enigmas_orig) !!}

                </div>

            </div>

            <div class="col-md-4 col-sm-12">
                <div class="d-inline-flex">
                    {!! form_row($form->wins) !!}
                    <spam class="mx-1"> </spam>
                    {!! form_row($form->timePlayMax) !!}

                </div>

                {!! form_row($form->immersion) !!}

                <div class="d-inline-flex">

                    {!! form_row($form->immersion_ambi) !!}
                    <spam class="mx-1"> </spam>
                    {!! form_row($form->immersion_hist) !!}

                </div>

            </div>

            <div class="col-md-4 col-sm-12">

                {!! form_row($form->playDate) !!}
                <spam class="mx-1"> </spam>
                {!! form_row($form->search) !!}

                <div class="d-inline-flex">

                    {!! form_row($form->divertissement) !!}
                    <spam class="mx-1"> </spam>
                    {!! form_row($form->note_mj) !!}

                </div>

            </div>
            <div class="col-md-3 col-sm-6">
                {!! form_row($form->dispo_id) !!}
            </div>

        </div>
        <div>

            {!! form_row($form->submit) !!}

            <a href="{{url("rooms")}}" class="btn btn-info">Cancel</a>

        </div>

        {!! form_end($form, false) !!}

    </div>

@endsection

@endauth

