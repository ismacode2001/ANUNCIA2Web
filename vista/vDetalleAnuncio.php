<!-- Imágenes (Carousel) -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <!--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php decodificaImagen($anuncio->imagen1)?>" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="<?php decodificaImagen($anuncio->imagen2)?>" class="d-block w-100" alt="..." height="450px">
    </div>
    <!--
    <div class="carousel-item">
      <img src="<?php //echo IMAGENES . 'portatil.png'?>" class="d-block w-100" alt="..." height="450px">
    </div>
    -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- Título -->
<figure class="text-center mt-3">
  <blockquote class="blockquote">
      <h1><?php echo $anuncio->titulo;?></h1>
  </blockquote>
  <!-- Descripción -->
  <figcaption class="blockquote-footer">
    <h3><?php echo $anuncio->descripcion;?></h3>
  </figcaption>
</figure>

<!-- Categoria -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Categoría:</b> " . $anuncio->categoria;?></small></p>

<!-- Precio -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Precio:</b> " . $anuncio->precio . " €";?></small></p>

<!-- Ubicación -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Ubicación:</b> " . $anuncio->ubicacion;?></small></p>

<!-- Fecha de publicación -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Fecha de publicación:</b> " . $anuncio->fechaAnuncio;?></small></p>

<!-- Usuario Anunciante -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Usuario Anunciante:</b> " . UsuarioDAO::findById($anuncio->idUsuario)->nombre;?></small></p>

<!-- Favorito (+ nº de Favs) -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Nº de favoritos:</b> " . $anuncio->numFavoritos;?></small></p>

<!-- Comentarios -->
<h2 class="mt-4">Comentarios</h2>
<hr>
<p>No hay comentarios.</p>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
</form>