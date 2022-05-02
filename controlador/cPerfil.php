<?php

include './core/funcionesPerfil.php';

    //si se ha pulsado login
    if (isset($_POST['volver'])) 
    {
        $_SESSION['pagina'] = 'menu';
        header('Location: index.php');
        exit();
    }
    // Logout
    else if(isset($_POST['logout']))
    {
        // Cierre de la sesion
        unset($_SESSION['validada']);
        session_destroy();

        //$_SESSION['pagina'] = 'inicio';
        header('Location: index.php');
        exit();
    }
    // Listado Usuarios
	else if(isset($_POST['mostrarUsuarios']))
	{
    $_SESSION['pagina'] = 'listadoUsuarios';
    header('Location: index.php');
    exit();
	}
    // Modificar
    else if(isset($_POST['modificar']))
    {
        // Accedo a la página de modificar
        $_SESSION['pagina'] = 'modificarPerfil';
        header('Location: index.php');
        exit();

    }
    else if(isset($_POST["usuarios"]))
    {
        if($_SESSION["perfil"] == "P_ADMIN")
        {
            $_SESSION['vista'] = $vistas['listaUsuarios'];

            $lista = UsuarioDAO::findAll();

            require_once $vistas['layout'];    
        }
    }
    else if(isset($_GET["mostrar"]))
    {
        if($_SESSION["perfil"] == "P_ADMIN")
        {
            $codUsuario = $_GET["mostrar"];
            $usuario = UsuarioDAO::findById($codUsuario);

            $_SESSION["vista"] = $vistas["perfil"];
            require_once $vistas['layout'];
        }
    }
    else
    {
        // Suponiendo que es mi perfil
        // Array que contendra los errores
        $arrayErrores = Array();
        $_SESSION["erroresPerfil"] = $arrayErrores;

        $email = $_SESSION["email"];
        $usuario = UsuarioDAO::findByEmail($email);

        $_SESSION['vista'] = $vistas['perfil'];
        require_once $vistas['layout'];
    }
?>