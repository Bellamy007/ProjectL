@extends('../administrador.mn')

@section('header')
 <script type="text/javascript">
function ConfirmDemo() {
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Te gusta Desarrollo Geek?");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Gracias por aceptar!");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}
</script>
@stop
 
@section('menu')

@stop 

@section('centro')
 
@stop

@section('centro2') 


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Usuarios <small>(búsqueda)</small></h2>
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
                                    <a href="{{ URL('adduser') }}" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-plus-square"></i>  Alta usuario </a>
                                


                </div>




                   <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>username</th>
                        <th>Crear</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        <th>Ver</th>
                        <th>Acciones</th>
                       
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarion as $rar)
                    <tr class="gradeX">
                         

                            <td>{{$rar->nombre}}</td>
                            <td>{{$rar->usuario}}</td> 
                            <td>{{$rar->crear}}</td>
                            <td>{{$rar->modificar}}</td>
                            <td>{{$rar->eliminar}}</td>
                            <td>{{$rar->ver}}</td>
                            
                            <td>
                                <a href="{{ URL('editu',$rar->id_usuario) }}"><button type="button" class="btn btn-warning"><i class='glyphicon glyphicon-edit'></i> Modificar</button></a>
                                <!-- Button to trigger modal -->
                               
                                <a data-target="#myModal" data-id="{{$rar->id_usuario}}" class="open-Modal" data-toggle="modal" title="Eliminar registro">Eliminar </a></td>



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

                                     <div class="modal-body">
                                            <p>some content</p>
                                            <input type="text" name="DNI" id="DNI" value=""/>
                                            </div>


                                        <div class="modal-footer">
                                            <a   name="DNI" id="DNI" href="{{  url('desac', [$rar->id_usuario])}}" class="btn btn-white" data-dismiss="modal">No es activo</a>

                                            <a class="btn btn-warning ">Ya no lo deseo</a>                                        
                                           
                                            <a href="{{  url('delete', [$rar->id_usuario])}}  " class="btn btn-primary">Venció contrato</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--<input type="button" onclick="ConfirmDemo()" value="Click para ver un mensaje de confirmación" />-->

    <!--<a href="{{  url('delete', [$rar->id_usuario])}}  " class="btn btn-danger" data-method="delete" data-confirm="¿Por qué desea eliminar el usuario?">Delete</a> -->
    </td>
      
                          
                           
                           
                    </tr>
                       @endforeach
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>


            


    <!-- Mainly scripts -->

<script type="text/javascript">
    $(document).on("click", ".open-Modal", function () {
var myDNI = $(this).data('id');
$(".modal-body #DNI").val( myDNI );
});
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'http://webapplayers.com/example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.4/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2016 19:23:58 GMT -->
</html>
@stop


@section('pie')

@stop