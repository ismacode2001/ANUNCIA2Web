<!-- Imágenes (Carousel) -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php decodificaImagen($anuncio->imagen1,"1");?>" class="d-block w-100 img-fluid" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="<?php decodificaImagen($anuncio->imagen2,"2");?>" class="d-block w-100 img-fluid" alt="..." height="450px">
    </div>
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
<p class="card-text m-3">
<small class="text-muted">
  <?php 
    if(null != (UsuarioDAO::findById($anuncio->idUsuario)))
      echo "<b>Usuario Anunciante:</b> " . UsuarioDAO::findById($anuncio->idUsuario)->nombre;
    else
    echo "<b>Usuario Anunciante:</b> " . "<i>Usuario no encontrado<i>";
  ?>
</small></p>

<!-- Favorito (+ nº de Favs) -->
<p class="card-text m-3"><small class="text-muted"><?php echo "<b>Nº de favoritos:</b> " . $anuncio->numFavoritos;?></small></p>

<!-- Modificar Anuncio -->
<?php

  // Usuario Actual
  $usuario = UsuarioDAO::findById($_SESSION["idUsuario"]);

  // Si el usuario es Administrador, o es el propietario del Anuncio...
  if(($anuncio->idUsuario == $usuario->idUsuario)||($usuario->perfil == "P_ADMIN"))
  {
    ?>
      <!-- Modificar Anuncio -->
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">      
        <button type="submit" class="btn btn-primary mb-3 m-1" name="modificarAnuncio">Editar Anuncio</button>
      </form>

      <!-- Eliminar Anuncio -->
      <!-- Enlace para crear un nuevo Comentario -->
      <a href="#idModalEliminarAnuncio" rel="modal:open" class="modales6" title="Eliminar el Anuncio" onclick="recogeIdAnuncio('<?php echo $anuncio->idAnuncio; ?>')">Eliminar</a>
    <?php
  }
?>
<!-- Comentarios -->
<hr>
<h2 class="mt-4">Comentarios</h2>
<?php
  // Recojo los comentarios del Anuncio
  $arrayComentarios = ComentarioDAO::findByIdAnuncio($anuncio->idAnuncio);

  // Si no tiene comentarios...
  if(count($arrayComentarios) == 0)
  {
    echo "<p>No hay comentarios</p>";
  }
  // Si sí tiene...
  else if(count($arrayComentarios) >= 1)
  {
    // (Provisional) //
    echo "<table class='table table-condensed table-striped'>"
          . "<tbody>";

    // Por cada comentario...
    foreach ($arrayComentarios as $comentario) 
    {
      // Busco la imagen de Perfil del Usuario que ha comentado
      $usuario = UsuarioDAO::findById($comentario->idUsuario);
      $imagenPerfilComentador = $usuario->imagenPerfil;

      echo "<tr>";
      ?>
        <td class="col-sm-2"><img src="<?php decodificaImagen($imagenPerfilComentador,"");?>" class="img-fluid img-thumbnail" alt="" width="25%"></td>
        <td class="col-sm-2"><b><?php echo $usuario->nombre;?></b></td>
        <td class="col-sm-6"><?php echo $comentario->comentario;?></td>
        <td class="col-sm-2">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnVerPerfil" name="verPerfil">Ver Perfil</button>
            <input type="hidden" name="idUsuario" value="<?php echo $anuncio->idUsuario?>">
          </form>
        </td>
      <?php
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    
  }
?>

<!-- Enlace para crear un nuevo Comentario -->
<a href="#idModalComentarAnuncio" rel="modal:open" class="modales6" title="Añade un nuevo comentario" onclick="recogeIdAnuncio('<?php echo $anuncio->idAnuncio; ?>')">Comentar</a>

<!-- Modal Comentar un Anuncio -->
<div class="registro" tabindex="-1" role="dialog" id="idModalComentarAnuncio" style="padding: 0 12px; height: auto;">
  <div class="modal-dialog" role="document" style="margin: 0.75rem auto">
      <div class="modal-content rounded-5 shadow">
          <div class="modal-header p-4 pb-4 border-bottom-0">
              <h3 class="fw-bold mb-0">Inserte un comentario</h3>
          </div>
          <div class="modal-body p-5 pt-0">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="idFormularioActivarUsuario">
                  <div class="form-floating mb-3">
                    <textarea name="comentario" class="form-control rounded-4" id="idComentario" placeholder="Inserta un comentario..." rows="5" cols="50"></textarea>
                    <label for="idComentario">Comentario</label>
                  </div>
                  <input type='submit' rel="modal:open"  class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" title='Comentar' value='Comentar' name='insertarComentario'>
                  <small class="text-muted">Todos los usuarios podrán ver su comentario</small>
                  <hr class="my-4">
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal Eliminar un Anuncio -->
<div class="registro" tabindex="-1" role="dialog" id="idModalEliminarAnuncio" style="padding: 0 12px; height: auto;">
    <div class="modal-dialog" role="document" style="margin: 0.75rem auto">
      <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-4 pb-4 border-bottom-0">
                <h3 class="fw-bold mb-0">¿Desea eliminar el Anuncio?</h3>
            </div>
            <div class="modal-body p-5 pt-0">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="idFormularioEliminarAnuncio">
                    <input type='submit' rel="modal:open"  class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" title='Eliminar Anuncio' value='Eliminar Anuncio' name='eliminarAnuncio'>
                    <small class="text-muted">Tras eliminar el anuncio, volverá a la pantalla de Anuncios.</small>
                    <hr class="my-4">
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

<!-- Volver-->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
</form>

<!-- Script para el movimiento del Carrousel -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>-->
<!-- Script para la inserción de Comentarios -->
<script src="./webroot/js/scriptModalDet.js"></script>