
$(document).ready(function () {
    recargarCiudades();

    $('#deptos').change(function () {
        recargarCiudades();

    });

});


function recargarCiudades() {

    $.ajax({
        type: "POST",
        url: "../controladores/ciudades_C.php",
        data: "deptos=" + $('#deptos').val(),
        success: function (r) {
            $('#cont-ciudad').html(r);
        }
    });

}