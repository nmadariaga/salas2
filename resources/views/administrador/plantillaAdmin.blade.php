<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Administrador|Menu</title>
  <link href="{{ asset('/css/flatly.css') }}" rel="stylesheet">
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
  <p>
  <h1>MENU ADMINISTRADOR</h1>
  <p>
  @yield('contenido')
</body>
</html>
