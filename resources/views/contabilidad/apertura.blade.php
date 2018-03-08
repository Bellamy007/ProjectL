@extends('sistema.estructura.app')

@section('contenido')
	{!! Form::open(['url' => 'altaapertura', 'method' => 'POST']) !!}
    <center><h3>Apertura de contabilidad en la empresa</h3></center><br>   
                                        <div class="form-group">
                                            <label>Cargo: </label>
                                            <select class="form-control" name="id_tipo">
                                                <option value="0">Seleccionar cargo</option>
                                                <?php foreach ($catalogo as $cat): ?>
                                                    <option value="<?= $cat->codigo_agrupador; ?>"><?= $cat->cuenta; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Abono : ') !!}
                                            {!! Form::text('abono',null,['class'=>'form-control','placeholder'=>'socios,accionistas,etc.']) !!}
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"> Almacenar </button>
                                        </div>
                                    {!! Form::close() !!}
@endsection