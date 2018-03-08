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
                            <h5>Seleccione la empresa on la que desea trabajar.</h5>
                </div>
                <div class="ibox-content">
                     <form action="{{route('bienvenidousuario')}}" name='acceso' method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label for="estado" >Empresa</label>
                               <select name="rfc" id="rfc" class="form-control require" >
                                  <option value="">Selecciona Empresa 
                                        <?php 
                                        foreach($empresas as $fila)
                                        {
                                        ?>
                                        <option value="<?=$fila -> rfc ?>"><?=$fila -> nombre ?></option>
                                        <?php
                                        }
                                        ?>  
                                </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary block full-width m-b">Comenzar</button>
                        </div>
                    </form>
                   
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