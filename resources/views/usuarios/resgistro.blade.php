@extends('administrador.mnlogin')


@section('header')
@stop

@section('centro2')

 <body class="login-bg"  >
    <div class="loginColumns animated fadeInDown" >
                        <div class="ibox-content">
                            <h2>
                                Registro de nuevo cuenta de usuario
                            </h2>
                            <form id="form" action="{{route('altaregistro')}}" method="POST" class="wizard-big wizard clearfix">
                                 {{csrf_field()}}
                               <h1>Cuenta</h1>
                                <fieldset>
                                    <h2>Información de la cuenta</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre *</label>
                                                <input name="nombre" value="{{old('nombre')}}" type="text" class="form-control required" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido paterno *</label>
                                                <input name="ap_paterno" value="{{old('ap_paterno')}}" type="text" class="form-control required" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido materno *</label>
                                                <input  name="ap_materno" value="{{old('ap_materno')}}" type="text" class="form-control required" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo electronico *</label>
                                                <input  name="correo" type="email" value="{{old('correo')}}" class="form-control required email">
                                            </div>
                                               @if(count($errors)>0)
                                                <div class="alert alert-danger">
                                                @foreach($errors->all() as $error) 
                                                {{$error}}<br>
                                                @endforeach
                                                </div>
                                                @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre de usuario *</label>
                                                <input type='text' id='username' name="usuario" title="La primera letra debe ser mayuscula y minimo 5 caracteres."  minlength="5" class="form-control required"> <input type='button' id='check_username_availability' value='Verificar disponibilidad'>  
                                                <div id='username_availability_result'></div>  

                                            <div class="form-group">
                                                <label>Contraseña *</label>
                                                <input id="password" name="contrasena"  minlength="8" type="password" title="Debe de contener 8 caracteres y almenos un numero y un signo (?=.*)" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirme Contraseña *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <p> <label>¿Cuenta con un codigo de contrato? *</label></p>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="inlineRadio1" name="radio" onclick="capturar()" value="si" >
                                                    <label for="inlineRadio1">Si </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="inlineRadio2" name="radio" onclick="capturar2()" value="no">
                                                    <label for="inlineRadio2"> No</label>
                                                </div>
                                                <div id="resultado"></div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Empresa</h1>
                                <fieldset>
                                    <h2>Imformación de la empresa</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre *</label>
                                                <input id="name" name="empresa" value="{{old('empresa')}}" type="text" class="form-control required" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>RFC *</label>
                                                <input id="rfc" name="rfc" value="{{old('rfc')}}" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" minlength="12" maxlength="13" class="form-control required " onkeypress="return nof(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>Razón Social *</label> 
                                                <select name="id_razonS" class="form-control select2_demo_1 required">
                                                    <option value="">Selecciona Razón Social 
                                                <?php foreach ($razon as $r): ?>
                                                    <option value="<?= $r->id_razonS; ?>"><?= $r->razon; ?></option>
                                                <?php endforeach ?>
                                            </select> 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Giro *</label>
                                                <select name="id_giroE" class="form-control required">
                                                    <option value="">Selecciona Giro 
                                                <?php foreach ($giro as $ns): ?>
                                                    <option value="<?= $ns->id_giroE; ?>"><?= $ns->giro; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Periodo *</label>
                                                <input id="yearstart" name="yearstart" value="{{old('yearstart')}}" minlength="4" maxlength="4" onkeypress="return numeros(event)" type="text" class="form-control required">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                    </div>

            </div>
    
       <!-- Steps -->
    <script src="{{ url('../plantilla/js/plugins/staps/jquery.steps.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ url('../plantilla/js/plugins/validate/jquery.validate.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Siempre permita retroceder incluso si el paso actual contiene campos no válidos.
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Prohibir la supresión del paso "Advertencia" si el usuario es joven
                    /*if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }*/

                    var form = $(this);

                    // Limpiar si el usuario retrocedió antes
                    if (currentIndex < newIndex)
                    {
                        // Para eliminar estilos de error

                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Deshabilite la validación en los campos que están deshabilitados u ocultos.

                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Comience la validación; Prevenir el avance si es falso
                    return form.valid();
                }/*,
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suprimir (omitir) el paso "Advertencia" si el usuario tiene edad suficiente.

                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suprimir (omitir) el paso "Advertencia" si el usuario tiene la edad suficiente y quiere el paso anterior.

                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                }*/,
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Desactiva la validación en los campos que están deshabilitados.
                     // En este punto, se recomienda hacer una verificación general (significa ignorar solo los campos desactivados)
                    form.validate().settings.ignore = ":disabled";

                    // Comience la validación; Evitar el envío de formularios si es falso

                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Enviar entrada de formulario
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });

               var min_chars = 5;  
               var checking_html = 'Comprobación...';  
  
                //when button is clicked  
                $('#check_username_availability').click(function(){  
                    //run the character number check  
                    if($('#username').val().length < min_chars){  
                        //if it's bellow the minimum show characters_error text '  
                        $('#username_availability_result').html(response);  
                    }else{  
                        //else show the cheking_text and run the function to check  
                        $('#username_availability_result').html(checking_html);  
                        check_availability();  
                    }  
                });  

       });
    </script>

    <script type="text/javascript">
    function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.(),!$%)";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}

function nof(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}


function numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}



function capturar()
    {
        var resultado="ninguno";
 
        var porNombre=document.getElementsByName("radio");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                resultado=porNombre[i].value;
        }
 
        document.getElementById("resultado").innerHTML=" \  <input name='codigo'  minlength='6' maxlength='6'  type='text' class='form-control required'>";
    }


    function capturar2()
    {
        var resultado="ninguno";
 
        var porNombre=document.getElementsByName("radio");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                resultado=porNombre[i].value;
        }
 
        document.getElementById("resultado").innerHTML=" \  <input name='codigo'  minlength='6' maxlength='6' value='PTS142'  readonly='readonly' type='text' class='form-control required'>";
    }
    
    function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
        
         var host = "http://" + window.location.hostname;
         var url = host+"/Ccfiscal/public/index.php/comprueba/"+username;
        //use ajax to run the check  
        $.get(url,  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(" <p><span class='label label-info'> "+username + ' está disponible</span></p>');  
                }else{  
                    //show that the username is NOT available  
                    document.getElementById("username").value = "";
                    $('#username_availability_result').html(" <p><span class='label label-danger'> "+username + ' no está disponible </span></p>');  
                }  
        });  
  
}  


</script>
</body>
@stop