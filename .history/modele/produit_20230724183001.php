<?php

include "db.php";
function getProducts()
{
    $db = connectionDataBase();
    $req ="SELECT products.idLang, products.id , posts.reference, products.descriptions,products.priceTaxlncl,products.priceTaxExcl,products.quantity,languages.languageName FROM products
    LEFT JOIN users ON posts.user_id = users.id

     $stmt = $db->prepare($req);
     $stmt->execute();
     $articles=$stmt->fetchALL();
     return $articles;

}