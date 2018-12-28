@extends('layouts.master')
@section('titel', 'Search')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h3 class="text-center badge-secondary">
                    Résultats!.
                </h3>
                <button class="btn btn-outline-primary my-2 my-sm-0 mr-3 btn-block"
                        type="submit"
                        onclick="location.href = '{{url('/search/filter')}}';"
                        >
                    Filtres
                </button>

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-dark">
                            <h5 class="card-header">
                                Nous avons trouvé {{$rooms->total()}} missions
                            </h5>
                            <div class="card-body bg-light">
                                @foreach($rooms as $room)
                                    <p class="card-text text-dark">
                                        Mission : 
                                        <a href="{{url("rooms/$room->id")}}">{{$room->name}}</a>
                                    </p>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <p>{{ $rooms->links() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-dark">
                            <h5 class="card-header">
                                Nous avons trouvé {{$companies->total()}} enseignes
                            </h5>
                            <div class="card-body bg-light">
                                @foreach($companies as $company)
                                    <p class="card-text text-dark">
                                        Enseigne:
                                        <a href="{{url("companies/$company->id")}}"> {{$company->name}}</a>
                                    </p>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <p>{{ $companies->links() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection