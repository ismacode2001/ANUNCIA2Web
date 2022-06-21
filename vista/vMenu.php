<!-- Botón Crear Anuncio -->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1 btn-flotante" id="idBtnCrear" name="crearAnuncio" title="Crear un nuevo Anuncio">Crear Anuncio</button>
</form>
<hr>

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
  <?php

  $c = 0;
  if(count($arrayAnuncios) > 0)
  {
    // Por cada Anuncio... imprimo un card con su info asociada
    foreach ($arrayAnuncios as $anuncio)
    {
      ?>
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Imagen -->
                <img class="card-img-top" src="<?php decodificaImagen($anuncio->imagen1,$c);?>" alt="..." width="50px"/>
                
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Titulo -->
                        <h5 class="fw-bolder"><?php echo $anuncio->titulo;?></h5>

                        <!-- Categoria -->
                        <p><i><?php echo $anuncio->categoria;?></i></p>

                        <!-- Precio -->
                        <?php echo $anuncio->precio . " €";?>
                    </div>
                </div>

                <!-- Imagen Favorito -->
                <div class="corazon">
                  <?php
                  // Si el producto está marcado como Favorito por el Usuario
                    if(existeFavorito($_SESSION["idUsuario"],$anuncio->idAnuncio))
                    {
                      echo "<img src='" . IMAGENES . "corazonLleno.png' class='imgFav' width='10%' id='idCorazonLleno' title='Quitar de Favoritos'>";                       
                    }
                    else
                    {
                      echo "<img src='" . IMAGENES . "corazonVacio.png' class='imgFav' width='10%' id='idCorazonVacio' title='Añadir a Favoritos'>";
                    }
                  ?>
                </div>
                
                <div class="btnsVisualizarAnuncio">
                  <!-- Fav -->
                  <div class="btn1Vis">
                    <?php
                    // Si el producto está marcado como Favorito por el Usuario
                      if(existeFavorito($_SESSION["idUsuario"],$anuncio->idAnuncio))
                      {
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                          <button type="submit" class="btn btn-primary mb-3 m-1" id="btnFav" name="quitarFavorito" title="Quitar de Favoritos">Quitar de Favoritos</button>
                          <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
                        </form>
                        <?php
                      }
                      else
                      {
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                          <button type="submit" class="btn btn-primary mb-3 m-1" id="btnFav" name="añadirFavorito" title="Añadir a Favoritos">Añadir a Favoritos</button>
                          <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
                        </form>
                        <?php
                      }
                    ?>
                  </div>

                  <!-- Ver Producto -->
                  <div class="btn2Vis">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <button type="submit" class="btn btn-primary mb-3 m-1" id="btnVerDetalle" name="detalleAnuncio" title="Ver Anuncio">Ver Anuncio</button>
                        <input type="hidden" name="idAnuncio" title="Ver el detallo del Anuncio" value="<?php echo $anuncio->idAnuncio?>">
                      </form>
                  </div>
                </div>

            </div>
        </div>
                
      <?php
      $c++;
    }
  }
  else
  {
    echo "<h3><i>Actualmente no hay Anuncios disponibles</i></h3>";
  }
?>
    </div>
  </div>
</section>
