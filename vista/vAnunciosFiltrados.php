<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnCrear" name="crearAnuncio">Crear Anuncio</button>
</form>
<?php

    // Si hay Anuncios coincidentes con el criteriop de búsqueda...
    if(count($arrayAnuncios) > 0)
    {
      // Por cada Anuncio... imprimo un card con su info asociada
      foreach ($arrayAnuncios as $anuncio)
      {
        ?>
        <h3>Resultados de: <i>'<?php echo $textoABuscar; ?>'</i></h3>
        <hr>
        <div class="card mb-3">
        <img src="<?php decodificaImagen($anuncio->imagen1,"1")?>" class="card-img-top" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="300px">
        <div class="card-body">
          <h5 class="card-title"><?php echo $anuncio->titulo?></h5>
          <p class="card-text"><?php echo $anuncio->descripcion?></p>
          <p class="card-text"><small class="text-muted"><?php echo $anuncio->categoria?></small></p>
          <p class="card-text"><small class="text-muted"><?php echo $anuncio->precio . " €"?></small></p>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="detalleAnuncio">Ver Producto</button>
            <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
          </form>
        </div>
      </div>
    <?php
    }
  }
  // En caso contrario...
  else
  {
    ?>
      <h3>No se han encontrado resultados de: <i>'<?php echo $textoABuscar; ?>'</i></h3>
    <?php
  }
?>