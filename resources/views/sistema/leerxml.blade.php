@extends('sistema.estructura.app')
@section ('contenido')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Polizas <small>(búsqueda)</small></h2>
                </div>
                <div class="col-lg-2">

                </div>  
</div>
<table class="table table-striped table-bordered table-hover dataTables">
                     
  @foreach ($datos as $row)
        <tr >
            <td>{{$row['fechaxmlorig']}}</td>
            <td>{{$row['rfcxmlre']}}</td> 
            <td>{{$row['rfcxmlem']}}</td>
            <td>{{$row['ano']}}</td>
            <td>{{$row['mes']}}</td>
        </tr> 
@endforeach
</table>
@stop 
