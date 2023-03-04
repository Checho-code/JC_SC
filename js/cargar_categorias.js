
$(document).ready(function() {
    recargarCategoria(); 
    
    $('#marca').change(function() {     
        recargarCategoria();

    });

});


function recargarCategoria(){

    $.ajax({
        type:"POST",
        url:"../controladores/categorias_C.php",
        data:"marca=" + $('#marca').val(),
        success:function(r){
            $('#cont-categoria').html(r);
        }
    });

}