 @extends('layouts.app')

@section('content')
    <div class="starter-template">
        <h1>{{$item->name}}</h1>

        <div class="jumbotron">
            
              <img class="col-12" src="{{$item->pic_url}}" style="width: 500px; height: 500px"><br>
              
             <p class="col-12">{{$item->price}} tenge</p><br>
             
             <p class="col-12">{{$item->description}}</p><br>
              <p class="col-12">{{$item->producer->name}}</p><br>
                       
                    @foreach($item->categories as $cat)
                    
                    <div class="btn btn-warning ml-2">{{$cat->name}}</div>
                    
                    @endforeach
                    
            </div>
           
            
            
            
         
       @endsection