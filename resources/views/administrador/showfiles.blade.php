
@extends('../administrador/layoutdrop')

@section('header')
<?php error_reporting(0); ?>
@stop

@section('centro2')

<div class="content-wrapper">
          
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                      

 				
									<?php 

									$anobase='2017';
									$l=$cont;

									$te1=0;
									$te2=0;
									$te3=0;
									$te4=0;
									$te5=0;
									$te6=0;
									$te7=0;
									$te8=0;
									$te9=0;
									$te10=0;
									$te11=0;
									$te12=0;

									for($i=0;$i<=$l;$i++){
								
									$uuid_e=$uuide[$i];
									
						
										
									$fechar_ch=$fechae[$i];								
									$ano = substr($fechar_ch, 0,-15);
									$rest = substr($fechar_ch, 5,-12);
									if ($ano == $anobase){
									
									if ($rest == '01'){
										$total_ene=$egreso[$i];
										$te1=$te1+$total_ene;
									}
									if ($rest == '02'){
										$total_feb=$egreso[$i];
										$te2=$te2+$total_feb;
									}
									if ($rest == '03'){
										$total_mar=$egreso[$i];
										$te3=$te3+$total_mar;
									}
									if ($rest == '04'){
										$total_abr=$egreso[$i];
										$te4=$te4+$total_abr;
									}
									if ($rest == '05'){
										$total_may=$egreso[$i];
										$te5=$te5+$total_may;
									}
									if ($rest == '06'){
										$total_jun=$egreso[$i];
										$te6=$te6+$total_jun;
									}
									if ($rest == '07'){
										$total_jul=$egreso[$i];
										$te7=$te7+$total_jul;
									}
									if ($rest == '08'){
										$total_ago=$egreso[$i];
										$te8=$te8+$total_ago;
									}
									if ($rest == '09'){
										$total_sep=$egreso[$i];
										$te9=$te9+$total_sep;
									}
									if ($rest == '10'){
										$total_oct=$egreso[$i];
										$te10=$te10+$total_oct;
									}
									if ($rest == '11'){
										$total_nov=$egreso[$i];
										$te11=$te11+$total_nov;
									}
									if ($rest == '12'){
										$total_dic=$egreso[$i];
										$te12=$te12+$total_dic;
									}}
									
									//echo $rest;
								

									$total_ch=$egreso[$i];
								
									//echo $total_ch;
							
								
									} ?>
								</table>
			
				
									<?php
									$l2=$cont2;
									$t1=0;
									$t2=0;
									$t3=0;
									$t4=0;
									$t5=0;
									$t6=0;
									$t7=0;
									$t8=0;
									$t9=0;
									$t10=0;
									$t11=0;
									$t12=0;
									

									for($x=0;$x<=$l2;$x++){
								
									
									
									$fechar_ch=$fechar[$x];
									$ano = substr($fechar_ch, 0,-15);
									$rest = substr($fechar_ch, 5,-12);
									if ($ano == $anobase){
									
									

									if ($rest == '01'){
										$total_ene=$ingreso[$x];
										$t1=$t1+$total_ene;
									}
									if ($rest == '02'){
										$total_feb=$ingreso[$x];
										$t2=$t2+$total_feb;
									}
									if ($rest == '03'){
										$total_mar=$ingreso[$x];
										$t3=$t3+$total_mar;
									}
									if ($rest == '04'){
										$total_abr=$ingreso[$x];
										$t4=$t4+$total_abr;
									}
									if ($rest == '05'){
										$total_may=$ingreso[$x];
										$t5=$t5+$total_may;
									}
									if ($rest == '06'){
										$total_jun=$ingreso[$x];
										$t6=$t6+$total_jun;
									}
									if ($rest == '07'){
										$total_jul=$ingreso[$x];
										$t7=$t7+$total_jul;
									}
									if ($rest == '08'){
										$total_ago=$ingreso[$x];
										$t8=$t8+$total_ago;
									}
									if ($rest == '09'){
										$total_sep=$ingreso[$x];
										$t9=$t9+$total_sep;
									}
									if ($rest == '10'){
										$total_oct=$ingreso[$x];
										$t10=$t10+$total_oct;
									}
									if ($rest == '11'){
										$total_nov=$ingreso[$x];
										$t11=$t11+$total_nov;
									}
									if ($rest == '12'){
										$total_dic=$ingreso[$x];
										$t12=$t12+$total_dic;
									}}
									
									$total_ch=$ingreso[$x];
							
								
									}
								
									
									?>

						
				<div class="card-body">
                  <h5 class="card-title mb-4">Reporte de <?php echo $anobase ?></h5>
                  <form> 
			 
                  <a href=""><button type="button" class="btn btn-outline-primary mr-4"><?php echo $anobase ?></button></a>
                  <button type="button" class="btn btn-outline-secondary mr-4">2017</button>
                  <button type="button" class="btn btn-outline-success mr-4">2016</button>
                  <button type="button" class="btn btn-outline-info mr-4">2015</button>
                  <button type="button" class="btn btn-outline-warning mr-4">2014</button>
                  <button type="button" class="btn btn-outline-danger">2013</button>
              	</form>
                  
                </div>			

		<div class="table-responsive">
				 
									<table class="table center-aligned-table"><thead>
								  <tr>
								    <th>Mes</th>
								    <th>Ingresos</th> 
								    <th>Egresos</th>
								    <th>Utilidad</th>
								    <th>...</th>
								  </tr>
								            					        								
								  <tr>								  
								    <td>Enero</td>
								    <td><?php echo $t1 ?></td> 
								    <td><?php echo $te1 ?></td>
								    <td><?php echo $t1-$te1 ?></td>	
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalenero">Info</button></td>							   
								  </tr>
								   <tr>								  
								    <td>Febrero</td>
								    <td><?php echo $t2 ?></td> 
								    <td><?php echo $te2 ?></td>
								    <td><?php echo $t2-$te2 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalfeb">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Marzo</td>
								    <td><?php echo $t3 ?></td> 
								    <td><?php echo $te3 ?></td>
								    <td><?php echo $t3-$te3 ?></td>						
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalmar">Info</button></td>		   
								  </tr>
								   <tr>								  
								    <td>Abril</td>
								    <td><?php echo $t4 ?></td> 
								    <td><?php echo $te4 ?></td>
								    <td><?php echo $t4-$te4 ?></td>	
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalabr">Info</button></td>							   
								  </tr>
								   <tr>								  
								    <td>Mayo</td>
								    <td><?php echo $t5 ?></td> 
								    <td><?php echo $te5 ?></td>
								    <td><?php echo $t5-$te5 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalmay">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Junio</td>
								    <td><?php echo $t6 ?></td> 
								    <td><?php echo $te6 ?></td>
								    <td><?php echo $t6-$te6 ?></td>	
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modaljun">Info</button></td>							   
								  </tr>
								   <tr>								  
								    <td>Julio</td>
								    <td><?php echo $t7 ?></td> 
								    <td><?php echo $te7 ?></td>
								    <td><?php echo $t7-$te7 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modaljul">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Agosto</td>
								    <td><?php echo $t8 ?></td> 
								    <td><?php echo $te8 ?></td>
								    <td><?php echo $t8-$te8 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalago">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Septiembre</td>
								    <td><?php echo $t9 ?></td> 
								    <td><?php echo $te9 ?></td>
								    <td><?php echo $t9-$te9 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalsep">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Octubre</td>
								    <td><?php echo $t10 ?></td> 
								    <td><?php echo $te10 ?></td>
								    <td><?php echo $t10-$te10 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modaloct">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Noviembre</td>
								    <td><?php echo $t11 ?></td> 
								    <td><?php echo $te11 ?></td>
								    <td><?php echo $t11-$te11 ?></td>
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modalnov">Info</button></td>								   
								  </tr>
								   <tr>								  
								    <td>Diciembre</td>
								    <td><?php echo $t12 ?></td> 
								    <td><?php echo $te12 ?></td>
								    <?php $tt12=$t12-$te12 ?>
								    @if ($tt12<'0')
								    <td><font color="red"><?php echo $t12-$te12 ?></font></td>
								    @else
								    <td><?php echo $t12-$te12 ?></td>								   
								    @endif
								    <td> <button type="button" class="btn btn-outline-info mr-4" data-toggle="modal" data-target="#modaldic">Info</button></td>
								  </tr>
								 
								</table>
							</div>

                </div>
              </div>
            </div>
          </div>




