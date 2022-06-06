@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body text-center">
                    <img src="{{ Auth::user()->profile_pic}}" style="height: 250px;width: 250px">
                    <div class="card">
                 <form  action="/user-update/{{ Auth::user()->id }}" method="post">
                     @csrf 
                     <div class="card-header text-center "> 
                         
               <input class="w-100" type="text" name="profile_pic" value="{{ Auth::user()->profile_pic}}"> </div>

                <div class="card-body display-4">
                    <b>  Name:</b> <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>
                     
                  <div class="card-body display-4">
                    <b> Email:</b> {{Auth::user()->email}}
                </div>
                     
                  <div class="card-body display-4">
                      <b> Balance:</b> <input type="text" name="balance" value="{{ Auth::user()->balance}}"> $
                </div>
                     
                  
                     
                     <button class="btn btn-primary"> UPDATE</button>
                 </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
