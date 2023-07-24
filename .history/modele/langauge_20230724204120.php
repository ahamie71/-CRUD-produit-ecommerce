<?php

include "db.php";

function getlanguage(){
    
    $db = connectionDataBase();
    $stmt = $db->prepare("SELECT * FROM languages ");
    $stmt->execute();
    $categories = [];
    while (($row = $stmt->fetch())) {
        $languages= [

           
            'id' => $row['id'],
            'description' => $row['description'],
          
        ];
        $categories[] = $languages;
    }
    return $categories;
}