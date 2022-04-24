<?php

class ComentarioDAO implements DAO
{

  // Método que lista todos los Favoritos
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Comentarios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonComentarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayComentarios = json_decode($jsonComentarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Comentario
    $comentarios = [];

    // Por cada Comentario...
    foreach ($arrayComentarios["documents"] as $arrayComentario)
    {
      $arrayDatos = $arrayComentario["fields"];

      $idComentario = $arrayDatos["idComentario"]["stringValue"];
      $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
      $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
      $fecha = $arrayDatos["fecha"]["stringValue"];
      $texto = $arrayDatos["texto"]["stringValue"];
      $comentario = $arrayDatos["comentario"]["stringValue"];

      $comentario = new Comentario($idComentario,$idAnuncio,$idUsuario,$fecha,$texto,$comentario);

      array_push($comentarios,$comentario);
    }

    return $comentarios;
  }

  // Método que busca un Comentario por su id
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Comentarios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonComentarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayComentarios = json_decode($jsonComentarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Comentario
    $comentario = null;

    // Por cada Comentario...
    foreach ($arrayComentarios["documents"] as $arrayComentario)
    {
      $arrayDatos = $arrayComentario["fields"];
      $idComentario = $arrayDatos["idComentario"]["stringValue"];
     
      if($idComentario == $id)
      {
        $idComentario = $arrayDatos["idComentario"]["stringValue"];
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];        
        $fecha = $arrayDatos["fecha"]["stringValue"];
        $texto = $arrayDatos["texto"]["stringValue"];
        $comentario = $arrayDatos["comentario"]["stringValue"];
  
        $comentario = new Comentario($idComentario,$idAnuncio,$idUsuario,$fecha,$texto,$comentario);
      }
      
    }

    return $comentario;
  }

  // Método que modifica/actualiza un Comentario
  public static function update($usuario)
  {
    
  }

  // Método que inserta un nuevo Comentario
  public static function save($comentario)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Comentarios/");

    $json = "{
      'fields':{
          'idComentario':{
              'stringValue': '" . $comentario->idComentario . "'
          },
          'idAnuncio':{
              'stringValue': '" . $comentario->idAnuncio . "'
          },
          'idUsuario':{
              'stringValue': '" . $comentario->idUsuario . "'
          },
          'fecha':{
            'stringValue': '" . $comentario->fecha . "'
        },
        'texto':{
            'stringValue': '" . $comentario->texto . "'
        },
        'comentario':{
            'stringValue': '" . $comentario->comentario . "'
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