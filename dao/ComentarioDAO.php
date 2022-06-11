<?php

class ComentarioDAO implements DAO
{

  // Método que lista todos los Comentarios //
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

    if(count($arrayComentarios) > 0)
    {
      // Por cada Comentario...
      foreach ($arrayComentarios["documents"] as $arrayComentario)
      {
        $arrayDatos = $arrayComentario["fields"];
  
        $idComentario = $arrayDatos["idComentario"]["stringValue"];
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $fecha = $arrayDatos["fecha"]["stringValue"];
        $comentario = $arrayDatos["comentario"]["stringValue"];
  
        $comentario = new Comentario($idComentario,$idAnuncio,$idUsuario,$fecha,$comentario);
  
        array_push($comentarios,$comentario);
      }
    }

    return $comentarios;
  }

  // Método que busca un Comentario por su id //
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

    if(count($arrayComentarios) > 0)
    {
      // Por cada Comentario...
      foreach ($arrayComentarios["documents"] as $arrayComentario)
      {
        $arrayDatos = $arrayComentario["fields"];
        $idComentario = $arrayDatos["idComentario"]["stringValue"];
      
        if($idComentario == $id)
        {
          $rutaDocumento = $arrayComentario["name"];
          $partes = explode("/",$rutaDocumento);

          $idComentario = $partes[count($partes) - 1];
          $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];        
          $fecha = $arrayDatos["fecha"]["stringValue"];
          $comentario = $arrayDatos["comentario"]["stringValue"];
    
          $comentario = new Comentario($idComentario,$idAnuncio,$idUsuario,$fecha,$comentario);
        }
        
      }
    }

    return $comentario;
  }

  // Método que busca los Comentarios por el id del Anuncio //
  public static function findByIdAnuncio($idAnuncio)
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

    if(count($arrayComentarios) >= 1)
    {
      // Por cada Comentario...
      foreach ($arrayComentarios["documents"] as $arrayComentario)
      {
        $arrayDatos = $arrayComentario["fields"];
        $idAnuncioActual = $arrayDatos["idAnuncio"]["stringValue"];
      
        if($idAnuncioActual == $idAnuncio)
        {
          $rutaDocumento = $arrayComentario["name"];
          $partes = explode("/",$rutaDocumento);

          $idComentario = $partes[count($partes) - 1];
          $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];        
          $fecha = $arrayDatos["fecha"]["stringValue"];
          $comentario = $arrayDatos["comentario"]["stringValue"];

          $comentario = new Comentario($idComentario,$idAnuncio,$idUsuario,$fecha,$comentario);

          array_push($comentarios,$comentario);
        }
        
      }
    }

    return $comentarios;
  }

  // Método que modifica/actualiza un Comentario //
  public static function update($comentario)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

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
          'comentario':{
              'stringValue': '" . $comentario->comentario . "'
          }
      }
    }";

     // url
     curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Comentarios/" . $comentario->idComentario);

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
     $usuario = curl_exec($ch);

     // Cierre de la conexión
     curl_close($ch);

     return $comentario;
  }

  // Método que inserta un nuevo Comentario //
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

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $respuesta = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $respuesta;
  }

  // Método que elimina un Comentario en funcion de su id //
  public static function deleteById($id)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Comentarios/" . $id);

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $comentario = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $comentario;
  }

}

?>