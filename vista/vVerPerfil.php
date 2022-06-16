<h2>Ver Perfil de <?php echo $usuario->nombre; ?></h2>

<div class="formulario" id="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <!-- Imagen de Perfil -->
  <img src="<?php decodificaImagen($usuario->imagenPerfil,"")?>" class="img-thumbnail img-fluid" height="10%" width="10%" alt="Imagen de Perfil"/>

  <!-- Nombre -->
  <div class="row mb-3 mt-3">
      <label for="idNombre" class="col-sm-2 col-form-label mt-3">Nombre</label>
      <div class="col-sm-5 mt-3">
      <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" readonly value="<?php 
          echo $usuario->nombre;
      ?>">
      </div>
  </div>
  <!-- Apellido -->
  <div class="row mb-3 mt-3">
      <label for="idApellido" class="col-sm-2 col-form-label mt-3">Apellido</label>
      <div class="col-sm-5 mt-3">
      <input type="text" class="form-control" id="idApellido" placeholder="Apellido" name="apellido" readonly value="<?php 
          echo $usuario->apellido;
          
      ?>">
      </div>
  </div>
  <!-- Email -->
  <div class="row mb-3">
      <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-5">
      <input type="email" class="form-control" id="idEmail" name="email" placeholder="Email" readonly value="<?php
          echo $usuario->email;
      ?>">
      </div>
  </div>
  <!-- Fecha de Nacimiento -->
  <div class="row mb-3">
      <label for="idFecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
      <div class="col-sm-5">
      <input type="text" class="form-control" id="idFecha" name="fechaNacimiento" readonly value="<?php
          echo $usuario->fechaNacimiento;
      ?>">
      </div>
  </div>
  <!-- Nº de teléfono -->
  <div class="row mb-3">
      <label for="idNumTelf" class="col-sm-2 col-form-label">Nº de teléfono</label>
      <div class="col-sm-5">
      <input type="number" class="form-control" id="idNumTelf" name="numTelefono" placeholder="Nº de teléfono" readonly value="<?php
          echo $usuario->numTelefono;
      ?>">
      </div>
  </div>
  <hr>
  <h2>Anuncios Publicados</h2>
  <?php

    // Recojo los Anuncios publicados por este Usuario
    $todosAnuncios = AnuncioDAO::findAll();
    $anunciosUsuario = [];

    if(count($todosAnuncios) > 0)
    {
      foreach ($todosAnuncios as $anuncio) {
        if($anuncio->idUsuario == $idUsuario)
          array_push($anunciosUsuario,$anuncio);
      }
    }

    // Si tiene algún Anuncio publicado...
    if(count($anunciosUsuario) > 0)
    {
      foreach ($anunciosUsuario as $anuncio) 
      {
        ?>
          <div class="row mb-2">
              <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"><?php echo $anuncio->categoria;?></strong>
                    <h3 class="mb-0"><?php echo $anuncio->titulo;?></h3>
                    <div class="mb-1 text-muted"><?php echo $anuncio->fechaAnuncio;?></div>
                    <p class="card-text mb-auto"><?php echo $anuncio->descripcion;?></p>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                    <img src="<?php decodificaImagen($anuncio->imagen1,"1");?>" class="d-block w-100 img-fluid" alt="..." height="450px">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                      <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnDetalle" name="detalleAnuncio">Ver Producto</button>
                      <input type="hidden" name="idAnuncio" value="<?php echo $anuncio->idAnuncio?>">
                    </form> 
                  </div>
                </div>
              </div>
            </div>
        <?php
      }
    }
    else
    {
      echo "<h3><i>No hay Anuncios publicados por " . $usuario->nombre . "</i></h3>";
    }
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
  </form>
</form>
</div>