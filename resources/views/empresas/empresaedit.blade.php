@extends('sistema.estructura.app')
@section('contenido')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
                    <h4> Modificar Empresa</h4>
                    	<hr>
            <div class="row">
                <div class="col-md-12 panel-info">
                    <div class="content-box-large box-with-header">
                        <!-- Inicio del formulario -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error) 
                        {{$error}}<br>
                        @endforeach
                        @endif
                            <div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Nombre</label>
                                         <input type="hidden" class="form-control" name="id_empresa"  value="{{$consulta->id_empresa}}">
                                        <input type="text" name="nombre"  class="form-control mayus" value="{{$consulta->nombre}}" onkeypress="return soloLetras(event)" required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>RFC</label>
                                        <input type="text" name="rfc"  class="form-control mayus" value="{{$consulta->rfc}}" onkeypress="return nof(event)" style='text-transform:uppercase;' minlength="12" maxlength="13" required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Domicilio</label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-control mayus" value="{{$consulta->domicilio}}" required="" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="id_giroE">Giro</label>
                                        <select name="id_giroE" id="id_giroE" class="form-control">
                                        	<option value="0">Seleccione un giro
                                        <?php 
                                        foreach($giro as $fila1) { ?>
                                            <option value="<?=$fila1 -> id_giroE ?>"><?=$fila1 -> giro ?></option>
                                        <?php } ?>     
                                            </select>
                                    </div>
                                   <div class="col-sm-6">
                                        <label for="id_razonS">Razón Social</label>
                                        <select name="id_razonS" id="id_razonS" class="form-control select2_demo_1">
                                        	<option value="0">Seleccione la razón social
                                            <?php 
	                                        	foreach($razon as $fila2) { ?>
	                                            <option value="<?=$fila2 -> id_razonS ?>"><?=$fila2 -> razon ?></option>
	                                        <?php } ?> 
                                            </select>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                	<div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success btn-fill btn-lg btn-block">Guardar &nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script text="javascript">
     $(document).ready(function(){
        var id_giroE = <?php echo $consulta->id_giroE; ?>;
        $('#id_giroE > option[value="'+id_giroE+'"]').attr('selected', 'selected');

        var id_razonS = <?php echo $consulta->id_razonS; ?>;
        $('#id_razonS > option[value="'+id_razonS+'"]').attr('selected', 'selected');

        
    function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.(),!$%)";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}

function nof(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}
    </script>
@stop
