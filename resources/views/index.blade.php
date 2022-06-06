 @extends('layouts.app')

@section('content')
    <div class="starter-template">
        <h1>All items</h1>

        <div class="row">
            
            
            @foreach($items as $item)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="labels">


                    </div>
                    <img src="{{$item->pic_url}}" style="width: 250px; height: 250px">
                    <div class="caption">
                        <h3>{{$item->name}}</h3>
                        <p>{{$item->price}} tenge</p>
                        <p>
                        <form action="/product" method="POST">
                            <button type="submit" class="btn btn-primary" role="button">Add to card</button>
                            <a href="/item_details/{{$item->id}}"
                               class="btn btn-info"
                               role="button">Details</a>
                          
                        </form>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            
            
            
         
       @endsection