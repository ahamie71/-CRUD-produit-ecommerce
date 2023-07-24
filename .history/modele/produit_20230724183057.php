<?php

include "db.php";
function getProducts()
{
    $db = connectionDataBase();
    $req ="SELECT products.idLang, products.id , posts.reference, products.descriptions,products.priceTaxlncl,products.priceTaxExcl,products.quantity,languages.languageName FROM products
    LEFT JOIN languages ON products.idLang = languages.idLang";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $articles=$stmt->fetchALL();
     return $articles;

}