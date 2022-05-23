<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnCrear" name="crearAnuncio">Crear Anuncio</button>
</form>
<hr>
<?php

    // Por cada Anuncio... imprimo un card con su info asociada
    foreach ($arrayAnuncios as $anuncio)
    {
      ?>
      <div class="card mb-3">
      <img src="<?php decodificaImagen($anuncio->imagen1)?>" class="card-img-top" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="300px">
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
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="detalleAnuncio">Crear un nuevo Anuncio</button>
  <?php
  if(isset($anuncio))
    echo "<input type='hidden' name='idAnuncio' value='" . $anuncio->idAnuncio . "'>"?>
</form>


<!--<script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<script src="./webroot/js/modales/modalPrueba.js"></script>