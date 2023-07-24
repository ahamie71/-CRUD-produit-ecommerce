<?php
include "database.php";
function getPosts()
{
    $db = connectionDataBase();
    $req ="SELECT posts.user_id, posts.id , posts.image, posts.created_at,posts.title,posts.content,users.prenom,categories.name FROM posts
    LEFT JOIN users ON posts.user_id = users.id
    LEFT JOIN categories ON posts.category_id = categories.id";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $articles=$stmt->fetchALL();
     return $articles;

}