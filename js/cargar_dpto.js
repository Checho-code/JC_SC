
$(document).ready(function() {
    recargarCiudades(); 
    
    $('#dpto').change(function() {     
        recargarCiudades();

    });

});


function recargarCiudades(){

    $.ajax({
        type:"POST",
        url:"ciudades_C.php",
        data:"dpto=" + $('#dpto').val(),
        success:function(r){
            $('#cont-city').html(r);
        }
    });

}