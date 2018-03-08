@extends('sistema.estructura.app')
@section('contenido')
            <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="recibeinfor" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Nombre :</label>
                                            <input type="text" class="form-control" name="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Paterno :</label>
                                            <input type="text" class="form-control" name="ap_paterno">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Materno :</label>
                                            <input type="text" class="form-control" name="ap_materno">
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario :</label>
                                            <input type="text" class="form-control" name="usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" class="form-control" name="contrasena">
                                        </div>
                                        <div class="form-group">
                                            <table class="table table-striped table-hover table-bordered">
                                                <tr>
                                                    <td>Accion</td>
                                                    <td>Permiso</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Crear: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modificar: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Eliminar: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ver: </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                           <input type="radio" name="crear" value="SI"> Si
                                                           <input type="radio" name="crear" value="NO"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="modificar" value="SI"> Si
                                                           <input type="radio" name="modificar" value="NO"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="eliminar" value="SI"> Si
                                                           <input type="radio" name="eliminar" value="NO"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="ver" value="SI"> Si
                                                           <input type="radio" name="ver" value="NO"> No
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo: </label>
                                            <select class="form-control" name="id_tipo">
                                                <option value="0">Seleccionar Tipo</option>
                                                <?php foreach ($tipo as $nd): ?>
                                                    <option value="<?= $nd->id_tipo; ?>"><?= $nd->tipo; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Estado Activo :</label>
                                            <input type="radio" name="activo" value="SI">Si
                                            <input type="radio" name="activo" value="NO">No
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"> Almacenar </button>
                                        </div>
                                    </form>                           
                                </div>
                            </div>
                            
                        </div>
                    </div>
               </div>
            <!-- END PAGE CONTENT WRAPPER -->                                     
@stop