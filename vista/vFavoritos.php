<h3>Mis Favoritos</h3>
<hr>
<?php

  $_SESSION["numeracion"] = 0;

  if(count($arrayAnuncios) > 0)
  {
    $contadorFavoritos = 0;

    // Por cada Anuncio... imprimo un card con su info asociada
    foreach ($arrayAnuncios as $anuncio)
    {
      // Busco si este anuncio está marcado cómo Favorito por el Usuario 
      $favorito = FavoritoDAO::findByUsuarioYAnuncio($usuario->idUsuario,$anuncio->idAnuncio);
  
      if($favorito != null)
      {
        $contadorFavoritos++;
        ?>
        <div class="card mb-3">
        <img src="<?php decodificaImagen($anuncio->imagen1,$_SESSION["numeracion"]);?>" class="card-img-top img-fluid" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="300px">
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
      <?php
        $_SESSION["numeracion"]+=1;
      }
    }

    if($contadorFavoritos == 0)
    {
      echo "<p><i>Tu lista de Favoritos está vacía</i></p>";
    }
  }
?>