<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>@yield('up') user Admin - Contadores Metepec Toluca Ccfiscal Grupo Empresarial  | Cooporativo Contable Fiscal  Toluca Metepec</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../estilos/sistema/cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../estilos/sistema/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
           @section('menu') 
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="inicio"> Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">USER</div>
                                <div class="profile-data-title">Editar perfil</div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Opciones</li>
                    <li class="active">
                        <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Empresas</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="Facturtas.html"><span class="fa fa-files-o"></span> <span class="xn-text">Facturas</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="Nomina.html"><span class="fa fa-file-text-o"></span> <span class="xn-text">Nómina</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="Contabilidad.html"><span class="fa fa-file-text-o"></span> <span class="xn-text">Contabilidad</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="Inventario.html"><span class="fa fa-pencil"></span> <span class="xn-text">Inventarios</span></a>
                    </li>
                   
                    <li>
                        <a href="Configuracion.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Configuración</span></a>
                    </li>
                    <li>
                        <a href="usuario"><span class="fa fa-map-marker"></span> <span class="xn-text">Usuarios</span></a>
                    </li>                  
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            @show
            <!-- END PAGE SIDEBAR -->
            @yield('contenido')
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
                     
            <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="recibeinfor" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Nombre :</label>
                                            <input type="text" class="form-control" name="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Paterno :</label>
                                            <input type="text" class="form-control" name="ap_paterno">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Materno :</label>
                                            <input type="text" class="form-control" name="ap_materno">
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario :</label>
                                            <input type="text" class="form-control" name="usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" class="form-control" name="contrasena">
                                        </div>
                                        <div class="form-group">
                                            <table class="table table-striped table-hover table-bordered">
                                                <tr>
                                                    <td>Accion</td>
                                                    <td>Permiso</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Crear: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Modificar: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Eliminar: </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ver: </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                           <input type="radio" name="crear" value="Si"> Si
                                                           <input type="radio" name="crear" value="No"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="modificar" value="Si"> Si
                                                           <input type="radio" name="modificar" value="No"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="eliminar" value="Si"> Si
                                                           <input type="radio" name="eliminar" value="No"> No
                                                        </div>
                                                        <div class="form-group">
                                                           <input type="radio" name="ver" value="Si"> Si
                                                           <input type="radio" name="ver" value="No"> No
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo: </label>
                                            <select class="form-control" name="id_tipo">
                                                <option value="0">Seleccionar Tipo</option>
                                                <?php foreach ($tipo as $nd): ?>
                                                    <option value="<?= $nd->id_tipo; ?>"><?= $nd->tipo; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Estado Activo :</label>
                                            <input type="radio" name="activo" value="Si">Si
                                            <input type="radio" name="activo" value="No">No
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"> Almacenar </button>
                                        </div>
                                    </form>                           
                                </div>
                            </div>
                            
                        </div>
                    </div>
               </div>
            <!-- END PAGE CONTENT WRAPPER -->                                                 
              
                    



                    
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
                            <a href="login" class="btn btn-success btn-lg">Si</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../estilos/sistema/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../estilos/sistema/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../estilos/sistema/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="../estilos/sistema/js/plugins/icheck/icheck.min.js"></script>        
        <script type="text/javascript" src="{{ URL('../estilos/sistema/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL('../estilos/sistema/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
        
        <script type="text/javascript" src="../estilos/sistema/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="../estilos/sistema/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src="../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script type='text/javascript' src="../estilos/sistema/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>                
        <script type='text/javascript' src="../estilos/sistema/js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="../estilos/sistema/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="../estilos/sistema/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="../estilos/sistema/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../estilos/sistema/js/settings.js"></script>
        
        <script type="text/javascript" src="../estilos/sistema/js/plugins.js"></script>        
        <script type="text/javascript" src="../estilos/sistema/js/actions.js"></script>
        
        <script type="text/javascript" src="../estilos/sistema/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






