<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema nuticionista | Login</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-12 text-center">
            <h2 class="font-bold">Bienvenido a Materia System</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    Por favor corrige los siguientes errores:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-6 vcenter text-center">
            <img style="max-height: 300px" src="{{ asset('img/materia verde.png') }}" alt="">
        </div><!--
     --><div class="col-md-6 vcenter">
            <div class="ibox-content vcenter" >

                <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Username" name="email" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#">
                        <small>Forgot password?</small>
                    </a>
                </form>
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright Zangles
        </div>
        <div class="col-md-6 text-right">
            <small>© 2017</small>
        </div>
    </div>
</div>



<!-- Mainly scripts -->
<script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>

</html>