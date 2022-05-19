<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <button type="submit" class="btn btn-primary mb-3 m-1" id="idBtnCrear" name="crearAnuncio">Crear Anuncio</button>
</form>
<hr>
<!-- Por cada Anuncio... imprimo un card con su info asociada -->
<?php

    //$anuncio = new Anuncio("X","Teclado Gaming","Este es el mejor teclado que hay","Informática",120,"10/04/2003","Codesal","idUsr","numFavs","img1","img2");

    //AnuncioDAO::save($anuncio);

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

<!-- Vertically centered modal -->
<!--
<div class="container" style="width:700px;">  
  <h3 align="center">Make Login Form by Using Bootstrap Modal with PHP Ajax Jquery</h3><br />  
  <br />  
  <br />  
  <br />  
  <br />  
  <br />  
  <?php  /*
  if(isset($_SESSION['username']))  
  {  
  ?>  
  <div align="center">  
        <h1>Welcome - <?php echo $_SESSION['username']; ?></h1><br />  
        <a href="#" id="logout">Logout</a>  
  </div>  
  <?php  
  }  
  else  
  {  
  ?>  
  <div align="center">  
        <button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>  
  </div>  
  <?php  
  }  */
  ?>  
</div>  

  <div id="loginModal" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
    <div class="modal-content">  
        <div class="modal-header">  
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
              <h4 class="modal-title">Login</h4>  
        </div>  
        <div class="modal-body">  
              <label>Username</label>  
              <input type="text" name="username" id="username" class="form-control" />  
              <br />  
              <label>Password</label>  
              <input type="password" name="password" id="password" class="form-control" />  
              <br />  
              <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>  
        </div>  
    </div>  
  </div>  
 </div>  
 
<!-- Modal -->
<!--
<div class="modal fade" id="modalPrueba" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Body del modal</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<button type="button" data-toggle="modal" data-targer="#modalPrueba" class="btn btn-primary">Understood</button>

<script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
-->
<script src="./webroot/js/modales/modalPrueba.js"></script>