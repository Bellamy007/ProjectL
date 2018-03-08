@extends('sistema.estructura.app')
@section('contenido')
<div class="panel panel-info">
                                <div class="panel-heading">Lista de Empresas:<br>
                                    <a href="{{ URL('alta') }}"><button class=" btn btn-info">Nuevo</button></a>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover table-bordered">
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
                                       @foreach ($consulta as $row)
                                        <tr>
                                            <td>{{$row->empresa}}</td>
                                            <td style='text-transform:uppercase;'>{{$row->rfc}}</td> 
                                            <td>{{$row->domicilio}}</td>
                                            <td>{{$row->giro}}</td>
                                            <td>{{$row->razon}}</td>
                                            <td>{{$row->usuario}}   {{$row->ap_paterno}}</td>

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
                                                <a href="{{URL::action('Empresass@edita',['id_empresa'=>$row->id_empresa])}}"><button type="button" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> Modificar</button></a>
                                                <a href="#"><button type="button" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i> Eliminar</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
@stop