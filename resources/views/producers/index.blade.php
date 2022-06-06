@extends('producers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All producers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('producers.create') }}"> Add producer</a>
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
              <th>Country</th>
              <th>Company</th>
             
            <th width="250px">Action</th>
        </tr>
        @foreach ($producers as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->name }}</td>
             <td>{{ $b->country }}</td>
            <td>{{ $b->company }}</td>
        
            
            
            <td>
                <form action="{{ route('producers.destroy',$b->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('producers.edit',$b->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
      
      
@endsection

