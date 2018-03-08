@extends('../administrador.mn')

@section('header')

@stop
 
@section('menu')

@stop 

@section('centro')
 
@stop

@section('centro2') 

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Subusuarios <small>(búsqueda)</small></h2>
                </div>
                <div class="col-lg-2">

                </div> 
</div>
<div class="wrapper wrapper-content animated fadeInRight">
     <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins" id="newbusqueda">
                    <div class="ibox-title">
                        <h5>B&uacute;squeda de usuarios </h5> &nbsp;&nbsp;                       
                                  <!--  <a href="{{ URL('adduser') }}" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus-square"></i>  Alta usuario </a> -->
                                


                </div>




                   <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Subusuarios</th>
                        
                                            
                       
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarion as $rar)
                    <tr class="gradeX">
                         
                            <td>{{$rar->id}} </td>
                            <td>{{$rar->nombre}}</td>
                            <td>
                           

                             <a data-target="#myModal" data-id="{{$rar->id}}" class="open-Modal" data-toggle="modal" title="Eliminar registro">{{$rar->subusers}} </a></td>
                        </td> 
                         
                            
                                



<!-- Modal -->

                                
<div class="modal inmodal fade"  id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
          <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
            </div>
            
            <!-- Modal Body -->
                 <div class="modal-header">
                        <p class="statusMsg"></p>
                                
                                            
                                            <h4 class="modal-title">¿Por qué desea eliminar el registro? </h4>
                                            
                                                
                                        </div>
                                    
                                            <div class="modal-footer">
                                          <p>some content</p>
                                            <input type="text" name="DNI" id="DNI" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </td>
      
                          
                           
                           
                    </tr>
                       @endforeach
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>


                      
                    
@stop


@section('pie')

@stop