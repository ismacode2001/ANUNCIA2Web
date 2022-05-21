<h2>Crear Anuncio</h2>

<div class="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formulario" id="idFormulario" enctype="multipart/form-data">
        <!-- ID - (Oculto) -->
        <input type="hidden" name="idAnuncio" id="idAnuncio" size="25"  value="<?php
            echo "1";
        ?>">
        <!-- Titulo -->
        <div class="row mb-3 mt-3">
            <label for="idTitulo" class="col-sm-2 col-form-label mt-3">Título</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" name="titulo" value="<?php 
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("titulo","crearAnuncio");
                
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresAnuncio"],"idTitulo",'titulo');
            ?>
            </div>
        </div>
        <!-- Descripción -->
        <div class="row mb-3 mt-3">
            <label for="idDescripcion" class="col-sm-2 col-form-label mt-3">Descripción</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idDescripcion" size="100" placeholder="Descripción" name="descripcion" value="<?php 
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("descripcion","crearAnuncio");
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresAnuncio"],"idDescripcion",'descripcion');
            ?>
            </div>
        </div>

        <!-- Categoria -->
        <div class="row mb-3">
            <label for="idCategoria" class="col-sm-2 col-form-label">Categoría</label>
            <div class="col-sm-5" id="idCategoria">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaInformatica" value="Informática">
                    <label class="form-check-label" for="idCategoriaInformatica">Informática</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaDeportes" value="Deportes">
                    <label class="form-check-label" for="idCategoriaDeportes">Deportes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaInmobiliaria" value="Inmobiliaria">
                    <label class="form-check-label" for="idCategoriaInmobiliaria">Inmobiliaria</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="categoria" id="idCategoriaMotor" value="Motor">
                    <label class="form-check-label" for="idCategoriaMotor">Motor</label>
                </div>
            </div>
        </div>

        <?php
            //validaCategoria('categoria',"idCategoriaMotor","Debe seleccionar al menos una categoria");
        ?>

        <!-- Precio -->
        <div class="row mb-3">
            <label for="idPrecio" class="col-sm-2 col-form-label">Precio (€)</label>
            <div class="col-sm-5">
            <input type="number" class="form-control" id="idPrecio" step="2" name="precio" placeholder="Precio (€)" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("precio","crearAnuncio")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresAnuncio"],'idPrecio','precio');
            ?>
            </div>
        </div>
        <!-- Fecha de Anuncio -->
        <input type="hidden" class="form-control" id="idFecha" name="fechaAnuncio" value="<?php    
            echo "x";
        ?>">
        <!-- Ubicación -->
        <div class="row mb-3">
            <label for="idUbicacion" class="col-sm-2 col-form-label">Ubicación</label>
            <div class="col-sm-5">
            <input type="text" class="form-control" id="idUbicacion" name="ubicacion" placeholder="Ubicación" value="<?php    
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("ubicacion","crearAnuncio")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresAnuncio"],'idUbicacion','ubicacion');
            ?>
            </div>
        </div>
        <!-- Id del Usuario -->
        <input type="hidden" class="form-control" id="idIdUsuario" name="idUsuario" value="<?php
            if(isset($_SESSION["idUsuario"]))
                echo $_SESSION["idUsuario"];
        ?>">
        <!-- Nº de Favoritos -->
        <input type="hidden" class="form-control" id="idNumFavoritos" name="numFavoritos" value="<?php
            echo "0";
        ?>">
        <!-- Imagen 1 -->
        <div class="row mb-3">
            <label for="idImagen1" class="col-sm-2 col-form-label">Imagen 1</label>
            <div class="col-sm-5">
            <input type="file" class="form-control" id="idImagen1" name="imagen1">
            </div>
        </div>
        <!-- Imagen 2 -->
        <div class="row mb-3">
            <label for="idImagen2" class="col-sm-2 col-form-label">Imagen 2</label>
            <div class="col-sm-5">
            <input type="file" class="form-control" id="idImagen2" name="imagen2">
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="crearAnuncio">Confirmar</button>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
    </form>
</div>