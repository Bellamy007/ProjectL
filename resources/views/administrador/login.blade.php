@extends('administrador.mnlogin')


@section('header')
@stop

@section('centro2')
<body class="gray-bg">
    <div class="middle-box text-center  animated fadeInDown" >
        <div style=" background-color: #f3f3f4;" class="col-md-12">
            <hr> 
            <h3>Bienvenido a GEM ELITE CONTPAC</h3>
            <p>Favor de colocar los datos correspondientes.</p>
            <form action="{{route('validaS')}}" name='acceso' method="post">
            {{csrf_field()}}
                <div class="form-group"> 
                    <input type="text" class="form-control" name='usuario' placeholder="Usuario" required/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control"  name='contrasena' placeholder="Contraseña" required/>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Accesar al sistema</button>
                <div id="msm"></div>
            </form>
             @if (Session::has('error'))
                        <div> <p class='alert alert-danger alert-dismissable'>{{Session::get('error')}}</p> </div>
                    @endif
            <a href="#"><small>Haz olvidado tu contraseña!!!</small></a>
            <br>
            <p class="text-muted text-center"><small>¿No tienes una cuenta?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="#">Registrate</a>
            <p class="m-t"> <small><a href="#"> GEM ELITE CONTPAC</a> &copy; 2018</small> </p>
           
        </div> 
    </div>
</body>   
@stop
