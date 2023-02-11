<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">     
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>LifeBlog | Home </title>
    <style>
        .col-2{
            background-color: black; 
            height: 80vh;
        }
        .col-10{
            background-color: grey; 
            height: 80vh;
        }
        .navbar{
            background-color: #0dcaf0 !important;
        }
        .pos-f-t{
            margin-bottom: 1rem
        }
        .addUser{
            float: right;
            margin: 1px;
        }
        .user{
            padding: .5rem 5rem !important;
        }
    </style>
</head>
<body>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
      
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <a href="{{ route('blog.home') }}"><span class="navbar-toggler-icon"></span></a>
    </button>

     @include('layouts.navigation')
  </nav>
</div>
<div class="container">
    @yield('content')
</div>
<div class="footer">
    @yield('footer')
</div>
    
</body>
@yield('offbody')
</html>