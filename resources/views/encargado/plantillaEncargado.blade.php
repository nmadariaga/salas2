<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Encargado|Menu</title>
  <link href="{{ asset('/css/spacelab.css') }}" rel="stylesheet">
  <style>
  body {
    width: 700px;
    margin: 50px auto;
  }
  .badge {
    float: right;
  }
</style>
</head>
<body>
  {!!HTML::image('utem.png')!!}
  <h1>MENU ENCARGADO</h1>
  @yield('contenido')
</body>
</html>
