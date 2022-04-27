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
        // Array que contendra los errores
        $arrayErrores = Array();
        $_SESSION["erroresPerfil"] = $arrayErrores;

        // Usuario con la sesion activa
        $usuario = UsuarioDAO::findById($_SESSION["usuario"]);

        /*
        if(validaFormularioPerfil("modificar"))
        {
            // Encripto la pass
            $contraseñaEncriptada = sha1($_REQUEST["pass"]);

            $nuevoUsuario = new Usuario($_REQUEST["user"],$contraseñaEncriptada,$_REQUEST["email"],$_REQUEST["fecha_nacimiento"],$_REQUEST["perfil"]);
            UsuarioDAO::update($nuevoUsuario);

            $_SESSION['pagina'] = 'perfil';
            header('Location: index.php');
            exit();
        }
        else
        {
            // Me quedo en el perfil
            $_SESSION['vista'] = $vistas['perfil'];
            require_once $vistas['layout'];
        }
        */

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
        // Array que contendra los errores
        $arrayErrores = Array();
        $_SESSION["erroresPerfil"] = $arrayErrores;

        $emailUsuario = $_SESSION["emailUsuario"];
        $usuario = UsuarioDAO::findByEmail($emailUsuario);

        $_SESSION['vista'] = $vistas['modificarUsuario'];
        require_once $vistas['layout'];
    }
?>