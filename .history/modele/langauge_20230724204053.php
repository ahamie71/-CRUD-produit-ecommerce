<?php

include "db.php";

function getla(){
    
    $db = connectionDataBase();
    $stmt = $db->prepare("SELECT * FROM categories ");
    $stmt->execute();
    $categories = [];
    while (($row = $stmt->fetch())) {
        $categorie = [

            'name' => $row['name'],
            'id' => $row['id'],
            'description' => $row['description'],
          
        ];
        $categories[] = $categorie;
    }
    return $categories;
}