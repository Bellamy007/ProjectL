@extends('../administrador.mn')

@section('header')

@stop
 
@section('menu')

@stop 

@section('centro')
 
@stop

@section('centro2') 

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Empresa <small>(búsqueda)</small></h2>
                </div>
                <div class="col-lg-2">

                </div> 
</div>
<div class="wrapper wrapper-content animated fadeInRight">
     <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins" id="newbusqueda">
                    <div class="ibox-title">
                        <h5>B&uacute;squeda de Empresa </h5> &nbsp;&nbsp;                       
                                    <a href="{{ URL('altaempresa') }}" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus"></i>  Alta empresa </a>
                    </div>
                <div class="ibox-content">

                    <div class="table-responsive" align="right">
                        <table class="table table-striped table-bordered table-hover dataTables">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>RFC </th>
                            <th>Domicilio </th>
                            <th>Giro</th>
                            <th>Razón Social</th>
                            <th>Usuario</th>
                            <th>Activo</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                         
                        @foreach ($consulta as $row)
                          
                        <tr class="gradeX" >
                            <td>{{$row->empresa}}</td>
                            <td>{{$row->rfc}}</td> 
                            <td>{{$row->domicilio}}</td>
                            <td>{{$row->giro}}</td>
                            <td>{{$row->razon}}</td>
                            <td>{{$row->usuario}}  {{$row->ap_paterno}}</td>

                            <?php
                                            if($row->activo == "Si"){
                                                $color = "bgcolor='#CEF6E3'"; 
                                                $mensaje = "Si";
                                                $oculto = "";
                                            }else{
                                                $color = "bgcolor='#F8E0E0'"; 
                                                $mensaje = "No";
                                                $oculto = "hide";
                                            }
                                        ?>
                                    
                            <td <?=$color?>>{{$mensaje}}</td>
                            <td>  
                               <div class="infont col-md-3 col-sm-4 {{$oculto}}" >
                                <a href="{{URL::action('Empresass@editaem',['id_empresa'=>$row->id_empresa])}}" title="Modificar Registro"><i class="fa fa-edit"></i></a>
                                </div>
                               <div class="infont col-md-3 col-sm-4"><a onclick="borrar({{$row->id_empresa}})" data-target="#myModalDialog" data-id="{{$row->id_empresa}}" class="open-Modal" title="Eliminar registro"><i class="fa fa-close"></i></a>
                                </div> 
                            </td>
                        </tr> 
                        @endforeach
                        </tbody>
                        <tfoot>
                       <tr>
                            <th>Empresa</th>
                            <th>RFC </th>
                            <th>Domicilio </th>
                            <th>Giro</th>
                            <th>Razón Social</th>
                            <th>Usuario</th>
                            <th>Eliminado</th>
                            <th>Opciones</th>
                        </tr>
                        </tfoot>
                        </table>

                    </div>
                </div>
                </div>
            </div>
        </div>
</div>


                            
                            <div class="modal inmodal fade" id="myModalDialog" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Por favor confirme</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>¿Esta seguro de querer eliminar este registro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a  class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a href="" id="borrar" class="btn btn-warning ">Desactivar</a>
                                            <a href="" id="eliminar" class="btn btn-primary">Eliminar</a>
                                         </div>
                                        
                                    </div>
                                </div>
                            </div>



<script type="text/javascript">

function borrar(value){
        $("#myModalDialog").modal('show');

//
$("#borrar").on("click", function(e){
    e.preventDefault();
    
    var host = "http://" + window.location.hostname;
    var url = host+"/Ccfiscal/public/index.php/borrarempresa/"+value;
    $.get(url, function(data){
        location.reload();
    });
//  
});

$("#eliminar").on("click", function(e){
    e.preventDefault();
    
    var host = "http://" + window.location.hostname;
    var url = host+"/Ccfiscal/public/index.php/forzareliminacion/"+value;
    $.get(url, function(data){
        location.reload();
    });
//  
});
}

</script>
@stop


@section('pie')

@stop