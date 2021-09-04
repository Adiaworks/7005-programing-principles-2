<!DOCTYPE html>
<html>

<head>
  <title>FunDrive</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://s5273584.elf.ict.griffith.edu.au/a1/resources/views/css/styles.css"/>
</head>

<body>
  <div class="container">
    <div class="row" id="navbar">
      <a class="col-sm-3" href="{{url('list_vehicles')}}">Home</a>
      <a class="col-sm-3" href="{{url('list_users')}}">Clients</a>
      <a class="col-sm-3" href="{{url('book_a_vehicle')}}">Book</a>
      <a class="col-sm-3" href="{{url('documentation')}}">Documentation</a>
    </div>
    <div class="row" id="content">
      @yield('content')
    </div>  
  </div>    
</body>
</html>