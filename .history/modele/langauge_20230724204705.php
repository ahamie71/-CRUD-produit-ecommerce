<?php

include "db.php";

function getlanguage(){
    
    $db = connectionDataBase();
    $stmt = $db->prepare("SELECT * FROM Languages ");
    $stmt->execute();
    $Languages = [];
    while (($row = $stmt->fetch())) {
        $languages= [

           
            'idLang' => $row['idLang'],
            'LanguageName' => $row['LanguageName'],
          
        ];
        $Languages[] = $languages;
    }
    return $languages;
}