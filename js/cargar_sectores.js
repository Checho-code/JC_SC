
$(document).ready(function () {
    recargarSectores();

    $('#c').change(function () {
        console.log("Hola sector");
        recargarSectores();

    });


});


function recargarSectores() {

    $.ajax({
        type: "POST",
        url: "../controladores/cargar_sectores_C.php",
        data: "c=" + $('#c').val(),
        success: function (rS) {
            $('#sector').html(rS);
        }
    });

}

