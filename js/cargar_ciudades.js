
$(document).ready(function () {
    recargarCiudades();

    $('#deptos').change(function () {
        console.log("Hola ciudad");
        recargarCiudades();

    });


});


function recargarCiudades() {

    $.ajax({
        type: "POST",
        url: "../controladores/cargar_ciudades_C.php",
        data: "deptos=" + $('#deptos').val(),
        success: function (r) {
            $('#ciudad').html(r);
        }
    });

}

