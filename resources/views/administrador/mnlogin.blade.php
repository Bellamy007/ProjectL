@yield('header')
<!DOCTYPE html>
<html>
		<head>
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido a GEM ELITE CONTPAC</title>
  <link rel="shortcut icon" href="{{url('../plantilla/img/Imagenes/bolsa.png') }}">
  
  <link href="{{ url('../plantilla/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('../plantilla/font-awesome/css/font-awesome.css') }}" rel="stylesheet"> 
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
  <link href="{{ url('../plantilla/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
  
   <style>

        .wizard > .content > .body  position: relative; }

    </style>

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

  @yield('centro2')




</html>