@extends('layouts.master')
@section('titel', 'Admin')
@section('content')
    @if (Auth::check())
        <div class="container">
            {{-- count info --}}
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-sm-10 table-responsive">
                    <table class="table table-striped table-hover table-dark table-sm">
                        <caption>Count info</caption>
                        <thead class="thead-dark">
                            <tr style="font-size: 12px;">
                                <th>Rooms <i class="fa fa-home"></i>  => {{$countAll['room']}} Visible:
                                    <a href="{{route('share.index')}}"> {{$countAll['roomVue']}}</a>
                                    Non Visible: 
                                    <a href="{{route('share.show','-')}}"> {{$countAll['roomNoVue']}}</a>
                                </th>
                                <th>companies <i class="fa fa-building"></i>  =>  {{$countAll['company']}}</th>
                                <th>Users <i class="fa fa-user"></i>  =>  {{$countAll['user']}}</th>
                                <th>Total Views <i class="fa fa-eye"></i>  => <span class="" data-toggle="tooltip" data-html="true" data-placement="bottom" title="{{$sumView}} Vues">{{$countAll['roomVueFormat']}}</span></th>

                                
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>         
            {{-- end count info --}} 
            {{-- Button SiteMap --}}
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3 col-sm-12 mr-4">
                    <form method="GET" action="{{action('AdminUserController@siteMap')}}">
                        <button class="btn btn-light btn-sm  mb-2" type="submit">Generer le SiteMap</button>    
                    </form>
                </div>   
                {{-- End Button SiteMap --}}            
                {{-- Button escape.paris --}}
                <div class="col-md-3 col-sm-12 ml-4">
                    <a class="btn btn-success btn-sm  mb-2" role="button" aria-pressed="true" href="https://escapeplanner.fr/blog-update" target="_blank">Escape planner MAJ</a>
                </div>
                {{-- End Button escape.paris --}}
                <div class="col-3"></div>
            </div>

            {{-- Add new user --}}
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                        <caption><span class="text-white">Create new User</span></caption>
                        <form class="form-group" action="{{action('AdminUserController@store')}}" method="post">
                            @csrf
                            <tbody>
                                <tr class="form-group">
                                    <span class="text-white"  id="basic-addon1">Name <i class="fa fa-user"></i></span>
                                    <td><input class="form-control form-control-sm" type="text" id="name" name="name" value="{{old('name')}}" required style="min-width:130px" aria-describedby="basic-addon1"></td>
                                    <th><span class="text-white">Email <i class="fa fa-envelope-o"></i></span></th>
                                    <td><input class="form-control form-control-sm" type="email" placeholder="new@new.com" id="email" name="email" value="{{old('email')}}" required style="min-width:130px"></td>
                                    <th><span class="text-white">Password <i class="fa fa-lock"></i></span></th>
                                    <td><input class="form-control form-control-sm" type="password" id="password" name="password" min="6" required style="min-width:130px"></td>
                                    <th><span class="text-white">Confirm Password <i class="fa fa-lock"></i></span></th>
                                    <td><input class="form-control form-control-sm" type="password" id="confirm_password" name="confirm_password" min="6" required style="min-width:130px"></td>
                                    <th><span class="text-white">Company <i class="fa fa-suitcase"></i></span></th>
                                    <td>
                                        <select class="form-control-sm" id="company_id" name="company_id" style="min-width:130px">
                                            @foreach($companies as $key => $company)
                                                <option value="{{$key}}">{{$company}}</option>
                                            @endforeach
                                        </select>
                                    </td></br>    
                                    <th><span class="text-white">Level&nbsp;&nbsp;<i class="fa fa-level-up"></i>&nbsp;&nbsp;</span></th>                           
                                    <td>
                                        <select class="form-control-sm" id="lvl" name="lvl"  style="min-width:130px">
                                            <option value="1">Normal User</option>
                                            <option value="8">Admin Company</option>
                                            <option value="9">Editor</option>
                                            <option value="10">Super Admin</option>
                                        </select>
                                    </td></br>
                                    <th><span class="text-white" style="min-width:130px"><i class="fa fa-cog"></i></span></th>
                                    <td><button class="btn btn-primary btn-sm " type="submit">Add new User</button></td>
                                </tr>
                            </tbody>
                        </form>
                </div>
                <div class="col-1"></div>
            </div>

            <div class="row">
                {{--New User--}}
                @if($news->count()>0)
                    <div class="col-md-1"></div>
                    <div class="col-sm-10 table-responsive">
                        <table class="table table-striped table-hover table-dark table-sm">
                            <caption>List of New users</caption>
                            <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name <i class="fa fa-user"></i></th>
                                <th>Email <i class="fa fa-envelope-o"></i></th>
                                <th>Company <i class="fa fa-suitcase"></i></th>
                                <th>Level <i class="fa fa-level-up"></i></th>
                                <th>Date <i class="fa fa-calendar"></i></th>
                                <th>Activate <i class="fa fa-check-circle-o"></i></th>
                                <th colspan="2">Action <i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $new)
                                <tr>
                                    <td>{{$new['id']}}</td>
                                    <td><span class="" data-toggle="tooltip" data-html="true" data-placement="top" title="{{$new->last_login_at}}">{{$new['name']}}</span></td>
                                    <td>{{$new['email']}}</td>
                                    <td>{{$new->company['name']}}</td>
                                    <td>
                                        @switch($new['lvl'])
                                            @case(1)
                                            Normal User
                                            @break

                                            @case(8)
                                            Admin Company
                                            @break

                                            @case(9)
                                            Editor
                                            @break

                                            @case(10)
                                            Super Admin
                                            @break

                                            @default
                                            lvl: {{$new['lvl']}}
                                        @endswitch
                                    </td>
                                    <td>{{Carbon\Carbon::parse($new->created_at)->format('d-m-Y')}}</td>
                                    <td>
                                        <form action="{{action('AdminUserController@activate', $new['id'])}}" method="PUT">
                                            @csrf
                                            <input name="_method" type="hidden" value="activate">
                                            <input name="id" type="hidden" value="{{$new['id']}}">
                                            <button class="btn btn-warning btn-sm" type="submit">Activate</button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="text-dark">
                                            <a href="{{action('UserController@edit', $new['id'])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            {{--Delete btn with confirmation JQuery--}}
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#emodal{{$new['id']}}"><i class="fa fa-trash-o"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="emodal{{$new['id']}}" tabindex="-1" role="dialog" aria-labelledby="emodal{{$new['id']}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="emodal{{$new->id}}">Delete Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            You want realy Delete the User: {{$new['name']}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel Delete</button>
                                                            {!! Form::open(['route' => ['users.destroy', $new['id']], 'method' => 'DELETE', 'id' => 'confirm_delete' ]) !!}
                                                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--Edn delete btn--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                @else
                    <div class="col-md-1"></div>
                    <div class="col-sm-10 table-responsive">
                    <div class="align-items-center alert-info" style="height:40px;">
                        <h4 class="text-center">You have no new User</h4>
                    </div>
                    </div>
                    <div class="col-md-1"></div>
                @endif
                {{-- Active User --}}            
                <div class="col-md-1"></div>
                <div class="col-sm-10 table-responsive">
                    <table class="table table-striped table-hover table-dark table-sm">
                        <caption>List of users</caption>
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name <i class="fa fa-user"></i></th>
                            <th>Email <i class="fa fa-envelope-o"></i></th>
                            <th>Company <i class="fa fa-suitcase"></i></th>
                            <th>Level <i class="fa fa-level-up"></i></th>
                            <th>Date <i class="fa fa-calendar"></i></th>
                            <th>Activate <i class="fa fa-check-circle-o"></i></th>
                            <th>Action <i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['id']}}</td>
                                <td>
                                    <img src="{{asset('storage/app/public/' . str_replace('public','',$user->avatar))}}" style="width: 20px">
                                    <span class="" data-toggle="tooltip" data-html="true" data-placement="top" title="{{$user->last_login_at}}">{{$user['name']}}</span>
                                </td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user->company['name']}}</td>
                                <td>
                                    @switch($user['lvl'])
                                        @case(1)
                                        Normal User
                                        @break

                                        @case(8)
                                        Admin Company
                                        @break

                                        @case(9)
                                        Editor
                                        @break

                                        @case(10)
                                        Super Admin
                                        @break

                                        @default
                                        lvl: {{$user['lvl']}}
                                    @endswitch
                                </td>
                                <td>{{Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <form action="{{action('AdminUserController@activate', $user['id'])}}" method="PUT">
                                        @csrf
                                        <input name="_method" type="hidden" value="activate">
                                        <input name="id" type="hidden" value="{{$user['id']}}">
                                        <button class="btn btn-warning btn-sm" type="submit">Deactivate</button>
                                    </form>
                                </td>
                                <td>
                                    <div class="col-12 text-dark">
                                        {{--Delete btn with confirmation JQuery--}}
                                        <a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#emodal{{$user['id']}}"><i class="fa fa-trash-o"></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="emodal{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="emodal{{$user['id']}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="emodal{{$user['id']}}">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        You want realy Delete the User: {{$user['name']}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel Delete</button>
                                                        {!! Form::open(['route' => ['users.destroy', $user['id']], 'method' => 'DELETE', 'id' => 'confirm_delete' ]) !!}
                                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                {{--Edn delete btn--}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    @else
        {{session(['must_login'=>'must_login'])}}
        <script>window.location.href = "{{url('/')}}";</script>
    @endif
@endsection
@section('script')
    <script src="/js/tooltip.js"></script>
@endsection