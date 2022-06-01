<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ANUNCIA2</title>
  <link rel="icon" type="image/x-icon" href="<?php echo IMAGENES . "favicon.ico"; ?>">

  <!-- CSS Bootstrap Web -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- CSS Propio -->
  <link rel="stylesheet" href="./webroot/css/prueba.css">

  <!-- CSS Bootstrap -->
  <!--<link rel="stylesheet" href="./webroot/bootstrap2/styles.css" />-->

  <!-- CSS Modales Propio -->
  <link href="./webroot/css/jquery.modal.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.js"></script>

  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Contenedor Principal -->
  <div class="container">
    <!-- Barra de Navegación Superior -->
    <header class="p-3 mb-1 border-bottom">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <!-- Logo -->
        <!--
        <div id="logoInicio">
            <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                          ?>" method="post">
                <input type="submit" value="Inicio" id="logoInicio" name="volver" class="nav-link px-2 link-dark">
            </form>
        </div>
        -->

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <!-- Inicio -->
          <li>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
              <input type="submit" value="Inicio" id="titulo" name="volver" class="nav-link px-2 link-dark">
            </form>
          </li>

          <!-- Secciones con sesión activa -->
          <?php
          if (isset($_SESSION['perfil'])) {
            // Si el perfil del usuario es de tipo ADMINISTRADOR...
            if ($_SESSION['perfil'] == 'P_ADMIN') {
          ?>
              <!-- Listado de Usuario -->
              <li>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                  <input type="submit" value="Usuarios" id="mostrarUsuarios" name="mostrarUsuarios" class="nav-link px-2 link-dark">
                </form>
              </li>
            <?php
            }
          }

          if (isset($_SESSION['validada'])) {
            ?>
            <!-- Perfil -->
            <li>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Perfil" name="perfil" class="nav-link px-2 link-dark">
              </form>
            </li>

            <!-- Favoritos -->
            <li>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Mis Favoritos" name="favoritos" class="nav-link px-2 link-dark">
              </form>
            </li>

            <!-- Logout -->
            <li>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Cerrar Sesión" name="logout" class="nav-link px-2 link-dark">
              </form>
            </li>
          <?php
            } 
            else 
            {
          ?>
            <!-- Login -->
            <li>
              <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="submit" value="Login" name="login" class="nav-link px-2 link-dark">
              </form>
            </li>
          <?php
          }
          ?>

          <!-- Acerca De -->
          <li>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Acerca De" name="acercaDe" class="nav-link px-2 link-dark">
              </form>
            </li>

            <!-- Ayuda -->
            <li>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Ayuda" name="ayuda" class="nav-link px-2 link-dark">
              </form>
            </li>
        </ul>

        <?php
        if(isset($_SESSION["validada"]))
        {
          ?>
            <!-- Búsqueda de Anuncios -->
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
              <input type="search" class="form-control" placeholder="Busca tu Anuncio..." aria-label="Search" name="buscaAnuncio">
            </form>

            <!-- Desplegable -->
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
              <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                <select class="form-select" id="autoSizingSelect" name="Opciones">
                  <option selected><?php echo $_SESSION['nombreUsuario']; ?></option>
                  <option value="perfil">Perfil</option>
                  <option value="ayuda">Ayuda</option>
                  <option value="Cerrar Sesión">Cerrar Sesión</option>
                </select>
              </div>
            </form>
          <?php
        }
        ?>
      </div>
    </header>
  </div>
  </div>

  <!-- Vista (Cuerpo de la página) -->
  <?php
  // Si no hay ninguna vista cargada...
  // Se carga la de inicio
  if (!isset($_SESSION['vista'])) {
    require_once $vista['inicio'];
  }
  // Si sí la hay... la carga
  else {
    require_once $_SESSION['vista'];
  }
  ?>

  <!-- Footer -->
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&nbsp;&nbsp;© Ismael Maestre Carracedo</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
    </a>

    <!-- Enlaces -->
    <ul class="nav col-md-4 justify-content-end">
      <!-- Inicio -->
      <li class="nav-item">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
          <input type="submit" value="Inicio" id="titulo" name="volver" class="nav-link px-2 link-dark">
        </form>
      </li>

      <!-- Anuncios -->
      <li class="nav-item">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
          <input type="submit" value="Anuncios" id="titulo" name="volver" class="nav-link px-2 link-dark">
        </form>
      </li>
    </ul>
  </footer>
</body>
</html>