<?php

include "./modele/produit.php";

function getProducts()
{
    
     $products = getProduct();
 
     
}
function addArticle()
{
    $error='';
  if (!isset($_POST['reference']) && !isset($_POST['description']) && !isset($_POST['priceTaxIncl']) && !isset($_POST['priceTaxExcl']) && !isset($_POST['quantity'])){
     
    $error='no';
  }
  else{

    $reference = $_POST['reference'];
    $description = $_POST['description'];
    $priceTaxIncl=$_POST['priceTaxIncl'];
    $priceTaxExcl=$_POST['priceTaxExcl'];
    $quantity= $_POST['quantity'];
  
     

  header('location:index.php?action=display');
  exit();
}

}

