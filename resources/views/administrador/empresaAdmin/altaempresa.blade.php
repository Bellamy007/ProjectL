@extends('../administrador.mn')
@section('menu')
@stop

@section('header')
@stop
 
@section('centro')
 
@stop

@section('centro2')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Empresa (Alta)</h2>
    </div> 
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Registro de Empresa</h5>
                </div>
                <div class="ibox-content">
					<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 panel-info">
                    <div class="content-box-large box-with-header">
                        <!-- Inicio del formulario -->
                        <form action="{{route('guardaem')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error) 
                        {{$error}}<br>
                        @endforeach
                        @endif
                            <div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Nombre(s)</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control mayus" onkeypress="return soloLetras(event)"  value="{{old('nombre')}}"  required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>RFC</label>
                                        <input type="text" name="rfc" id="rfc" class="form-control mayus" minlength="12" maxlength="13"  onkeypress="return nof(event)" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Domicilio</label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-control mayus" value="{{old('domicilio')}}" required="" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                     <div class="col-sm-4">
                                        <label for="estado">Giro</label>
                                        <select name="id_giroE" class="form-control">
                                                <?php foreach ($giro as $ns): ?>
                                                    <option value="<?= $ns->id_giroE; ?>"><?= $ns->giro; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="estado">Razón Social</label>
                                        <select name="id_razonS" class="form-control select2_demo_1">
                                                <?php foreach ($razon as $r): ?>
                                                    <option value="<?= $r->id_razonS; ?>"><?= $r->razon; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="estado">Usuario</label>
                                        <select name="id_usuario" class="form-control">
                                                <?php foreach ($user as $us): ?>
                                                    <option value="<?= $us->id_usuario; ?>"><?= $us->nombre; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="ibox-title">
                                    <h5>Seleccione el periodo con el que trabajara para esta empresa</h5>
                                </div>
                                    <div class="col-sm-6">
                                     <label>Año inicio :</label>
                                            <input type="text" class="form-control" name="yearstart">
                                    </div>
                                    <div class="col-sm-6">
                                            <label>Año Fin :</label>
                                            <input type="text" class="form-control" name="yearfinish">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success btn-fill btn-lg btn-block">Guardar &nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="reset" class="btn btn-warning btn-lg btn-block"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp; Limpiar Formulario</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Fin del formulario -->
                        <div id="guardar">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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



@section('pie')
    
@stop