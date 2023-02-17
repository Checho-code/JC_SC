
   <?php
   include '../conexion/conexion.php';

   
   ?> 
    <script>
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                <?php
                $id= $_GET['id_premio'];
     $eliminar= "DELETE FROM premios WHERE id_premio = '$id'";
     $borra =  $conexion -> query($eliminar);
       
   header('location: ../vistas/crear-premios.php');

?>
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
    </script>








    
 
    
   
    






