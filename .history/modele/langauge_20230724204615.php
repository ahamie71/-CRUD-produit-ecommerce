<?php

include "db.php";

function getlanguage(){
    
    $db = connectionDataBase();
    $stmt = $db->prepare("SELECT * FROM Languages ");
    $stmt->execute();
    $languages = [];
    while (($row = $stmt->fetch())) {
        $languages= [

           
            'idLang' => $row['idLang'],
            'LanguageName' => $row['LanguageName'],
          
        ];
        $language[] = $languages;
    }
    return $language;
}