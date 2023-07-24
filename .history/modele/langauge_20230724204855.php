<?php

include "db.php";

function getAllLanguages()
{
    // Assuming you have already established a database connection using the connectionDataBase() function
    $db = connectionDataBase();

    
    $query = $db->prepare("SELECT * FROM languages");

    
    $query->execute();

   
    $languages = $query->fetchAll(PDO::FETCH_ASSOC);

    
    return $languages;
}