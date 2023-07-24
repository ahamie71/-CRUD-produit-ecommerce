<?php

include "./modele/produit.php";

function getProducts()
{
    
     $products = getProduct();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');
     
}
function addArticle()
{

  if (!isset($_POST['reference']) && isset($_POST['description']) && isset($_POST['priceTaxIncl']) && isset($_POST['priceTaxExcl'])) {


  
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