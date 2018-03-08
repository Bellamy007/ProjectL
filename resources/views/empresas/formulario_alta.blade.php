@extends('sistema.estructura.app')

@section('contenido')
	{!! Form::open(['url' => 'recibeinfor', 'method' => 'POST']) !!}
                                        <div class="form-group">
                                            {!! Form::label('Nombre:') !!}
                                            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('RFC : ') !!}
                                            {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Domicilio : ') !!}
                                            {!! Form::text('domicilio',null,['class'=>'form-control','placeholder'=>'Ingresa datos']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Giro Empresarial :') !!}
                                            <select name="id_giroE" class="form-control">
                                                <?php foreach ($giro as $ns): ?>
                                                    <option value="<?= $ns->id_giroE; ?>"><?= $ns->giro; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Razon Social :') !!}
                                            <select name="id_razonS" class="form-control">
                                               <?php foreach ($razon as $key): ?>
                                                    <option value="<?= $key->id_razonS; ?>"><?= $key->razon; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Usuario') !!}
                                            <select name="id_usuario" class="form-control">
                                               <?php foreach ($user as $usu): ?>
                                                   <option value="<?= $usu->id_usuario; ?>"><?= $usu->nombre; ?></option>
                                               <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Activo') !!}
                                            {!! Form::radio('activo', 'Si') !!}Si
                                            {!! Form::radio('activo', 'No') !!}No
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"> Almacenar </button>
                                        </div>
                                    {!! Form::close() !!}
@endsection