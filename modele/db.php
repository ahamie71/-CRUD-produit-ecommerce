<?php
function connectionDataBase()
{
    try {
        return new PDO('mysql:host=localhost;dbname=CrudProduit;charset=utf8','ronaldo','123');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}