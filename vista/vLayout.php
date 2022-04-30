<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANUNCIA2</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="./webroot/css/prueba.css">
    <link rel="stylesheet" href="./webroot/bootstrap/styles.css" />
</head>

<body>

    <div class="container">
        <!-- Barra de Navegación Superior -->
        <header class="p-3 mb-1 border-bottom">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <!-- Logo -->
                <!--
                <div id="logoInicio">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
                    <!-- Anuncios -->
                    <li>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <input type="submit" value="Anuncios" id="titulo" name="volver" class="nav-link px-2 link-dark">
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
                                    <input type="submit" value="Listado de Usuarios" id="mostrarUsuarios" name="mostrarUsuarios" class="nav-link px-2 link-dark">
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
                        <!-- Logout -->
                        <li>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                <input type="submit" value="Logout" name="logout" class="nav-link px-2 link-dark">
                            </form>
                        </li>
                    <?php
                        // Codigo de Usuario
                        echo "<p style='float:right'><b>" . $_SESSION['nombreUsuario'] . "</b></p>";
                    } else {
                    ?>
                        <li>
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <input type="submit" value="Login" name="login" class="nav-link px-2 link-dark">
                            </form>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <!-- Desplegable OK -->
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                    <select class="form-select" id="autoSizingSelect">
                        <option selected>Opciones</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <!--
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                -->
            </div>
        </header>
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
    <!--<footer>&copy;&nbsp;Ismael Maestre</footer>-->
    <!--
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© Ismael Maestre Carracedo</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><img src="./webroot/img/usuario.png" width="10%" /></a></li>
            </ul>
        </footer>
    </div>
-->

    <!-- Footer -->
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© Ismael Maestre Carracedo</p>

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

    <!-- Script -->
    <!--<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>-->

    <!-- Script Cabecera -->
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--<script src="./webroot/js/menuLayout.js"></script>-->
    </div>
</body>

</html>