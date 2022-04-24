<?php

class AnuncioDAO implements DAO
{
  // Método que lista todos los Anuncios
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Anuncios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonUsuarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayAnuncios = json_decode($jsonUsuarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Anuncio
    $anuncios = [];

    // Por cada Anuncio...
    foreach ($arrayAnuncios["documents"] as $arrayAnuncio)
    {
      $arrayDatos = $arrayAnuncio["fields"];

      $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
      $titulo = $arrayDatos["titulo"]["stringValue"];
      $descripcion = $arrayDatos["descripcion"]["stringValue"];
      $categoria = $arrayDatos["categoria"]["stringValue"];
      $precio = $arrayDatos["precio"]["stringValue"];
      $fechaAnuncio = $arrayDatos["fechaAnuncio"]["stringValue"];
      $ubicacion = $arrayDatos["ubicacion"]["stringValue"];
      $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
      $numFavoritos = $arrayDatos["numFavoritos"]["stringValue"];
      $imagen1 = $arrayDatos["imagen1"]["stringValue"];
      $imagen2 = $arrayDatos["imagen2"]["stringValue"];

      $anuncio = new Usuario($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,$ubicacion,
        $idUsuario,$numFavoritos,$imagen1,$imagen2);

      array_push($anuncios,$anuncio);
    }

    return $anuncios;
  }

  // Método que busca un Anuncio por su id
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

    // Por cada Anuncio...
    foreach ($arrayAnuncios["documents"] as $arrayAnuncio)
    {
      $arrayDatos = $arrayAnuncio["fields"];
      $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
     
      if($idAnuncio == $id)
      {
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
        $titulo = $arrayDatos["titulo"]["stringValue"];
        $descripcion = $arrayDatos["descripcion"]["stringValue"];
        $categoria = $arrayDatos["categoria"]["stringValue"];
        $precio = $arrayDatos["email"]["numberValue"];
        $fechaAnuncio = $arrayDatos["fechaAnuncio"]["stringValue"];
        $ubicacion = $arrayDatos["ubicacion"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $numFavoritos = $arrayDatos["numFavoritos"]["numberValue"];
        $imagen1 = $arrayDatos["imagen1"]["stringValue"];
        $imagen2 = $arrayDatos["imagen2"]["stringValue"];
  
        $anuncio = new Anuncio($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,
            $ubicacion,$idUsuario,$numFavoritos,$imagen1,$imagen2);
      }
    }

    return $anuncio;
  }

  // Método que modifica/actualiza un Anuncio
  public static function update($usuario)
  {
     
  }

  // Método que inserta un nuevo Anuncio
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
              'numberValue': '" . $anuncio->precio . "'
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
          'numFavoritos':{
              'stringValue': '" . $anuncio->numFavoritos . "'
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

    // Ejecuto la conexion
    $respuesta = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $respuesta;
  }

  // Método que elimina un Anuncio en funcion de su id
  public static function deleteById($id)
  {
    
  }

}
?>