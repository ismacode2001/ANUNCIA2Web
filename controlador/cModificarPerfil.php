<?php

include './core/funcionesPerfil.php';

    //si se ha pulsado login
    if (isset($_POST['volver'])) 
    {
        $_SESSION['pagina'] = 'perfil';
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
    // Modificar el Perfil de Usuario
    else if(isset($_POST['guardarMod']))
    {
        // Array que contendra los errores
        $arrayErrores = Array();
        $_SESSION["erroresModPerfil"] = $arrayErrores;

        // Usuario con la sesion activa
        $usuario = UsuarioDAO::findByEmail($_SESSION["email"]);

        if(validaFormularioPerfil("guardarMod"))
        {
            // Encripto la contraseña
            $contraseña = hash('sha256', $_REQUEST["contraseñaNueva"]);

            $nuevoUsuario = new Usuario($_SESSION["idUsuario"],$_REQUEST["nombre"],$_REQUEST["apellido"],$contraseña,$_REQUEST["email"],
                $_REQUEST["fechaNacimiento"],$_REQUEST["numTelefono"],$_REQUEST["perfil"],$_REQUEST["activo"],$_REQUEST["imagenPerfil"]);

            // Modifico el Usuario
            UsuarioDAO::update($nuevoUsuario);

            $_SESSION['pagina'] = 'perfil';
            header('Location: index.php');
            exit();
        }
        else
        {
            // Me quedo en el perfil
            $_SESSION['vista'] = $vistas['modificarPerfil'];
            require_once $vistas['layout'];
        }

    }
    else
    {
        // Array que contendra los errores
        $arrayErrores = Array();
        $_SESSION["erroresModPerfil"] = $arrayErrores;

        $emailUsuario = $_SESSION["email"];
        $usuario = UsuarioDAO::findByEmail($emailUsuario);

        $_SESSION['vista'] = $vistas['modificarPerfil'];
        require_once $vistas['layout'];
    }
?>