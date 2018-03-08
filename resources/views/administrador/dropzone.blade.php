@extends('../administrador/layoutdrop')

@section('header')

@stop

@section('menu')

@stop

@section('centro')
<div class="content-wrapper">
          <h3 class="page-heading mb-4">Upload File</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <h1>Cargar archivos xml Emitidos :v</h1>      
            {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'dropzone' ]) !!}
                <div class="dropzone-previews"></div>
                <div class="fallback">
                    <input name="file" type="file" />

                </div>
                 <input type="hidden" name="rfc" value="{{Session::get('rfcs')}}">
                <h3>Carga Aqui tus Facturas XML</h3>
            {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
</div>
          
     


@stop 

@section('pie')

@stop