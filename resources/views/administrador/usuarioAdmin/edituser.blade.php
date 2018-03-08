@extends('../administrador.mn')
@section('menu')
@stop

@section('header')
@stop
 
@section('centro')
 
@stop

@section('centro2')


<div class="panel-body">
<h1>Modificar a: <?= $usuario->nombre; ?></h1>
{{ Form::open(['url'=>['update',$usuario->id_usuario],'method'=>'PUT']) }}
<div class="form-group">
{{csrf_field()}}
    {!! Form::label('Nombre:') !!}
    {!! Form::text('nombre',$usuario->nombre,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
</div>
    <div class="form-group">
      {!! Form::label('Apellido Paterno:') !!}
      {!! Form::text('apellidop',$usuario->ap_paterno,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('Apellido Materno:') !!}
      {!! Form::text('apellidom',$usuario->ap_materno,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('Usuario:') !!}
      {!! Form::text('usuario',$usuario->usuario,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('Contraseña') !!}
      {!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
    </div>
    <div class="form-group">
      <table class="table table-striped table-hover table-bordered">
        <tr>
            <td>Accion</td>
            <td>Permiso</td>
        </tr>
        <tr><td>Crear</td>
            <td>
            <div class="form-group">
                    <?php
  if($usuario->crear=='SI')
  echo "<input type='radio' name='crear' value='SI' checked='checked' />SI
  <input type='radio' name='crear' value='NO'/>NO
  ";
  elseif($usuario->crear=='NO')
  echo "<input type='radio' name='crear' value='SI' />SI
  <input type='radio' name='crear' value='NO' checked='checked' />NO
  ";
  elseif($usuario->crear=='')
  echo "<input type='radio' name='crear' value='SI' />SI
  <input type='radio' name='crear' value='NO'/>NO
  ";

?>
                </div>
                
            </td>
            </tr>
            <tr><td>Modificar</td>
            <td>
                
                <div class="form-group">
                    <?php
  if($usuario->modificar=='SI')
  echo "<input type='radio' name='modificar' value='SI' checked='checked' />SI
  <input type='radio' name='modificar' value='NO'/>NO
  ";
  elseif($usuario->modificar=='NO')
  echo "<input type='radio' name='modificar' value='SI' />SI
  <input type='radio' name='modificar' value='NO' checked='checked' />NO
  ";
  elseif($usuario->modificar=='')
  echo "<input type='radio' name='modificar' value='SI' />SI
  <input type='radio' name='modificar' value='NO'/>NO
  ";

?>
                </div>
                </td>
                </tr>
                <tr><td>Eliminar</td>
            <td>
                <div class="form-group">
                    <?php
  if($usuario->eliminar=='SI')
  echo "<input type='radio' name='eliminar' value='SI' checked='checked' />SI
  <input type='radio' name='eliminar' value='NO'/>NO
  ";
  elseif($usuario->eliminar=='NO')
  echo "<input type='radio' name='eliminar' value='Si' />SI
  <input type='radio' name='eliminar' value='NO' checked='checked' />NO
  ";
  elseif($usuario->eliminar=='')
  echo "<input type='radio' name='eliminar' value='SI' />SI
  <input type='radio' name='eliminar' value='NO'/>NO
  ";
?>
                </div>
                </td>
                </tr>
                <tr><td>Ver</td>
            <td>
                <div class="form-group">
                    <?php
  if($usuario->ver=='SI')
  echo "<input type='radio' name='ver' value='SI' checked='checked' />SI
  <input type='radio' name='activo' value='NO'/>NO
  ";
  elseif($usuario->ver=='NO')
  echo "<input type='radio' name='ver' value='SI' />SI
  <input type='radio' name='ver' value='NO' checked='checked' />NO
  ";
  elseif($usuario->ver=='')
  echo "<input type='radio' name='ver' value='SI' />SI
  <input type='radio' name='ver' value='NO'/>NO
  ";

?>

                </div>
            </td>
        </tr>
      </table>
    </div>
    <div class="form-group">
      Tipo de usuario:<select name='id_tipo'>
        <option value='{{$usuario->id_tipo}}'>{{$usuario->tipo}}</option>
        @foreach($tipo_usu as $ti)
        <option value='{{$ti->id_tipo}}'>{{$ti->tipo}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
    <h3><B>ACTIVO</B></h3>
     <?php
  if($usuario->activo=='SI')
  echo "<input type='radio' name='activo' value='SI' checked='checked' />SI
  <input type='radio' name='activo' value='NO'/>NO
  ";
  elseif($usuario->activo=='NO')
  echo "<input type='radio' name='activo' value='SI' />SI
  <input type='radio' name='activo' value='NO' checked='checked' />NO
  ";
  elseif($usuario->activo=='')
  echo "<input type='radio' name='activo' value='SI' />SI
  <input type='radio' name='activo' value='NO'/>NO
  ";

?>
    </div>
    <div class="form-group">
     
      <button type="submit" class="btn btn-success"> Modificar </button>
    </div>
{{ Form::close() }}
</div>



@stop



@section('pie')
    
@stop