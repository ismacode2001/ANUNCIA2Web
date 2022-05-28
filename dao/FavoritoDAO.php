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

    if(count($arrayFavoritos) > 0)
    {
      // Por cada Favorito...
      foreach ($arrayFavoritos["documents"] as $arrayFavorito)
      {
        $arrayDatos = $arrayFavorito["fields"];

        $idFavorito = $arrayDatos["idFavorito"]["stringValue"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];

        $favorito = new Favorito($idFavorito,$idUsuario,$idAnuncio);

        array_push($favoritos,$favorito);
      }
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

    if(count($arrayFavoritos) > 0)
    {
      // Por cada Favorito...
      foreach ($arrayFavoritos["documents"] as $arrayFavorito)
      {
        $arrayDatos = $arrayFavorito["fields"];
        $idFavorito = $arrayDatos["idFavorito"]["stringValue"];
       
        if($idFavorito == $id)
        {
          $rutaDocumento = $arrayFavorito["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idFavorito = $partes[count($partes) - 1];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
          $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
    
          $favorito = new Favorito($idFavorito,$idUsuario,$idAnuncio);
        }
      }
    }

    return $favorito;
  }

  // Método que busca un Favorito por el idUsuario y idAnuncio
  public static function findByUsuarioYAnuncio($idUsr,$idAnu)
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

    if(count($arrayFavoritos) > 0)
    {
      // Por cada Favorito...
      foreach ($arrayFavoritos["documents"] as $arrayFavorito)
      {
        $arrayDatos = $arrayFavorito["fields"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
       
        if(($idUsuario == $idUsr)&&($idAnuncio == $idAnu))
        {
          $rutaDocumento = $arrayFavorito["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idFavorito = $partes[count($partes) - 1];
          $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
          $idAnuncio = $arrayDatos["idAnuncio"]["stringValue"];
    
          $favorito = new Favorito($idFavorito,$idUsuario,$idAnuncio);
        }
    }
      
    }

    return $favorito;
  }

  // Método que modifica/actualiza un Favorito
  public static function update($favorito)
  {
     // Objeto de tipo curl para hacer la peticion
     $ch = curl_init();

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
           }
       }
     }";
 
      // url
      curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Favoritos/" . $favorito->idFavorito);
 
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
      $favorito = curl_exec($ch);
 
      // Cierre de la conexión
      curl_close($ch);
 
      return $favorito;
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
          }
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

  // Método que elimina un Favorito en funcion de su id
  public static function deleteById($id)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Favoritos/" . $id);

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $favorito = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $favorito;
  }

}

?>