
$(document).on('change', '#ciudad', function () {

    recargarSectores();

});


function recargarSectores() {
    $.ajax({
        type: "POST",
        url: "../controladores/cargar_sectores_C.php",
        data: "ciudad=" + $('#ciudad').val(),
        success: function (r) {
            $('#contSector').html(r);
        }
    });

}

