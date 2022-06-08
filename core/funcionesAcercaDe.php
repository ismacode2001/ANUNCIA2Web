<?php

  // Función que establece el nº de Anuncios por Categoria en las cookies //
  function estableceCategoriasAnuncio()
  {
    // Recojo todos los Anuncios
    $arrayAnuncios = AnuncioDAO::findAll();

    $cAnunciosMotor = 0;
    $cAnunciosInmobiliaria = 0;
    $cAnunciosInformatica = 0;
    $cAnunciosDeportes = 0;

    // Recorro los Anuncios
    foreach ($arrayAnuncios as $anuncio) 
    {
      // En función de la categoría a la que pertenezcan... incremento el contador
      switch ($anuncio->categoria) 
      {
        case 'Motor':
          $cAnunciosMotor++;
          break;
        
        case 'Inmobiliaria':
          $cAnunciosInmobiliaria++;
          break;

        case 'Informática':
          $cAnunciosInformatica++;
          break;

        case 'Deportes':
          $cAnunciosDeportes++;
          break;

        default:
          break;
      }
    }

    // Establezo las cookies con dichos datos
    setcookie("cAnunciosMotor",$cAnunciosMotor,time()+31536000 ,'/');
    setcookie("cAnunciosInmobiliaria",$cAnunciosInmobiliaria,time()+31536000 ,'/');
    setcookie("cAnunciosInformatica",$cAnunciosInformatica,time()+31536000 ,'/');
    setcookie("cAnunciosDeportes",$cAnunciosDeportes,time()+31536000 ,'/');
  }

?>