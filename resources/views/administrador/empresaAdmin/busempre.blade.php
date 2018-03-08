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
                            <th>Eliminado</th>
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
                            <td>{{$row->Fecha}}</td>
                            <td>  
                                <div class="infont col-md-3 col-sm-4">
                                <a href="{{URL::action('Empresass@editaem',['id_empresa'=>$row->id_empresa])}}" title="Modificar Registro"><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="infont col-md-3 col-sm-4"><a href="{{URL::action('Empresass@borraempresa',['id_empresa'=>$row->id_empresa])}}" data-confirm="¿Esta seguro de querer eliminar este registro?" title="Eliminar registro"><i class="fa fa-close"></i></a>
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
@stop


@section('pie')

@stop