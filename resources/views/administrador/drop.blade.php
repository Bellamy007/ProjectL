@extends('sistema.estructura.app')
@section ('contenido')

    <script type="text/javascript">
    $(document).ready(function()
    {
        var host = "http://" + window.location.hostname;
        Dropzone.autoDiscover = false;
        $("#dropzone").dropzone({
            url: host+"/Ccfiscal/public/index.php/uploads",
            addRemoveLinks: true,
            maxFileSize: 7000,
            dictResponseError: "Ha ocurrido un error en el server",
            acceptedFiles: '.xml',
            complete: function(file)
            {
                if(file.status == "success")
                {
                   // alert("El siguiente archivo ha subido correctamente: " + file.name);
                }
            },
            error: function(file)
            {
                alert("Error subiendo el archivo " + file.name);
            },
            removedfile: function(file, serverFileName)
            {
                var name = file.name;
                $.ajax({
                    type: "POST",
                    url: host+"/Ccfiscal/public/index.php/uploads?delete=true",
                    data: "filename="+name,
                    success: function(data)
                    {
                        var json = JSON.parse(data);
                        if(json.res == true)
                        {
                            var element;
                            (element = file.previewElement) != null ? 
                            element.parentNode.removeChild(file.previewElement) : 
                            false;
                            alert("El elemento fué eliminado: " + name); 
                        }
                    }
                });
            }
        });
    });
    </script>
<body>
    <!--<div id="dropzone" class="dropzone"></div>-->
    <form action="" method="POST" id="dropzone" class="dropzone">
        {!! csrf_field() !!}
        <button class="btn btn-info" class="btn btn-success" type="submit">Guardar!</button>
    </form>
</body>
@stop


    