<!-- Modal ENERO-->
<div class="modal fade bd-example-modal-lg" id="modalenero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Enero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '01')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "	</td>";
			echo "	<td><img src='../star/images/pdf.png' width='35' height='35'></td>
					<td><img src='../star/images/xml.ico' width='35' height='35'></td>
					</tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	 <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '01')
	   		{
			echo "<td>";
			print_r($archivor[$i]);	
			echo "	</td>";
			echo "	<td><img src='../star/images/pdf.png' width='35' height='35'></td>
					<td><img src='../star/images/xml.ico' width='35' height='35'></td>
					</tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal FEBRERO-->
<div class="modal fade bd-example-modal-lg" id="modalfeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Febrero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '02')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal MARZO-->
<div class="modal fade bd-example-modal-lg" id="modalmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Marzo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '03')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal ABRIL-->
<div class="modal fade bd-example-modal-lg" id="modalabr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Abril</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '04')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal MAYO-->
<div class="modal fade bd-example-modal-lg" id="modalmay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Mayo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '05')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal JUNIO-->
<div class="modal fade bd-example-modal-lg" id="modaljun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Junio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '06')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal JULIO-->
<div class="modal fade bd-example-modal-lg" id="modaljul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Julio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '07')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal AGOSTO-->
<div class="modal fade bd-example-modal-lg" id="modalago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Agosto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '08')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal SEPTIEMBRE-->
<div class="modal fade bd-example-modal-lg" id="modalsep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Septiembre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '09')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal OCTUBRE-->
<div class="modal fade bd-example-modal-lg" id="modaloct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Octubre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '10')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal NOVIEMBRE-->
<div class="modal fade bd-example-modal-lg" id="modalnov" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Novimebre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivo </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '11')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			
			}
		}
	?>

	
		
	    </tbody>
	</table>
	    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal DICIEMBRE-->
