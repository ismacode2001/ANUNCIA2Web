<?php

class AnuncioDAO implements DAO
{
  // Método que lista todos los Anuncios //
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonAnuncios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayAnuncios = json_decode($jsonAnuncios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Anuncio
    $anuncios = [];

    // Si hay Anuncios en la BBDD...
    if(count($arrayAnuncios) > 0)
    {
      // Por cada Anuncio...
      foreach ($arrayAnuncios["documents"] as $arrayAnuncio)
      {
        $arrayDatos = $arrayAnuncio["fields"];

        $rutaDocumento = $arrayAnuncio["name"];
        $partes = explode("/",$rutaDocumento);

        $idAnuncio = $partes[count($partes) - 1];
        $titulo = $arrayDatos["titulo"]["stringValue"];
        $descripcion = $arrayDatos["descripcion"]["stringValue"];
        $categoria = $arrayDatos["categoria"]["stringValue"];
        $precio = $arrayDatos["precio"]["stringValue"];
        $fechaAnuncio = $arrayDatos["fechaAnuncio"]["stringValue"];
        $ubicacion = $arrayDatos["ubicacion"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $imagen1 = $arrayDatos["imagen1"]["stringValue"];
        $imagen2 = $arrayDatos["imagen2"]["stringValue"];

        $anuncio = new Anuncio($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,$ubicacion,
          $idUsuario,$imagen1,$imagen2);

        array_push($anuncios,$anuncio);
      }
    }
    
    return $anuncios;
  }

  // Método que busca un Anuncio por su id //
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonAnuncios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayAnuncios = json_decode($jsonAnuncios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $anuncio = null;

    // Si hay Anuncios en la BBDD...
    if(count($arrayAnuncios) > 0)
    {
      // Por cada Anuncio...
      foreach ($arrayAnuncios["documents"] as $arrayAnuncio)
      {
        $arrayDatos = $arrayAnuncio["fields"];
      
        $rutaDocumento = $arrayAnuncio["name"];
        $partes = explode("/",$rutaDocumento);
        $idAnuncio = $partes[count($partes) - 1];

        if($idAnuncio == $id)
        {
          $idAnuncio = $partes[count($partes) - 1];
          $titulo = $arrayDatos["titulo"]["stringValue"];
          $descripcion = $arrayDatos["descripcion"]["stringValue"];
          $categoria = $arrayDatos["categoria"]["stringValue"];
          $precio = $arrayDatos["precio"]["stringValue"];
          $fechaAnuncio = $arrayDatos["fechaAnuncio"]["stringValue"];
          $ubicacion = $arrayDatos["ubicacion"]["stringValue"];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
          $imagen1 = $arrayDatos["imagen1"]["stringValue"];
          $imagen2 = $arrayDatos["imagen2"]["stringValue"];
    
          $anuncio = new Anuncio($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,
              $ubicacion,$idUsuario,$imagen1,$imagen2);
        }
      }
    }

    return $anuncio;
  }

  // Método que busca un Anuncio por su titulo //
  public static function findByTitulo($titulo)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonAnuncios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayAnuncios = json_decode($jsonAnuncios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $anuncio = null;

    // Si hay Anuncios en la BBDD...
    if(count($arrayAnuncios) > 0)
    {
      // Por cada Anuncio...
      foreach ($arrayAnuncios["documents"] as $arrayAnuncio)
      {
        $arrayDatos = $arrayAnuncio["fields"];
      
        $rutaDocumento = $arrayAnuncio["name"];
        $partes = explode("/",$rutaDocumento);
        $idAnuncio = $partes[count($partes) - 1];
        $tituloAnuncio = $arrayDatos["titulo"]["stringValue"];

        if($tituloAnuncio == $titulo)
        {
          $idAnuncio = $partes[count($partes) - 1];
          $titulo = $arrayDatos["titulo"]["stringValue"];
          $descripcion = $arrayDatos["descripcion"]["stringValue"];
          $categoria = $arrayDatos["categoria"]["stringValue"];
          $precio = $arrayDatos["precio"]["stringValue"];
          $fechaAnuncio = $arrayDatos["fechaAnuncio"]["stringValue"];
          $ubicacion = $arrayDatos["ubicacion"]["stringValue"];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
          $imagen1 = $arrayDatos["imagen1"]["stringValue"];
          $imagen2 = $arrayDatos["imagen2"]["stringValue"];
    
          $anuncio = new Anuncio($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,
              $ubicacion,$idUsuario,$imagen1,$imagen2);
        }
      }
    }

    return $anuncio;
  }

  // Método que modifica/actualiza un Anuncio //
  public static function update($anuncio)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    $json = "{
      'fields':{
          'idAnuncio':{
            'stringValue': '" . $anuncio->idAnuncio . "'
          },
          'titulo':{
            'stringValue': '" . $anuncio->titulo . "'
          },
          'descripcion':{
            'stringValue': '" . $anuncio->descripcion . "'
          },
          'categoria':{
            'stringValue': '" . $anuncio->categoria . "'
          },
          'precio':{
            'stringValue': '" . $anuncio->precio . "'
          },
          'fechaAnuncio':{
            'stringValue': '" . $anuncio->fechaAnuncio . "'
          },
          'ubicacion':{
            'stringValue': '" . $anuncio->ubicacion ."'
          },
          'idUsuario':{
            'stringValue': '" . $anuncio->idUsuario ."'
          },
          'imagen1':{
            'stringValue': '" . $anuncio->imagen1 . "'
          },
          'imagen2':{
            'stringValue': '" . $anuncio->imagen2 . "'
          }
      }
    }";


    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/" . $anuncio->idAnuncio);

    // Se le indica que lo queremos hacer por put, indicandole como va a ir la cabecera
    curl_setopt($ch,CURLOPT_HTTPHEADER,
        array("Content-Type: application/json",
                "Content.length: " . strlen($json)));

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PATCH');

    // Parametros
    curl_setopt($ch,CURLOPT_POSTFIELDS,$json);

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $anuncio = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $anuncio;
  }

  // Método que inserta un nuevo Anuncio //
  public static function save($anuncio)
  {
    // Objeto de tipo curl para hacer la peticion a la PR18
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/");

    $json = "{
      'fields':{
          'idAnuncio':{
            'stringValue': '" . $anuncio->idAnuncio . "'
          },
          'titulo':{
            'stringValue': '" . $anuncio->titulo . "'
          },
          'descripcion':{
            'stringValue': '" . $anuncio->descripcion . "'
          },
          'categoria':{
            'stringValue': '" . $anuncio->categoria . "'
          },
          'precio':{
            'stringValue': '" . $anuncio->precio . "'
          },
          'fechaAnuncio':{
            'stringValue': '" . $anuncio->fechaAnuncio . "'
          },
          'ubicacion':{
            'stringValue': '" . $anuncio->ubicacion ."'
          },
          'idUsuario':{
            'stringValue': '" . $anuncio->idUsuario ."'
          },
          'imagen1':{
            'stringValue': '" . $anuncio->imagen1 . "'
          },
          'imagen2':{
            'stringValue': '" . $anuncio->imagen2 . "'
          }
      }
    }";

    curl_setopt_array($ch, array(
      CURLOPT_POST=>1,
      CURLOPT_HTTPHEADER=>array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json)
      ),
      CURLOPT_POSTFIELDS=>$json
      ));

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $respuesta = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $respuesta;
  }

  // Método que elimina un Anuncio en funcion de su id //
  public static function deleteById($id)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/" . $id);

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $anuncio = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $anuncio;
  }

}
?>