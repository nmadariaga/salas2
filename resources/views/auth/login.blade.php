<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Sistema</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<center><img src="{{ asset('/img/logo_utem.jpg') }}"></center>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>

                </li>
                <li>

                </li>
                <li>

                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Bienvenido</h1>
                <h2>
                    Por favor inice sesión
                </h2>
                <br>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul>
                        <li>
                            <input type="text" placeholder="RUT" name="rut" value="{{ old('rut') }}" />
                        </li>
                        <li>
                            <input type="password" placeholder="Contraseña" name="password" />
                        </li>
                        <li>
                            <input type="submit" value="Entrar" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#login.form-action-->
            @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>
