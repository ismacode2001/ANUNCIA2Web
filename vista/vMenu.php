
<!-- Por cada Anuncio... imprimo un card con su info asociada -->
<?php

    $anuncio = new Anuncio("X","Teclado Gaming","Este es el mejor teclado que hay","Informática",120,"10/04/2003","Codesal","idUsr","numFavs","img1","img2");

    //AnuncioDAO::save($anuncio);
?>
<div class="card mb-3">
  <img src="<?php echo IMAGENES . 'teclado.png'?>" class="card-img-top" alt="Imagen del Anuncio x" width="100%" height="300px">
  <div class="card-body">
    <h5 class="card-title">Título del Anuncio</h5>
    <p class="card-text">Esta es la descripción del anuncio. Aquí puedes ver toda la información acerca del mismo</p>
    <p class="card-text"><small class="text-muted">Categoría</small></p>
    <p class="card-text"><small class="text-muted">Precio (€)</small></p>
  </div>
</div>