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
    <h2>Pagos <small>(búsqueda)</small></h2>
    <button class="btn btn-primary" type="button"><i class="fa fa-money"></i></button>
    </div>      
</div>


    <div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins" id="newbusqueda">
            
            <div class="ibox-title">
                 Bitacora

                                        

            </div>

<div class="ibox-content">


            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Control Bítacora</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th align="center">#</th>
                                <th align="center">Cliente</th>
                                <th align="center">Status</th>
                                <th align="center">Fecha</th>
                                <th align="center">Contrato</th>

                            </tr>
                            </thead>
                           
                            <tbody>                            
                            	 @foreach($usuarion as $rar)
                            <tr>
                                <td align="center">{{$rar->idd}}</td>
                                <td align="center">{{$rar->nombre}}</td>                              
                               
                                @if($rar->estatus == 'Cancelado')
                                <td align="center"><p><span class="badge badge-danger">{{$rar->estatus}}</span></p></td>
                          		@endif
                          		@if($rar->estatus == 'Proceso')
                                <td align="center"><p><span class="badge badge-warning">{{$rar->estatus}}</span></p></td>
                          		@endif
                          		@if($rar->estatus == 'Pagado')
                                <td align="center"><p><span class="badge badge-info">{{$rar->estatus}}</span></p></td>
                          		@endif
                          		@if($rar->estatus == 'No')
                                <td align="center"><p><span class="badge badge-primary">{{$rar->estatus}}</span></p></td>
                          		@endif

                                <td align="center">{{$rar->fecha}}</td>
                                @if($rar->contrato == 'Prueba')
                                <td align="center">
                                <span class="label label-primary"> {{$rar->contrato}}</td></span>
                                @endif
                                  @if($rar->contrato == 'Semestral')
                                <td align="center">
                                <span class="label label-success"> {{$rar->contrato}}</td></span>
                                @endif
                                  @if($rar->contrato == 'Anual')
                                <td align="center">
                                <span class="label label-danger"> {{$rar->contrato}}</td></span>
                                @endif
                                  @if($rar->contrato == 'Bimestral')
                                <td align="center">
                                <span class="label label-sucess"> {{$rar->contrato}}</td></span>
                                @endif

                            </tr>
                          @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


            
</div>



@stop


@section('pie')

@stop