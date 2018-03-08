<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>user Admin - Contadores Metepec Toluca Ccfiscal Grupo Empresarial  | Cooporativo Contable Fiscal  Toluca Metepec</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../../estilos/sistema/cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../../estilos/sistema/css/theme-default.css"/>
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
                        <a href="index.html"> Admin</a>
                        <img src="../../estilos/sistema/menu-button_icon-icons.com_72989.png" class="botonmenu x-navigation-control">
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="../../estilos/sistema/no-image.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="../../estilos/sistema/no-image.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">USER</div>
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
                        <a href="Facturtas.html"><span class="fa fa-files-o"></span> <span class="xn-text">Facturas</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="Nomina.html"><span class="fa fa-file-text-o"></span> <span class="xn-text">Nómina</span></a>
                    </li>                   
                    <li class="xn-openable">
                        <a href="Inventario.html"><span class="fa fa-pencil"></span> <span class="xn-text">Inventarios</span></a>
                    </li>
                   
                    <li>
                        <a href="Configuracion.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Configuración</span></a>
                    </li>   
                    <li>
                        <a href="{{ URL('usuario') }}"><span class="fa fa-map-marker"></span> <span class="xn-text">Usuarios</span></a>
                    </li>                
                    
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
                    <li><a href="#">Inicio</a></li>                    
                    <li class="active">Empresas</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        
                        <div class="col-md-3-right">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                                          
                                                     
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                
                    
                    <div class="row">
                        
                        @yield('contenido')
                    </div>
                    
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
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Salir <strong>ahora</strong> ?</div>
                    <div class="mb-content">
                        <p>¿Estas seguro de salir?</p>                    
                        <p>Presiona No para cancelar o Si para continuar</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg"></a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../../../estilos/sistema/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../../../estilos/sistema/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='../../../estilos/sistema/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='../../../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='../../../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='../../../estilos/sistema/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../../estilos/sistema/js/settings.js"></script>
        
        <script type="text/javascript" src="../../../estilos/sistema/js/plugins.js"></script>        
        <script type="text/javascript" src="../../../estilos/sistema/js/actions.js"></script>
        
        <script type="text/javascript" src="../../../estilos/sistema/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






