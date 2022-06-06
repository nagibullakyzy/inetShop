@extends('items.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('items.update',$item->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{$item->name}}"class="form-control">
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" value="{{$item->description}}"class="form-control">
            </div>
        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" value="{{$item->price}}"class="form-control">
            </div>
        </div>
         
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Picture url:</strong>
                <input type="text" name="pic_url" value="{{$item->pic_url}}"class="form-control">
            </div>
        </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Producer:</strong>
                <select  name="producer_id" class="form-control" >
                     @foreach ($producers as $p)
                    <option <?php if ($p->id == $item->producer_id) echo 'selected'; ?> value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
             
             
        </div>
   
    </form>
    
    
      <?php 
    $cats = \App\Models\Category::all();
    ?>
         <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
             
             
            <th width="250px">Action</th>
        </tr>
        @foreach ($cats as $b)
               <?php
          $bool = 0;
foreach ($item->categories as $cat) {
    if($cat->id == $b->id){
        $bool = 1;
        
    }
   
}
             
            ?>
        
       
        
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->name }}</td>
             
        
            
            
            <td>
                 
              <form action="{{ route('assign_cat') }}" method="post">
              @csrf
              <input type="hidden"  name="cat_id" value="{{$b->id}}">
                    <input type="hidden" name="item_id" value="{{$item->id}}" >
              <?php if($bool == 0) {?>
              <div class="col-2"><button class="btn btn-success" style="height: 50px ; width: 50px; " >+</button> </div>
              <?php } else { ?>
              <div class="col-2"><button name="del" class="btn btn-danger" style="height: 50px ; width: 50px; ">-</button> </div>
              <?php } ?>
              
           
          </form>  
                
            </td>
        </tr>
        @endforeach
        
    </table>
          
      
            
 
    
    
@endsection