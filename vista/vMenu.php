
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
          <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="detalleAnuncio">Ver Producto</button>
          <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
        </form>
      </div>
    </div>
    <?php
    }
?>


<!-- Vertically centered modal -->
<!--
<div class="modal-dialog modal-dialog-centered">
  <p>Modal</p>
</div>
  -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script src="./webroot/js/modales/modalPrueba.js"></script>