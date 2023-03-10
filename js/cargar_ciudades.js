
$(document).ready(function () {

    $('#deptos').change(function () {
        recargarCiudades();
        $('#sector').find('option').remove().end().append(
            '<option value="whatever"></option>').val('whatever');


    });


})


function recargarCiudades() {
    $.ajax({
        type: "POST",
        url: "../controladores/cargar_ciudades_C.php",
        data: "deptos=" + $('#deptos').val(),
        success: function (r) {
            $('#contCiudad').html(r);
        }
    });


}

