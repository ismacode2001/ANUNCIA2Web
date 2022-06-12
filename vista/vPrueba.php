<h2>Prueba</h2>

<?php

    $c = 0;
    foreach ($anuncios as $anuncio) 
    {
      ?>
        <h4><?php echo $anuncio->titulo;?></h4>
        <hr>
        <img src="<?php decodificaImagen($anuncio->imagen1,$c);?>" class="card-img-top img-fluid" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="50px">
        <br>
        <?php $c++;?>
        <img src="<?php decodificaImagen($anuncio->imagen2,$c);?>" class="card-img-top img-fluid" alt="Imagen del Anuncio <?php echo $anuncio->titulo?>" width="100%" height="50px">
        <hr>
        <?php $c++;?>
      <?php
    }
?>