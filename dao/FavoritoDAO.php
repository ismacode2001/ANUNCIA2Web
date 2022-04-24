<?php

class FavoritoDAO implements DAO
{

  // Método que lista todos los Favoritos
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Favoritos/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonFavoritos = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayFavoritos = json_decode($jsonFavoritos,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Favorito
    $favoritos = [];

    // Por cada Favorito...
    foreach ($arrayFavoritos["documents"] as $arrayFavorito)
    {
      $arrayDatos = $arrayFavorito["fields"];

      $idFavorito = $arrayDatos["idFavorito"]["stringValue"];
      $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
      $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
      $fecha = $arrayDatos["fecha"]["stringValue"];

      $favorito = new Favorito($idFavorito,$idUsuario,$idAnuncio,$fecha);

      array_push($favoritos,$favorito);
    }

    return $favoritos;
  }

  // Método que busca un Favorito por su id
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Favoritos/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonFavoritos = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayFavoritos = json_decode($jsonFavoritos,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Favorito
    $favorito = null;

    // Por cada Usuario...
    foreach ($arrayFavoritos["documents"] as $arrayFavorito)
    {
      $arrayDatos = $arrayFavorito["fields"];
      $idFavorito = $arrayDatos["idFavorito"]["stringValue"];
     
      if($idFavorito == $id)
      {
        $idFavorito = $arrayDatos["idFavorito"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
        $fecha = $arrayDatos["fecha"]["stringValue"];
  
        $favorito = new Favorito($idFavorito,$idUsuario,$idAnuncio,$fecha);
      }
      
    }

    return $favorito;
  }

  // Método que modifica/actualiza un Favorito
  public static function update($usuario)
  {
    
  }

  // Método que inserta un nuevo Favorito
  public static function save($favorito)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Favoritos/");

    $json = "{
      'fields':{
          'idFavorito':{
              'stringValue': '" . $favorito->idFavorito . "'
          },
          'idUsuario':{
              'stringValue': '" . $favorito->idUsuario . "'
          },
          'idAnuncio':{
              'stringValue': '" . $favorito->idAnuncio . "'
          },
          'fecha':{
            'stringValue': '" . $favorito->fecha . "'
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

  // Método que elimina un usuario en funcion de su id
  public static function deleteById($id)
  {
    
  }

}

?>