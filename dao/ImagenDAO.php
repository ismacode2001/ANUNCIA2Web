<?php

class ImagenDAO implements DAO
{

  // Método que lista todas las imágenes //
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonImagenes = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayImagenes = json_decode($jsonImagenes,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Imagen
    $imagenes = [];

    if(count($arrayImagenes) > 0)
    {
      // Por cada Imagen...
      foreach ($arrayImagenes["documents"] as $arrayImagen)
      {
        $arrayDatos = $arrayImagen["fields"];

        $rutaDocumento = $arrayImagen["name"];
        $partes = explode("/",$rutaDocumento);

        $idImagen = $partes[count($partes) - 1];
        $cadena = $arrayDatos["cadena"]["stringValue"];
        $nombre = $arrayDatos["nombre"]["stringValue"];

        $imagen = new Imagen($idImagen,$cadena,$nombre);

        array_push($imagenes,$imagen);
      }
    }

    return $imagenes;
  }

  // Método que busca una Imagen por su id //
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonImagenes = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayImagenes = json_decode($jsonImagenes,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $imagen = null;

    if(count($arrayImagenes) > 0)
    {
      // Por cada Imagen...
      foreach ($arrayImagenes["documents"] as $arrayImagen)
      {
        $arrayDatos = $arrayImagen["fields"];
        $idImagen = $arrayDatos["idImagen"]["stringValue"];
      
        if($idImagen == $id)
        {
          $rutaDocumento = $arrayImagen["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idImagen = $partes[count($partes) - 1];
          $cadena = $arrayDatos["cadena"]["stringValue"];
          $nombre = $arrayDatos["nombre"]["stringValue"];
    
          $imagen = new Imagen($idImagen,$cadena,$nombre);
        }
      }
    }

    return $imagen;
  }

  // Método que busca una Imagen por su nombre //
  public static function findByNombre($nombre)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonImagenes = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayImagenes = json_decode($jsonImagenes,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $imagen = null;

    if(count($arrayImagenes) > 0)
    {
      // Por cada Imagen...
      foreach ($arrayImagenes["documents"] as $arrayImagen)
      {
        $arrayDatos = $arrayImagen["fields"];
        $nombreImagen = $arrayDatos["nombre"]["stringValue"];
        $idImagen = $arrayDatos["idImagen"]["stringValue"];
      
        if($nombreImagen == $nombre)
        {
          $rutaDocumento = $arrayImagen["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idImagen = $partes[count($partes) - 1];
          $cadena = $arrayDatos["cadena"]["stringValue"];
          $nombreImagen = $arrayDatos["nombre"]["stringValue"];
    
          $imagen = new Imagen($idImagen,$cadena,$nombreImagen);
        }
      }
    }

    return $imagen;
  }

  // Método que modifica/actualiza una Imagen //
  public static function update($imagen)
  {
     // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    $json = "{
      'fields':{
          'idImagen':{
              'stringValue': '" . $imagen->idImagen . "'
          },
          'cadena':{
              'stringValue': '" . $imagen->cadena . "'
          },
          'nombre':{
            'stringValue': '" . $imagen->nombre . "'
        },
      }
    }";

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/" . $imagen->idImagen);

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
    $imagen = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $imagen;
  }

  // Método que inserta una nueva Imagen //
  public static function save($imagen)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/");

    $json = "{
      'fields':{
          'idImagen':{
              'stringValue': '" . $imagen->idImagen . "'
          },
          'cadena':{
              'stringValue': '" . $imagen->cadena . "'
          },
          'nombre':{
            'stringValue': '" . $imagen->nombre . "'
        },
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

  // Método que elimina una Imagen en funcion de su Id //
  public static function deleteById($id)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Imagenes/" . $id);

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $imagen = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $imagen;
  }
}



?>