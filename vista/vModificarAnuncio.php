<h2>Modificar Anuncio</h2>
<div class="formulario" id="formularioAnuncio">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formulario" id="idFormulario" enctype="multipart/form-data">
        <!-- ID - (Oculto) -->
        <input type="hidden" name="idAnuncio" id="idAnuncio" size="25" value="<?php
            echo $anuncio->idAnuncio;
        ?>">
        <!-- Titulo -->
        <div class="row mb-3 mt-3">
            <label for="idTitulo" class="col-sm-2 col-form-label mt-3">Título</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" name="titulo" value="<?php 
                echo $anuncio->titulo;    
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],"idTitulo",'titulo');
            ?>
            </div>
        </div>
        <!-- Descripción -->
        <div class="row mb-3 mt-3">
            <label for="idDescripcion" class="col-sm-2 col-form-label mt-3">Descripción</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idDescripcion" size="100" placeholder="Descripción" name="descripcion" value="<?php 
                echo $anuncio->descripcion;
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],"idDescripcion",'descripcion');
            ?>
            </div>
        </div>
        <!-- Categoria -->
        <div class="row mb-3">
            <label for="idCategoria" class="col-sm-2 col-form-label">Categoría</label>
            <div class="col-sm-5" id="idCategoria">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaInformatica" value="Informática" <?php compruebaCategoria($anuncio,"Informática");?>>
                    <label class="form-check-label" for="idCategoriaInformatica">Informática</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaDeportes" value="Deportes" <?php compruebaCategoria($anuncio,"Deportes");?>>
                    <label class="form-check-label" for="idCategoriaDeportes">Deportes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaInmobiliaria" value="Inmobiliaria" <?php compruebaCategoria($anuncio,"Inmobiliaria");?>>
                    <label class="form-check-label" for="idCategoriaInmobiliaria">Inmobiliaria</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaMotor" value="Motor" <?php compruebaCategoria($anuncio,"Motor");?>>
                    <label class="form-check-label" for="idCategoriaMotor">Motor</label>
                </div>
            </div>
        </div>
        <!-- Precio -->
        <div class="row mb-3">
            <label for="idPrecio" class="col-sm-2 col-form-label">Precio (€)</label>
            <div class="col-sm-5">
            <input type="number" class="form-control" id="idPrecio" min="1" step=".01" name="precio" placeholder="Precio (€)" value="<?php
                echo $anuncio->precio;
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],'idPrecio','precio');
            ?>
            </div>
        </div>
        <!-- Fecha de Anuncio -->
        <input type="hidden" class="form-control" id="idFecha" name="fechaAnuncio" value="<?php    
            echo $anuncio->fechaAnuncio;
        ?>">
        <!-- Ubicación -->
        <div class="row mb-3">
            <label for="idUbicacion" class="col-sm-2 col-form-label">Ubicación</label>
            <div class="col-sm-5">
            <input type="text" class="form-control" id="idUbicacion" name="ubicacion" placeholder="Ubicación" value="<?php    
                echo $anuncio->ubicacion;
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],'idUbicacion','ubicacion');
            ?>
            </div>
        </div>
        <!-- Id del Usuario -->
        <input type="hidden" class="form-control" id="idIdUsuario" name="idUsuario" value="<?php
            echo $anuncio->idUsuario;
        ?>">
        <!-- Imagen 1 -->
        <div class="row mb-3">
            <label for="idImagen1" class="col-sm-2 col-form-label">Imagen 1</label>
            <div class="col-sm-5">
            <input type="file" class="form-control" id="idImagen1" name="imagen1">
            </div>
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],'idImagen1','imagen1');
            ?>
        </div>
        <!-- Imagen 2 -->
        <div class="row mb-3">
            <label for="idImagen2" class="col-sm-2 col-form-label">Imagen 2</label>
            <div class="col-sm-5">
            <input type="file" class="form-control" id="idImagen2" name="imagen2">
            </div>
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresModAnuncio"],'idImagen2','imagen2');
            ?>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="guardarModAnuncio">Confirmar</button>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="volverAtras">Volver</button>
    </form>
</div>