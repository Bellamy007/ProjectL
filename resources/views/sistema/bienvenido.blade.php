@extends('sistema.estructura.app')
@section ('contenido')
 	<div class="row">
	 	<div class="col-sm-4">
		 	</div>
	 	<div class="col-md-4" >
	          <h1 align="center">Bienvenido a GEM ELITE CONTPAC</h1>                       
		</div>
		<div class="col-sm-2">
		 	</div>
		<div class="col-sm-2">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div> 
		 </div>
	</div>
 	<hr>
 	<form action="{{URL::action('Empresass@buscapoliza')}}">
 	
  	<div class="row">
	 	<div class="col-sm-3">
	 	<label for="estado" >Empresa</label>
	           <select name="id_empresa" id="id_empresa" class="form-control" >
	                <option value=0>Selecciona Empresa 
	    			<?php 
	    			foreach($empresas as $fila)
	    			{
	    			?>
	    			<option value="<?=$fila -> id_empresa ?>"><?=$fila -> nombre ?></option>
	    			<?php
	    			}
	    			?>		  
	            </select>
	 	</div>
	  	 <div class="col-sm-3">
	          <label for="estado" >Poliza</label>
	           <select name="poliza" id="poliza" class="form-control">
	            <option value=0>Selecciona tipo de poliza
				  <option value="1">Poliza egresos</option>
				  <option value="2">Poliza ingresos</option>
	            </select>
	     </div>
	      <div class="col-sm-3">
	          <label for="estado" >Año</label>
	           <select name="id_periodo" id="id_periodo" class="form-control">
	                <option value=0>Selecciona año
	    			<?php 
	    			foreach($periodo as $p)
	    			{
	    			?>
	    			<option value="<?=$p -> id_periodo ?>"><?=$p -> periodo ?></option>
	    			<?php
	    			}
	    			?>		  
	            </select>
	     </div>
	    <div class="col-sm-3">
	    <label for="estado" >Mes</label>
	           <select name="id_mes" id="id_mes" class="form-control">
	                <option value=0>Selecciona mes
	    			<?php 
	    			foreach($mes as $m)
	    			{
	    			?>
	    			<option value="<?=$m -> id_mes ?>"><?=$m -> mes ?></option>
	    			<?php
	    			}
	    			?>		  
	            </select>
	 	</div>
</div>
<hr>
<div class="row">
 	<div class="col-sm-4">
 	@if(count($errors)>0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error) 
		{{$error}}<br>
		@endforeach
		</div>
		@endif
<hr>
	 	</div>
 	<div class="col-md-4" >
          <input class="btn btn-success btn-block" type="submit" value="Buscar">                       
	</div>
 	</div>

 </form>

@stop  