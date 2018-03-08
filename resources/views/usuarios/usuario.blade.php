@extends('sistema.estructura.app')

@section('contenido')
<div class="col-md-12">
                           @if(session()->has('warning'))
                            <div class="alert alert-info">
                              {!! session()->get('warning') !!}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                              </button>
                            </div>    
                             @endif
                            <div class="panel panel-info">
                                <div class="panel-heading">Lista de Usuarios:<br>
                                    <a href="altausu"><button class=" btn btn-info">Nuevo</button></a>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover table-bordered">
                                        <tr>
                                            <td><h3><b>Nombre</b></h3></td>
                                            <td><h3><b>Apellido Paterno</b></h3></td>
                                            <td><h3><b>Apellido Materno</b></h3></td>
                                            <td><h3><b>Usuario</b></h3></td>
                                            <td><h3><b>Activo</b></h3></td>
                                            <td><h3><b>Operacion</b></h3></td>
                                            </b>
                                        </tr>
                                        <?php foreach ($usuarion as $rar): ?>
                                        <tr>
                                            <td><?= $rar->nombre; ?></td>
                                            <td><?= $rar->ap_paterno; ?></td>
                                            <td><?= $rar->ap_materno; ?></td>
                                            <td><?= $rar->usuario; ?></td>
                                            <td><?= $rar->activo; ?></td>
                                            <td>
                                                <a href="{{ URL('editu',$rar->id_usuario) }}"><button type="button" class="btn btn-info"><i class='glyphicon glyphicon-edit'></i> Modificar</button></a>
                                                <a href="{{ URL('delit',$rar->id_usuario) }}"><button type="button" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i> Eliminar</button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
@stop
