<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>@yield('titulo') Iniciar sesiónContadores Metepec Toluca Ccfiscal Grupo Empresarial  | Cooporativo Contable Fiscal  Toluca Metepec</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{ URL('cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png') }}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ URL('css/theme-default.css') }}"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
    @yield('content')    
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
               <div><img href="cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Iniciar sesión</strong> </div>
                    <form action="{{ URL('admin/sistema') }}" class="form-horizontal" method="GET">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="E-mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Contraseña"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Iniciar sesión</button>
                        </div>
                    </div>
                    
                    <div class="login-subtitle">
                        ¿No tienes contraseña? <a href="#">Crear una cuenta</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






