<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnCrear" name="crearAnuncio">Crear Anuncio</button>
</form>
<h3>Anuncios Filtrados</h3>
<?php

    // Si hay Anuncios coincidentes con el criteriop de búsqueda...
    if(count($arrayAnuncios) > 0)
    {
      // Por cada Anuncio... imprimo un card con su info asociada
      foreach ($arrayAnuncios as $anuncio)
      {
        ?>
        <hr>
        <div class="card mb-3">
        <img src="<?php decodificaImagen($anuncio->imagen1,"1")?>" class="card-img-top img-fluid" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="300px">
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
        <p align='right'>
          <?php
            // Si el producto está marcado como Favorito por el Usuario
            if(existeFavorito($_SESSION["idUsuario"],$anuncio->idAnuncio))
            {
              echo "<img src='" . IMAGENES . "corazonLleno.png' width='3%' id='idCorazonLleno' title='Quitar de Favoritos'>";
              ?>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="quitarFavorito" title="Quitar de Favoritos">Quitar de Favoritos</button>
                <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
              </form>
              <?php
            }
            else
            {
              echo "<img src='" . IMAGENES . "corazonVacio.png' width='3%' id='idCorazonVacio' title='Añadir a Favoritos'>";
              ?>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="añadirFavorito" title="Añadir a Favoritos">Añadir a Favoritos</button>
                <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
              </form>
              <?php
            }
          ?>
        </p>
    </div>
        </div>
      </div>
    <?php
    }
  }
  // En caso contrario...
  else
  {
    echo "<h3><i>¡Actualmente no hay Anuncios que coincidan con el criterio de filtros que has usado!</i></h3>";
  }
?>