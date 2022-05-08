
<!-- Por cada Anuncio... imprimo un card con su info asociada -->
<?php

    //$anuncio = new Anuncio("X","Teclado Gaming","Este es el mejor teclado que hay","Informática",120,"10/04/2003","Codesal","idUsr","numFavs","img1","img2");

    //AnuncioDAO::save($anuncio);

    foreach ($arrayAnuncios as $anuncio)
    {
      ?>
      <div class="card mb-3">
      <img src="<?php echo IMAGENES . 'teclado.png'?>" class="card-img-top" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="300px">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"><?php echo $anuncio->descripcion?></p>
        <p class="card-text"><small class="text-muted"><?php echo $anuncio->categoria?></small></p>
        <p class="card-text"><small class="text-muted"><?php echo $anuncio->precio . " €"?></small></p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <button type="submit" class="btn btn-primary mb-3 m-1" name="detalleAnuncio">Ver Producto</button>
          <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
        </form>
      </div>
    </div>
    <?php
    }
?>
