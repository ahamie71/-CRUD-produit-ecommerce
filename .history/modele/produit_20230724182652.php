<?php

include "db.php";
function getProducts()
{
    $db = connectionDataBase();
    $req ="SELECT products.idLang, products.id , posts.reference, products.,posts.title,posts.content,users.prenom,categories.name FROM posts
    LEFT JOIN users ON posts.user_id = users.id
    LEFT JOIN categories ON posts.category_id = categories.id";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $articles=$stmt->fetchALL();
     return $articles;

}