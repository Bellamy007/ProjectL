@yield('header')
<html>
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GEM ELITE CONTPAC</title>
  <link rel="shortcut icon" href="{{ url('../plantilla/img/Imagenes/bolsa.png') }}">
  
  <link href="{{ url('../plantilla/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/font-awesome/css/font-awesome.css') }}" rel="stylesheet"> 
  <link href="{{ url('../plantilla/css/plugins/cropper/cropper.min.css') }}" rel="stylesheet">
  <!-- Toastr style -->
  <link href="{{ url('../plantilla/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/animate.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/style.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

<link href="{{ url('../plantilla//css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">

    <link href="{{ url('../plantilla/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
  <!-- Mainly scripts -->
  <script src="{{ url('../plantilla/js/jquery-2.1.1.js') }}"></script>
  <script src="{{ url('../plantilla/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('../plantilla/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
  <script src="{{ url('../plantilla/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

  <!-- Custom and plu gin javascript --> 
  <script src="{{ url('../plantilla/js/inspinia.js') }}"></script>

  <script src="{{ url('../plantilla/js/plugins/pace/pace.min.js') }}"></script>

  <!-- jQuery UI -->
  <script src="{{ url('../plantilla/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Toastr -->
  <script src="{{ url('../plantilla/js/plugins/toastr/toastr.min.js') }}"></script>
  <script src="{{ url('../plantilla/js/plugins/select2/select2.full.min.js') }}"></script>
  <link href="{{ url('../plantilla/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
  <script src="{{ url('../plantilla/js/validator.min.js') }}"></script>
  <script src="{{ url('../plantilla/js/libreria.js') }}"></script>
  <link href="{{ url('../plantilla/js/libreria.js') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/js/dist/facebook.css') }}" rel="stylesheet">
  <script src="{{ url('../plantilla/js/dist/sweetalert.min.js') }}"></script> 

  <script language="javascript">
    var base = '{{ url('/') }}';
    var site = '{{ url('/index') }}';   

    function ImagenOk(img) {
      if (!img.complete) return false;
      if (typeof img.naturalWidth != "undefined" && img.naturalWidth == 0) return false;
      return true;
    }
    function RevisarImagenesRotas() {
      var replacementImg ="{{url('../plantilla/img/no_image_default.jpg') }}";
      for (var i = 0; i < document.images.length; i++) {
        if (!ImagenOk(document.images[i])) {
          document.images[i].src = replacementImg;
        }}}
        window.onload=RevisarImagenesRotas;
  </script>
  <style type="text/css"> #map { height: 350px; width:100%; }  </style>
</head>

		@yield('menu')
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element">
              <div class="text-center">
              @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Super Usuario'):?> 
                             <a href="{{ URL('bienvenidosu') }}"><img alt="image" class="img-circle" id="avatar" src="{{ url('../plantilla/img/avatars/key_admin.png') }}" /></a>
                    <?php endif; ?>
              @endif
                @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Administrador'):?> 
                             <a href="{{ URL('inicioAdmin') }}"><img alt="image" class="img-circle" id="avatar" src="{{ url('../plantilla/img/avatars/icono.png') }}" /></a>
                    <?php endif; ?>
              @endif
              </div> 
                <br> 
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                   <span class="clear">
                      <p class="block m-t-xs" id="nombreUsuario">
                      @if (Session::has('sesionname'))
                        <strong class="font-bold">{{Session::get('sesionname')}} {{Session::get('sesionap_pat')}} {{Session::get('sesionap_mat')}}</strong>
                       @endif
                      </p>
                      @if (Session::has('sesiontipo'))
                       <span class="text-muted text-xs block">{{Session::get('sesiontipo')}}<b class="caret"></b></span>
                      @endif
                  </span> 
                </a>
               <ul class="dropdown-menu animated fadeInRight m-t-xs">
                 <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                 <li><a href="{{URL::action('usuarioss@cerrarsesion')}}"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>
               </ul>
             </div> 
             <div class="logo-element">
             @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Super Usuario'):?> 
              <img alt="image" src="{{ url('../plantilla/img/avatars/key_admin.png') }}" width="90%"/>
               <?php endif; ?>
              @endif
              @if (Session::has('sesiontipo'))
               <?php if(Session::get('sesiontipo') == 'Administrador'):?> 
              <img alt="image" src="{{ url('../plantilla/img/avatars/icono.png') }}" width="90%"/>
               <?php endif; ?>
              @endif
            </div>
          </li>
     <li>
      <a href="{{ url('/show') }}"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span></a>
    </li>
     <li>
      <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">Empresas</span></a>
      <ul class="nav nav-second-level"> 
        <li><a href="{{ url('/busempresa') }}"><span class="fa fa-search"></span> Busqueda</a></li>
        <li><a href="{{ url('/busempre') }}"><span class="fa fa-search-plus"></span> Empresas recientes</a></li>
      </ul> 
    </li>
    <li>
        <a href="{{ url('/controlpagos') }}"><i class="fa fa-th-list"></i> <span class="nav-label">Control Pagos</span></a>
    </li>
    @if (Session::has('sesiontipo'))
       <?php if(Session::get('sesiontipo') == 'Super Usuario'):?> 
          <li>
            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Ganancias</span></a>
          </li>
          <li>
            <a href="{{ url('/bitacora') }}"><i class="fa fa-list-alt"></i> <span class="nav-label">Bitacora</span></a>
          </li>
      <?php endif; ?>
       @endif
     <li>
      <a href="{{ url('/pagos') }}"><i class="fa fa-money"></i> <span class="nav-label">Pagos</span></a>
    </li>
</div>
</nav>

@yield('centro')
<div id="page-wrapper" class="gray-bg dashbard-1">
  <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
      </div>
      <ul class="nav navbar-top-links navbar-right">
        <li>
          <span class="m-r-sm text-muted welcome-message">Bienvenid@
          @if (Session::has('sesionname'))
          {{Session::get('sesionname')}}
                       @endif 
          </span>
        </li>
        <li>
          <a href="{{URL::action('usuarioss@cerrarsesion')}}">
            <i class="fa fa-sign-out"></i> Cerrar Sesión
          </a>
        </li>
      </ul>

    </nav>
  </div>

  @yield('centro2')



		@yield('pie')
		            <div class="footer" align="center">
                    
                    <div>
                        <strong>Copyright</strong> GEM ELITE CONTPAC.
                    </div>
             </div>
        </div>
	</div>
   <script src = "{{ url('../plantilla/js/plugins/dataTables/datatables.min.js')}}"> </script> 
  <script src = "{{ url('../plantilla/js/Funciones.js')}}"> </script>

<script src="{{ url('../plantilla/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script> 
</body>
</html>