<div class="modal fade bd-example-modal-lg" id="modaldic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Diciembre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
<!-- TABS -->      	
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Emitidos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recibidos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	<table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th> Archivos Emitidos </th>
	    			<th> ... </th>
	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
	   	for($i=0;$i<=$l;$i++)
	   {
	   		$fechar_ch=$fechae[$i];					
			
			$rest = substr($fechar_ch, 5,-12);
	   		if ($rest == '12')
	   		{
			echo "<td>";
			print_r($archivos[$i]);	
			echo "</td>";			
			$uuid_e=$uuide[$i];
			echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td></td></tr>";
			echo "<tr><td>";
			echo $uuid_e;
			echo "</td></tr>";
			
			}
		}
	?>

	</tbody>
	</table>
	</div>
  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	<table class="table table-striped" >
	    	<thead>
	    		<tr>
	    			<th>UUID</th>
	    			<th> Receptor </th>
	    			<th> Razón Social </th>
	    			<th> Sub Total </th>
	    			<th> IVA Trasladado </th>
	    			<th> IEPS </th>
	    			<th> IVA Retenido </th>
	    			<th> ISR Retenido </th>
	    			<th> Total </th>
	    			<th> Folio </th>
	    			<th> Fecha </th>


	    		</tr>
	    	</thead>
	    <tbody>
	    <tr>
	
	<?php
	   	$l=$cont;
		$aux='a';$chido=0;

	   	for($x=0;$x<=$l2;$x++){
			
	   		$fechar_ch=$fechar[$x];								
			$rest = substr($fechar_ch, 5,-12);
			
	   		if ($rest == '12')
	   		{
			//echo "<td>";
			//print_r($archivor[$x]);	
			//echo "	</td>";
			$uuid_r=$uuidr[$x];
			$rfc_r=$rfcr[$x];
			$nombre_r=$nombrer[$x];			
			$subtotal_r=$subtotalr[$x];
			$importe_r=$importer[$x];
			$importes_r=$importes[$x];
			$impuestos_r=$impuestos[$x];
			

			//echo "<td><img src='../star/images/pdf.png' width='35' height='35'><td><img src='../star/images/xml.ico' width='35' height='35'></td><td></td><td></td></tr>";
			echo "<td>";
			echo $uuid_r;
			echo "</td><td>";
			echo $rfc_r;
			echo "</td><td>";			
			echo $nombre_r;
			echo "</td><td>";
			echo $subtotal_r;
			echo "</td><td>";		
			echo $importe_r;
			echo "</td>";
//IEPS		
			
		if($impuestos_r == 'IEPS'){
			echo "<td>";
			echo $importes_r;
			echo "</td>";
			}else{
			
			
			echo "<td>";
			echo $importes_r;
			echo "</td>";}
		

			
				

			
			
			
//IVA RETENIDO
			if(is_null($ivar[$x])){
				$ivar_r=0;
				echo "<td>";
				echo $ivar_r;
				echo "</td>";
			}else{
			$ivar_r=$ivar[$x];
			echo "<td>";
			echo $ivar_r;
			echo "</td>";
			}

//ISR
			if($impsr[$x]=='ISR'){
				
			$impr_r=$impr[$x];
			echo "<td>";
			echo $impr_r;
			echo "</td>";
			
				}else{
		
			$impr_r='0';
			echo "<td>";
			echo$impr_r;
			echo "</td>";
			
			}	
			
			echo "</tR>";
				
			
		}
	}
	?>

	
		
	    </tbody>
	</table>
  </div>

<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
	    
	     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>
@stop

@section('pie')

</body>
</html>
@stop