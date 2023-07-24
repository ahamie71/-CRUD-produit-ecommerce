<?php

include "db.php";

function getAllLanguages()
{
   
    $db = connectionDataBase();
    $query = $db->prepare("SELECT * FROM languages");
    $query->execute();

   
    $languages = $query->fetchAll(PDO::FETCH_ASSOC);

    
    return $languages;
}