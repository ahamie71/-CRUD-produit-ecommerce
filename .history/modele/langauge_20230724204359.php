<?php

include "db.php";

function getlanguage(){
    
    $db = connectionDataBase();
    $stmt = $db->prepare("SELECT * FROM languages ");
    $stmt->execute();
    $categories = [];
    while (($row = $stmt->fetch())) {
        $languages= [

           
            'idLang' => $row['idLang'],
            'LanguageName' => $row['LanguageName'],
          
        ];
        $language[] = $languages;
    }
    return $languages;
}