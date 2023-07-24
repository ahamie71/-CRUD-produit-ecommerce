<?php

include "./modele/produit.php";

function getProducts()
{
    
     $products = getProduct();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');
     
}
function addArticle()
{

  if (isset($_POST['reference']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])) {
$imgPath =uploadPicture($_FILES['image']);
if ($imgPath){
    $content = $_POST['content'];
    $title = $_POST['title'];
    $user_id = $_SESSION['user']['id'];
    $category_id = $_POST['cat'];
    $created_at = date('Y-m-d H:i:s');
    $image =$imgPath;

    require_once(dirname(__FILE__, 2) . '/Model/articles.php');
  createPost($user_id, $title, $content, $image, $created_at, $category_id);
  header('location:index.php?action=display');
  exit();
}
else{

  echo "probleme";
}
  }
else{
  var_dump($_POST);
}
  
}