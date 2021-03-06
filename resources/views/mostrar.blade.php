<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <title>Buscar Perfil de Usuario</title>

    </head>
    <body>

<div class="container">
<div class="row">
  <div class="col-md-12">
    <h3>{{ $msg ?? "" }}</h3>
    @if(isset($perfil))
      <h3>Perfil</h3>
      <p>User ID: {{$perfil->user_id}}</p>
      <p>Bio: {{$perfil->bio}}</p>
      <p>Technologies: {{$perfil->technologies}}</p>
      <p>Company: {{$perfil->company}}</p>
      <a href="{{url('mostrar/'.$perfil->user_id)}}"><button class="btn btn-success">Ver Articulos</button></a>

    @endif
      <div class="form-group">



        <h1 clas="h1">Buscar Perfil de un Usuario</h1>
        <form action="perfiluser" method="post">
          {{csrf_field()}}
          <label for="id">User ID</label>
          <input type="text" name="id" class="form form-control">
          <br/>
          <button type="submit" class="btn btn-info">Enviar</button>
        </form>


      </div>
    </div>
</div>
</div>



      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
