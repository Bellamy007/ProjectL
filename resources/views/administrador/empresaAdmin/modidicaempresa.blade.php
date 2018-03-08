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
        <h2>Empresa</h2>
    </div> 
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Modificar Empresa</h5>
                </div>
                <div class="ibox-content">
                    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 panel-info">
                    <div class="content-box-large box-with-header">
                        <!-- Inicio del formulario -->
                        <form action="{{route('editaemp',['id_empresa'=>$consulta->id_empresa])}}" method="POST" enctype="multipart/form-data">
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
                                         <input type="hidden" class="form-control" name="id_empresa" id="id_empresa" value="{{$consulta->id_empresa}}">
                                        <input type="text" name="nombre" id="nombre" class="form-control mayus" value="{{$consulta->nombre}}" onkeypress="return soloLetras(event)" required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>RFC</label>
                                        <input type="text" name="rfc" id="rfc" class="form-control mayus" value="{{$consulta->rfc}}" onkeypress="return nof(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" minlength="12" maxlength="13" required="" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Domicilio</label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-control mayus" value="{{$consulta->domicilio}}" required="" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="id_giroE">Giro</label>
                                        <select name="id_giroE" id="id_giroE" class="form-control">
                                        <?php 
                                        foreach($giro as $fila1) { ?>
                                            <option value="<?=$fila1 -> id_giroE ?>"><?=$fila1 -> giro ?></option>
                                        <?php } ?>     
                                            </select>
                                    </div>
                                   <div class="col-sm-4">
                                        <label for="id_razonS">Razón Social</label>
                                        <select name="id_razonS" id="id_razonS" class="form-control select2_demo_1">
                                            <?php 
                                        foreach($razon as $fila2) { ?>
                                            <option value="<?=$fila2 -> id_razonS ?>"><?=$fila2 -> razon ?></option>
                                        <?php } ?> 
                                            </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="id_usuario">Usuario</label>
                                        <select name="id_usuario" id="id_usuario" class="form-control">
                                               <?php 
                                        foreach($user as $fila3) { ?>
                                            <option value="<?=$fila3 -> id_usuario ?>"><?=$fila3 -> nombre ?></option>
                                        <?php } ?> 
                                            </select>
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

<script text="javascript">

     $(document).ready(function(){

        var id_giroE = <?php echo $consulta->id_giroE; ?>;
        $('#id_giroE > option[value="'+id_giroE+'"]').attr('selected', 'selected');

        var id_razonS = <?php echo $consulta->id_razonS; ?>;
        $('#id_razonS > option[value="'+id_razonS+'"]').attr('selected', 'selected');

        var id_usuario = <?php echo $consulta->id_usuario; ?>;
        $('#id_usuario > option[value="'+id_usuario+'"]').attr('selected', 'selected');

            
             var $image = $(".image-crop > img")
            $($image).cropper({
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                        //$inputImage
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }
   });
    </script>
@stop


@section('pie')

@stop