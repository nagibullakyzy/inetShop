@extends('items.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('items.create') }}"> Add item</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="m-2 alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
              <th>Description</th>
             <th>Price</th>
              <th>Picture</th>
              <th>Producer</th>
              
            <th width="250px">Action</th>
        </tr>
        @foreach ($items as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->name }}</td>
              <td>{{ $b->description }}</td>
          <td>{{ $b->price }}</td>
             <td><img src="{{ $b->pic_url }}" height="150" width="100"></td>
             <td>{{ $b->producer->name }}</td>
            <td>
                <form action="{{ route('items.destroy',$b->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('items.edit',$b->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
      
      
@endsection

