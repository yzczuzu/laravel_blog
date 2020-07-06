@extends('layouts.base')

@section('content')
    <div class="container">
        @if(Auth::user())
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3" style= margin-right:25px;>
                            @if(Storage::has('avatar/'.Auth::user()->avatar_url))
                                <img src="{{url('accountImg', ['avatar_url' => Auth::user()->avatar_url])}}"
                                     class="img-responsive img-circle">
                            @endif

                        </div>
                        <div class="col-md-8">
                            <div style="font-size: 22px; color: #1b6d85;">{{Auth::user()->name}}</div>
                            <div><span>Email Address: </span><span
                                        style="font-size: 18px; color: #1b6d85;">{{Auth::user()->email}}</span></div>
                        </div>
                    </div>
                    <a href="{{url('toModifyAccount')}}" class="btn btn-info" style="margin-top: 20px"><i class="fa fa-pencil"></i>Modify Account</a>
                    <a href="{{url('toResetPassword')}}" class="btn btn-info" style="margin-top: 20px"><i class="fa fa-pencil"></i>Reset Password</a>
                </div>
            </div>
        @endif



    </div>
@endsection