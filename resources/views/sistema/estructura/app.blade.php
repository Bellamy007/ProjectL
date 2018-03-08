<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Contadores Metepec Toluca Ccfiscal Grupo Empresarial  | Cooporativo Contable Fiscal  Toluca Metepec</title>      
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link href="{{ url('../estilos/sistema/css/dropzone.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ url('../estilos/sistema/cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" href="{{ url('../estilos/sistema/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->
        <style>
            .botonmenu{ padding: 2%}        
        </style>
    </head> 
    <body>
        <!-- START PAGE CONTAINER --> 
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                    @if (Session::has('sesiontipo'))
                        <a href="#">{{Session::get('sesiontipo')}}</a>
                        @endif
                        <img src="{{ url('../estilos/sistema/menu-button_icon-icons.com_72989.png')}}" class="botonmenu x-navigation-control">
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ url('../estilos/sistema/no-image.jpg')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ url('../estilos/sistema/no-image.jpg')}}" />
                            </div>
                            <div class="profile-data">
                            @if (Session::has('sesionname'))
                               <div class="profile-data-name">{{Session::get('sesionname')}} {{Session::get('sesionap_pat')}} {{Session::get('sesionap_mat')}}</div>
                            @endif
                                <div class="profile-data-title">Editar perfil</div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Opciones</li>
                    <li class="active">
                        <a href="{{ URL('empresa') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Empresas</span></a>                        
                    </li> 
                    <li class="xn-openable">
                        <a href="{{ URL('contaap') }}"><span class="fa fa-file-text-o"></span> <span class="xn-text">Contabilidad</span></a>                        
                    </li>                     
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Facturas</span></a>
                        <ul>
                            <li class="xn-openable">
                                <a href="#" id="modal"><span class="fa fa-files-o"></span> <span class="xn-text">Subida</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Nómina</span></a>
                    </li>                   
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Inventarios</span></a>
                    </li>
                   
                    <li>
                        <a href="#"><span class="fa fa-map-marker"></span> <span class="xn-text">Configuración</span></a>
                    </li>
                     @if (Session::has('sesiontipo'))
                     <?php if(Session::get('sesiontipo') == 'Usuario'):?>
                          <li>
                        <a href="{{ URL('usuario') }}"><span class="fa fa-map-marker"></span> <span class="xn-text">Sub Usuarios</span></a>
                    </li> 
                     <?php endif; ?>
                    @endif  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Buscar..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out">Salir</span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    @if (Session::has('sesiontipo'))
                     <?php if(Session::get('sesiontipo') == 'Sub Usuario'):?>
                        <li><a href="{{ url('/inicio') }}">Inicio</a></li> 
                     <?php endif; ?>
                    @endif
                    @if (Session::has('sesiontipo'))
                     <?php if(Session::get('sesiontipo') == 'Usuario'):?>
                        <li><a href="{{ url('/iniciousuario') }}">Inicio</a></li> 
                     <?php endif; ?>
                    @endif
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                   <!--  <div class="row">
                        
                        <div class="col-md-3-right"> -->
                            
                            <!-- START WIDGET CLOCK -->
                           <!--  <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>                  
                            </div> -->                        
                            <!-- END WIDGET CLOCK -->
                            
                      <!--   </div>
                    </div> -->
                    <!-- END WIDGETS -->                    
                
                        @yield('contenido')
                    
                    
                    <!-- START DASHBOARD CHART -->
                    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
                    <div class="block-full-width">
                                                                       
                    </div>                    
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

      <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span>¿Estas seguro de salir?</div>
                    <div class="mb-content">                   
                        <p>Presiona "No" para cancelar o "Si" para continuar</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{URL::action('usuarioss@cerrarsesion')}}" class="btn btn-success btn-lg">Si</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
     
        <!-- URL GLOBAL -->
        <input type="hidden" id="url" value="{{ URL('') }}">
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{ url('../estilos/sistema/audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{ url('../estilos/sistema/audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ url('../estilos/sistema/js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/morris/raphael-min.js')}}"></script>       
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{ url('../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{ url('../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{ url('../estilos/sistema/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/owl/owl.carousel.min.js') }}"></script>                 
        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/settings.js')}}"></script>
        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/actions.js')}}"></script>
        
        <script type="text/javascript" src="{{ url('../estilos/sistema/js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
    <script type="text/javascript" src="{{ url('../estilos/sistema/js/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#modal').click(function(e){
             e.preventDefault();
             $("#myModal").modal();
           });
           $('#PC').click(function(e){
               e.preventDefault();
               $("#my").modal();
           });
           $('#emitido').click(function(e){
            e.preventDefault();
            var url = $("#url").attr('value');
            window.open(url+'/dropzoneE');
           });
           $('#reciv').click(function(e){
            e.preventDefault();
            var url = $("#url").attr('value');
            window.open(url+'/dropzoneR');
           });

        });
    </script>
    @yield('modal')
    <!-- MODALLLLLLLLLLLLLL -->
    <div class="modal fade" id="myModal" role="dialog" style="overflow-y: scroll;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    OPCIONES
                </div>
                <div class="modal-body">
                    <h2>Que accion deseas realizar !!!!</h2>
                     <div class="row">
                            <div class="col-md-6">
                              <div>
                                  <label>Cargar CFDI !!!</label>
                                  <br />
                                  <br />
                                  <button class="btn btn-info" id="PC">
                                      <span class="glyphicon glyphicon-cloud"></span> PC
                                  </button>
                                  <button class="btn btn-info">
                                      <span class="glyphicon glyphicon-cloud"></span> SAT
                                  </button>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div>
                                  <label>Descargar CFDI !!!!</label>
                                  <br />
                                  <br />
                                  <button class="btn btn-danger">
                                      <span class="glyphicon glyphicon-download"></span> Respaldo
                                  </button>
                                  <button class="btn btn-danger">
                                      <span class="glyphicon glyphicon-download"></span> Reportes
                                  </button>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALLLLLLLLLLLLLL -->
    <div class="modal fade" id="my" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    OPCIONES
                </div>
                <div class="modal-body">
                    <h2>Tipo de Estado !!!!</h2>
                     <div class="row">
                                  <button class="btn btn-success" id="emitido">
                                      <span class="glyphicon glyphicon-cloud"></span> Emitidos
                                  </button>
                                  <button class="btn btn-warning" id="reciv">
                                      <span class="glyphicon glyphicon-cloud"></span> Recividos
                                  </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>






