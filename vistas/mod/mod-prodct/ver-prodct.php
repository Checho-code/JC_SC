<style>
  body {
    margin: 0px;
    padding: 0px;
  }

  .cabeza {
    display: flex;
    justify-content: center;
    background-color: #ffae00;
  }

  .inf {
    margin-left: auto;
    padding: 6px 20px;
    font-weight: 600;
    font-size: 1.2rem;
    color: #fff;
    text-align: center;
    border-radius: 20px;
    border-bottom: solid 3px #177c03;
    border-left: solid 3px #177c03;
    border-right: solid 3px #177c03;
  }

  .contimg {
    display: flex;
    justify-content: center;

  }

  .images {
    width: 80%;
    border-radius: 100%;
    box-shadow: 10px 5px 20px #000;
  }

  .nompro {
    text-transform: capitalize;
    font-weight: 600;
    font-size: 1.3em;
    color: #177c03;
    text-align: center;
    margin: 30px 0px;
    box-shadow: 0px 2px 20px #000;
  }

  .label {
    color: #177c03;
    font-weight: 600;
    font-size: 1em;
    text-align: center;
    padding: 3px;
  }

  .ccont {
    font-weight: 500;
    font-size: 0.8rem;
    color: #000;
    padding: 3px;
  }

/************* botones *************/
  .conirtienda{
    display: flex;
    justify-content: right;
  }

  .btnirtienda {
    background-color: #ffae00;
    font-size: 0.9em;
    color: #000;
    width: 150px;
    border: none;
  }
  
  .btnirtienda:hover {
    background-color: #fff;
    font-size: 1em;
    color: #177c03;
    width: 160px;
    border: none;
  }

  .contAcarro {
    display: flex;
    justify-content: left;
  }

  .btnaddcar {
    background-color: #177c03;
    font-size: 0.9em;
    color: #fff;
    width: 150px;
    border: none;
  }
  .btnaddcar:hover {
    background-color: #fff;
    font-size: 1em;
    color: #177c03;
    width: 160px;
    border: none;
  }

  .contmasProd {
    display: flex;
    justify-content: center;
    color: #000;
  }

  .cantidad {
    width: 50px;
    color: #177c03;
    font-weight: 600;
    text-align: center;
    
  }

  .ms {
    font-weight: 600;
    margin: 8px 15px;
    background-color: #177c03;
    color:#fff;
    border-radius: 50%;
    padding: 3px 6px;
  }

  .mn {
    font-weight: 600;
    margin: 8px 15px;
    background-color: #177c03;
    color:#fff;
    border-radius: 50%;
    padding: 3px 6px;
  }


</style>
<!--ventana para Update--->
<div class="modal fade" id="verProd<?php echo $consulta['id_producto'] ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <div class="cabeza modal-header col-12 ">
        <div>
          <h6 class="inf modal-title"> Información del Producto </h6>
        </div>
        <!-- <div>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">X</button>
        </div> -->
      </div>

      <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $consulta['id_producto']; ?>">
        <h6 class="nompro">
          <?php echo $consulta['nom_producto'] ?>
        </h6>
       
        <div class="row justify-content-around mb-5  p-2">

          <div class="contimg col-5 ">
            <img class="images" src="images/img_productos/<?php echo $consulta['imagen'] ?>" alt="Imagen Producto">
          </div>

          <div class="context col-5 ">
            <label for="apellidos" class="label">Descripcion </label>
            <div class="ccont col-12">
              <p>
                <?php echo $consulta['descripcion'] ?>
              </p>
            </div>
            <label for="apellidos" class="label">Presentacion </label>
            <div class="ccont col-12 ">
              <p>
                <?php echo $consulta['unidad'] ?>
              </p>
            </div>
            <label for="apellidos" class="label">Precio </label>
            <div class="ccont col-12">
              <p>
                <?php echo $consulta['precio'] ?>
              </p>
            </div>
          </div>
        </div>
        
        <!--------------------------------------------------------->
        
        <div class="row justify-content-around mt-3 mb-5 p-2">

          <div class="conirtienda col-3 ">
            <button type="button" class="btnirtienda btn "><i class="fa-regular fa-circle-left"></i>
              Tienda </button>
          </div>

          <div class="contmasProd col-3 ">
            <i class="ms fa-solid fa-plus"></i>

            <input type="text" name="cantidad" class="cantidad">

            <i class="mn fa-solid fa-minus"></i>
          </div>


          <div class="contAcarro col-3 ">
            <button type="button" class="btnaddcar btn ">Agregar <i
                class="fa-solid fa-cart-plus"></i></button>
          </div>
        </div>


      </form>

    </div>
  </div>
</div>

<!---fin ventana Update --->