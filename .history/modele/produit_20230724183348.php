<?php

include "db.php";
function getProducts()
{
    $db = connectionDataBase();
    $req ="SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.languageName FROM products
     LEFT JOIN languages ON products.idLang = languages.idLang";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $products=$stmt->fetchALL();
     return $products;

}