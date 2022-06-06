 <?php 
 if ( Auth::check()){
     if (Auth::user()->role_id == 2){
         
         
     }
 else {
         die()   ;
     }
     
     
 }
 else {
        die()   ;
}
 
 ?>
 <!DOCTYPE html>
<html>
<head>
<title>Animes </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md  shadow-sm" style="background-color: #cccccc; color: white;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                    ADMIN PANEL
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/producers">Producers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/items">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/categories">Categories</a>
                        </li>
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        @if (Auth::check())
                        @if (Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link"style=" color: white;" href="admin">Admin</a>
                        </li>
                        @endif
                        @endif

                        @guest
                        <li class="nav-item">
                            <a class="nav-link"style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif


                        @endguest
                    </ul>
                </div>
            </div>
   </nav>

   <div class="container">
       @yield('content')
   </div>


</body>
</html>