@extends('sistema.estructura.app')
@section ('contenido')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Polizas <small>(búsqueda)</small></h2>
                </div>
                <div class="col-lg-2">

                </div>  
</div>
<div class="wrapper wrapper-content animated fadeInRight">
     <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins" id="newbusqueda">
                    <div class="ibox-title">
                        <h5>B&uacute;squeda de poliza </h5>
                    </div>
                <div class="ibox-content">

                    <div class="table-responsive" align="right">
                        <table class="table table-striped table-bordered table-hover dataTables">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>RFC </th>
                            <th>Cuenta </th>
                            <th>Concepto </th>
                            <th>Debe</th>
                            <th>Haber</th>
                            <th>UUID</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                         
                        @foreach ($consulta as $row)
                          
                        <tr class="gradeX" >
                            <td>{{$row->nombre}}</td>
                            <td>{{$row->rfc}}</td>
                            <td>{{$row->cuenta}}</td> 
                            <td>{{$row->concepto}}</td>
                            <td>{{$row->debe}}</td>
                            <td>{{$row->haber}}</td>
                            <td>{{$row->uuid}}</td>
                            <td>  
                                <div class="infont col-md-3 col-sm-4"><a href="#" title="Eliminar registro"> <img src="{{ url('../estilos/sistema/cross.png') }}" class="img-responsive"> </a>
                                </div> 
                            </td>
                        </tr> 
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <center>{{ $consulta->links() }}</center> 
                </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-8">
        </div>
         @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Users'):?> 
        <div class="col-lg-4" align="right">
        <a class="btn btn-default btn-rounded" href="{{ url('/inicio') }}">Volver</a>
        </div>
         <?php endif; ?>
              @endif
              @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Usuario'):?> 
        <div class="col-lg-4" align="right">
        <a class="btn btn-default btn-rounded" href="{{ url('/iniciousuario') }}">Volver</a>
        </div>
         <?php endif; ?>
              @endif
        </div>
</div>
@stop 