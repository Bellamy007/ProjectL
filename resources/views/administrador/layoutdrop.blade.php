@yield('header')
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="{{ url('../star/bower_components/dropzone/downloads/dropzone.min.js')}}"></script>


  <link rel="stylesheet" type="text/css" href="{{ url('../star/bower_components/dropzone/downloads/css/dropzone.css') }}">

  <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GEM ELITE CONTPAC</title>
  <link rel="stylesheet" href="{{ url('../star/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{ url('../star/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}" />
  <link rel="stylesheet" href="{{ url('../star/css/style.css') }}" />
  <link rel="shortcut icon" href="{{ url('../estilos/sistema/cropped-bolsa-de-trabajo-ccfiscal-1-32x32.png') }}" />
</head>
  

@yield('menu')

<body>
  <div class=" container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
          @if(Session::has('sesiontipo'))
           <?php if(Session::get('sesiontipo') == 'Sub Usuario'):?>
               <a class="navbar-brand brand-logo" href="#"><img src="../star/images/subusuario.png" /></a>
            <?php endif; ?>
          @endif
          @if(Session::has('sesiontipo'))
           <?php if(Session::get('sesiontipo') == 'Usuario'):?>
                <a class="navbar-brand brand-logo" href="#"><img src="../star/images/usuario.png" /></a>
            <?php endif; ?>
          @endif
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../star/images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Buscar">
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="#"><img src="{{ url('../star/images/user.png')}}"/></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::action('usuarioss@cerrarsesion')}}">  Cerrar Sesión <i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="{{ url('../star/images/user.png')}}" />
            <p class="name"> 
             @if (Session::has('sesionname'))
                 {{Session::get('sesionname')}} {{Session::get('sesionap_pat')}} {{Session::get('sesionap_mat')}}
             @endif
           </p>
            <p class="designation">
              @if (Session::has('sesiontipo'))
                   {{Session::get('sesiontipo')}}</span>
              @endif
              <br>
                 @if (Session::has('rfcs'))
                  <label>RFC:</label> {{Session::get('rfcs')}}</span>
              @endif
            </p>
          </div>
          <ul class="nav">
              <!-- <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="{{ url('../star/images/icons/empresa.png') }}" alt="">
                <span class="menu-title">Empresas</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="{{ url('../star/images/icons/6.png') }}" alt="">
                <span class="menu-title">Contabilidad</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages" aria-expanded="false" aria-controls="sample-pages">
                 <img src="../star/images/icons/005-forms.png" alt="">
                <span class="menu-title">Facturas<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="modal">
                      <i class="fa fa-upload"></i>Subir archivos 
                    </a>
                  </li>
                </ul>
              </div>
            </li> 
              <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="{{ url('../star/images/icons/nomina.png') }}" alt="">
                <span class="menu-title">Nomina</span>
              </a>
            </li>
          </ul>
        </nav>
   
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
            var host = "http://" + window.location.hostname;
            var url = host+"/Ccfiscal/public/index.php/";

            //var url = $("#url").attr('value');
            window.open(url+'dropzoneE');
           });
           $('#reciv').click(function(e){
            e.preventDefault();
            var host = "http://" + window.location.hostname;
            var url = host+"/Ccfiscal/public/index.php/";

            window.open(url+'dropzoneR');
           });
           $('#SAT').click(function(e){
            e.preventDefault();
            var host = "http://" + window.location.hostname;
            var url = host+"/cfdi/ejemplos/html/index.php";

            window.open(url);
           });

        });
    </script>
    <!-- MODALLLLLLLLLLLLLL -->
    <div class="modal fade" id="myModal" role="dialog" style="overflow-y: scroll;">
        <div class="modal-dialog">
            <div class="modal-content" align="center">
                <div class="modal-header">
                    <h2>¿Que accion desea realizar?</h2>
                </div>
                <div class="modal-body">
                    
                     <div class="row">
                            <div class="col-md-5">
                              <div>
                                  <label>Cargar CFDI !!!</label>
                                  <br />
                                  <button class="btn btn-outline-primary mr-2" id="PC">
                                      <i class="fa fa-laptop"></i> PC
                                  </button>
                                  <button class="btn btn-outline-primary mr-2" id="SAT">
                                      <i class="fa fa-th-large"></i> SAT
                                  </button>
                              </div>
                            </div>
                            <div class="col-md-7">
                              <div>
                                  <label>Descargar CFDI !!!!</label>
                                  <br />
                                  <button class="btn btn-outline-success mr-2">
                                      <i class="fa fa-cloud-download"></i> Respaldo
                                  </button>
                                  <button class="btn btn-outline-success mr-2">
                                      <i class="fa fa-cloud-download"></i> Reportes
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
            <div class="modal-content" align="center">
                <div class="modal-header">
                    OPCIONES
                </div>
                <div class="modal-body">
                    <h2> Tipo de Estado!</h2>
                    <hr>
                     <div class="row">
                       <div class="col-md-6">
                          <button class="btn btn-outline-success mr-2" id="emitido">
                              <i class="fa fa-cloud-upload"></i> Emitidos
                          </button>
                       </div>
                       <div class="col-md-6">
                          <button class="btn btn-outline-warning mr-2" id="reciv">
                              <i class="fa fa-cloud-upload"></i> Recividos
                          </button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @yield('centro')



    @yield('pie')
  <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">GEM ELITE CONTPAC</a> &copy; 2018
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
</div>

  <script src="{{ url('../star/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('../star/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{ url('../star/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ url('../star/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{ url('../star/js/off-canvas.js')}}"></script>
  <script src="{{ url('../star/js/hoverable-collapse.js')}}"></script>
  <script src="{{ url('../star/js/misc.js')}}"></script>

</body>
</html>