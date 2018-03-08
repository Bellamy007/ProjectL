@extends('../administrador.mn')

@section('header')
 
@stop
 
@section('menu')

@stop 

@section('centro')
 
@stop

@section('centro2') 


                <div class="ibox-title">
                <h5>Tabla General</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="">
       
            </div> 
           <div class="col-md-12 col-md-offset-4">
                                   
                           
                            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#modalanual">Anual</button>
                            <button type="button" class="btn btn-outline btn-info" data-toggle="modal" data-target="#modalsemestre">Semestral</button>
                            <button type="button" class="btn btn-outline btn-warning" data-toggle="modal" data-target="#modalbimestre">Bimestral</button>
                            <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#modalprueba">Pruebas</button><br><br>
<br><br>        
            </div>
                                
            <table class="table table-striped table-bordered table-hover " id="editable" >
            <thead>
            <tr>
            
                                        <th> Id </th>
                                        <th>Username </th>
                                        <th>Contrato</th>
                                        <th>Precio</th>
                                        <th>Action</th>
                
            </tr>
            </thead>
            
            <tbody>
                 <?php foreach ($todas as $rar): ?>
            <tr class="gradeX">
                <td><?= $rar->id; ?></td>
                <td><?= $rar->username; ?></td>
                <td><?= $rar->contrato; ?></td>
                <td class="center"><font color="red"> $ </font><?= $rar->costo; ?></td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
               </tr>
               <?php endforeach ?>
            </tfoot>
               </tbody>
            </table>    

            <?php foreach ($totalt as $rar6): ?>
               
                    <table class="table">
                    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>  <th></th><th></th>  <th></th><th></th>  <th></th><th></th><th></th><th></th>   
                    <td><button type="button" class="btn btn-danger m-r-sm">{{$rar6->total}}</button>
                    Total</td>
                            
                    </table>           

            <?php endforeach ?>     
           
   
         
<!-- TABLA CONTRATOS ANUALES -->
    <div class="modal fade" id="modalanual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contratos Anuales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
             <table class="table table-bordered">
            <thead>
            <tr>
                                        <th>Id </th>
                                        <th>Username </th>
                                        <th>Contrato</th>
                                        <th>Precio</th>
                                        <th>Action</th>
                
            </tr>
            </thead>
            
            <tbody>
                @foreach ($anuales as $rar2)
            <tr class="gradeX">
                <td>{{$rar2->id}}</td>
                <td>{{$rar2->username}}</td>
                <td>{{$rar2->contrato}}</td>
                <td class="center"><?= $rar2->costo; ?></td>
                <td><span class="pie">0.52,1.041</span></td>
               </tr>
               <?php endforeach ?>
            </tfoot>
               </tbody>
            </table>
             <?php foreach ($totala as $rar7): ?>
               
                    <table class="table">
                    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>  <th></th><th></th>  <th></th><th></th>  <th></th><th></th><th></th><th></th>   
                    <td><button type="button" class="btn btn-danger m-r-sm">{{$rar7->total}}</button>
                    Total</td>
                            
                    </table>           

            <?php endforeach ?>     
           
                                             
                                           
      </div>
    </div>
  </div>
</div>
<!-- FIN TABLA CONTRATOS ANUALES -->

<!-- TABLA CONTRATOS SEMESTRALES -->
<div class="modal fade" id="modalsemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contratos Semestrales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
            <thead>
            <tr>
                                        <th>Id </th>
                                        <th>Username </th>
                                        <th>Contrato</th>
                                        <th>Precio</th>
                                        <th>Action</th>
                
            </tr>
            </thead>
            
            <tbody>
                @foreach ($semestrales as $rar3)
            <tr class="gradeX">
                <td>{{$rar3->id}}</td>
                <td>{{$rar3->username}}</td>
                <td>{{$rar3->contrato}}</td>
                <td class="center"><?= $rar3->precio; ?></td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
               </tr>
               <?php endforeach ?>
            </tfoot>
               </tbody>
            </table>
            <?php foreach ($totals as $rar8): ?>
               
                    <table class="table">
                    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>  <th></th><th></th>  <th></th><th></th>  <th></th><th></th><th></th><th></th>   
                    <td><button type="button" class="btn btn-danger m-r-sm">{{$rar8->total}}</button>
                    Total</td>
                            
                    </table>           

            <?php endforeach ?>     
                                             
      </div>
      </div>
      </div>
      </div>
    
 
         
<!-- FIN TABLA CONTRATOS SEMESTRALES -->

<!-- TABLA CONTRATOS BIMESTRALES -->
<div class="modal fade" id="modalbimestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contratos Bimestrales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
              <table class="table table-bordered">
            <thead>
            <tr>
           
                                        <th>Id </th>
                                        <th>Username </th>
                                        <th>Contrato</th>
                                        <th>Precio</th>
                                        <th>Action</th>
                
            </tr>
            </thead>
            
            <tbody>
                @foreach ($bimestrales as $rar4)
            <tr class="gradeX">
                <td>{{$rar4->id}}</td>
                <td>{{$rar4->username}}</td>
                <td>{{$rar4->contrato}}</td>
                <td class="center"><?= $rar4->costo; ?></td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
               </tr>
               <?php endforeach ?>
            </tfoot>
               </tbody>
            </table>
            <?php foreach ($totalb as $rar9): ?>
               
                    <table class="table">
                    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>  <th></th><th></th>  <th></th><th></th>  <th></th><th></th><th></th><th></th>   
                    <td><button type="button" class="btn btn-danger m-r-sm">{{$rar9->total}}</button>
                    Total</td>
                            
                    </table>           

            <?php endforeach ?>     
                                           
      </div>
    </div>
  </div>
</div>
<!-- FIN TABLA CONTRATOS BIMESTRALES -->

<!-- TABLA CONTRATOS PRUEBAS -->
<div class="modal fade" id="modalprueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Usuarios de Prueba</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
             <table class="table table-bordered">
            <thead>
            <tr>
            
                                        <th>Id </th>
                                        <th>Username </th>
                                        <th>Contrato</th>
                                        <th>Precio</th>
                                        <th>Action</th>
                
            </tr>
            </thead>
            
            <tbody>
                @foreach ($pruebas as $rar5)
            <tr class="gradeX">
                <td>{{$rar5->id}}</td>
                <td>{{$rar5->username}}</td>
                <td>{{$rar5->contrato}}</td>
                <td class="center"><?= $rar5->costo; ?></td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
               </tr>
               <?php endforeach ?>
            </tfoot>
               </tbody>
            </table>
       
                                       
      </div>
    </div>
  </div>
</div>
           
<!-- FIN TABLA CONTRATOS PRUEBAAS -->
<a class="btn btn-primary btn-rounded btn-block" href="#"><i class="fa fa-info-circle"></i> Mantenimiento</a>
</div> 
@stop


@section('pie')

@stop