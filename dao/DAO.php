<?php

interface DAO
{
    // Método que lista todos los documentos
    public static function findAll();

    // Método que busca un documentos por su id
    public static function findById($id);

    // Método que modifica/actualiza un documentos
    public  static function update($objeto);

    // Método que crea un nuevo documentos
    public static function save($objeto);

    // Método que elimina un documentos en funcion de su id
    public static function deleteById($id);
}

?>