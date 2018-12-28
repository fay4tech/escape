@extends('layouts.master')

@section('titel', 'Share')

@include('layouts.partials._flash')

@section('content')
    <div class="row">
        <div class="col-12 text-center h4 text-light">Liste des Salles Visible</div>
    </div>
    <div class="row container">
        <div class="col-3">
            <span class="Text-light"> vers la version Json : </span>
            <a class="" href="{{route('getJson')}}" target="_blank" role="button">
                    <img class="img-rounded w-25" src="{!! asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','','default/json.png')) !!}" class="img-thumbnail" alt="Json"/>
            </a>
            {{-- Pub Google --}}
                <div class="row">
                    <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Escape -->
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-8411028629670447"
                            data-ad-slot="9328971908"
                            data-ad-format="auto"
                            data-full-width-responsive="true">
                        </ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            {{-- End Pub Google--}}
        </div>
        <div class="col-9">
            <table class="table table-striped table-dark table-sm table-bordered">
                <thead>
                  <tr class="text-center">
                    <th scope="col" class="small">Url</th>
                    <th scope="col" class="small">nom Salle</th>
                    <th scope="col" class="small">nom Enseigne</th>
                    <th scope="col" class="small">Région</th>
                    <th scope="col" class="small">note globale</th>
                    <th scope="col" class="small">Note Immersion</th>
                    <th scope="col" class="small">Note Énigme</th>
                    <th scope="col" class="small">On a aimé</th>
                    <th scope="col" class="small">On a pas aimé</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <th scope="row" class="small">
                                <a href="{{ route('rooms.show', $room->id) }}">{{ route('rooms.show', $room->id) }}</a>                                
                            </th>
                            <td class="small">{{$room->name}}</td>
                            <td class="small">{{$room->company_name}}</td>
                            <td class="small">{{$room->company_region}}</td>
                            <td class="small">{{$room->note_g}}</td>
                            <td class="small">{{$room->note_i}}</td>
                            <td class="small">{{$room->note_e}}</td>
                            <td class="small">{!!$room->positive!!}</td>
                            <td class="small">{!!$room->negative!!}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    


@endsection
@section('script')
    <script src="/js/image.js"></script>
})
@endsection