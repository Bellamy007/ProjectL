@extends('administrador.mn')

@section('menu')
@stop

@section('header')
@stop
 

@section('centro')
 
@stop

@section('centro2')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pago (alta)</h2>
    </div> 
</div>
<div class="wrapper wrapper-content animated fadeInRight"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins"> 
                <div class="ibox-title">
                    <h5>Alta de pago</h5>
                </div>
                <div class="ibox-content">
                    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 panel-info">
                    <div class="content-box-large box-with-header">
                        <!-- Inicio del formulario -->
                       <form action="{{route('guardapago')}}" target="_self" enctype="multipart/form-data" method="post" class="form-horizontal" name="pago">
                       {{csrf_field()}}
                        @if(count($errors)>0)
                          <div class="alert alert-danger">
                            @foreach($errors->all() as $error) 
                            {{$error}}<br>
                            @endforeach
                          </div>
                          <hr>
                        @endif
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="nombre">Cliente</label>
                                         <select name="id_usuario" class="form-control">
                                            <option value=0>Selecciona el cliente
                                                <?php foreach ($usuario as $us): ?>
                                                    <option value="<?= $us->id_usuario; ?>"><?= $us->nombre; ?> <?= $us->ap_paterno; ?> <?= $us->ap_materno; ?>
                                                    </option>
                                                <?php endforeach ?>
                                          </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label for="fecha_inicio">Fecha de Pago</label>
                                           <div class="input-group date">
                                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="fecha_inicio"  type="text" class="form-control" value="<?= date("Y-m-d"); ?>" readonly="readonly">
                                           </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                          <label for="estatus" >Estatus</label>
                                          <select name="estatus" id="estatus" class="form-control">
                                            <option value=0>Selecciona el estatus del pago
                                            <option value="Pagado">Pagado</option>
                                            <option value="Proceso">Proceso</option>
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="No pagado">No pagado</option>
                                          </select>
                                     </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-4">
                                        <div class="form-group"><label for="contrato">Contrato</label>
                                        <select name="id_contrato" id="id_contrato"   class="form-control">
                                        <option value=0>Selecciona el tipo de contrato
                                           <?php foreach ($contrato as $ct): ?>
                                                    <option value="<?= $ct->id_contrato; ?>"><?= $ct->tipo; ?> </option>
                                                <?php endforeach ?>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="costo">Costo y Limite de usuarios</label>
                                        <input type="text" name="costo" id="costo" class="form-control mayus" value="{{old('costo')}}"  required="" readonly="readonlyt5" />
                                    </div>                                     
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-fill btn-lg btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp; Guardar</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="reset" class="btn btn-warning btn-lg btn-block"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp; Limpiar Formulario</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Fin del formulario -->
                        <div class="row" id="save_compra">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/JavaScript">
    //funcion para mostar el costo y limite de usuarios de cada contrato
    $(document).ready(function(){
        $("#id_contrato").change(function(event){
            var id = $("#id_contrato").find(':selected').val();
            var host = "http://" + window.location.hostname;
            var url = host+"/Ccfiscal/public/index.php/contrato/"+id;
           $.get(url,function(result){ $('#costo').val(result)}) 
        });
    });
</script>

@stop


@section('pie')
    
@stop