@extends('administrador.mnlogin')


@section('header')
@stop

@section('centro2')
 <body class="login-bg" >
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6" >
                <h2 class="font-bold">Bienvenido a <br> GEM ELITE CONTPAC</h2>
                <hr>
                <p>
                    Tus datos estan protegidos.
                </p>
                <p>
                   Sistema facil de usar.
                </p>
                <p>
                    Administración empresarial.
                </p>
                <p>
                    Administración operativa.
                </p>
            </div>
            <div class="col-md-6">
                 <div class="ibox-title">
                            <h5>Inicio de sesión miembro.</h5>
                </div>
                <div class="ibox-content">
                     <form action="{{route('valida')}}" name='acceso' method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name='usu'  placeholder="Nombre de Usuario" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name='contrasena'  placeholder="Contraseña" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Acceder</button>
                         </form>
                        @if (Session::has('error'))
                            <div> <p class='alert alert-danger alert-dismissable'>{{Session::get('error')}}</p> </div>
                        @endif
                        <a href="#"> <small>Haz olvidado tu contraseña?</small> </a>

                        <p class="text-muted text-center"> <small>¿No tienes una cuenta?</small>      </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{route('registro')}}">Crea una cuenta</a>
                   
                    <p class="m-t">
                        <small>GEM ELITE CONTPAC &copy; 2018</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</body>
@stop