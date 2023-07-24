<?php

include "db.php";
function getProduct()
{
    $db = connectionDataBase();
    $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
     LEFT JOIN languages ON products.idLang = languages.idLang";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $products=$stmt->fetchAll();
     return $products;
     
}
function getProduct($id)
{
    
    $Connect = connectionDataBase();
    $req ="SELECT posts.user_id, posts.id, posts.image, posts.created_at,posts.title,posts.content,users.prenom,categories.name FROM posts
    LEFT JOIN users ON posts.user_id = users.id
    LEFT JOIN categories ON posts.category_id = categories.id 
    WHERE posts.id =  $id";
    $search = $Connect->prepare($req);
    $search->execute();
    $post = $search->fetch();
    return $post;

}
