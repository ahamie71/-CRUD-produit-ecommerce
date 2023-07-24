<?php

include "./modele/produit.php";
include "./modele/language.php";


function getProducts()
{
     $products = getProduct();
     $languages=getAllLanguages();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');
 
     
}
function addProduct()
{
    // Check if form fields are set and not empty
    if (
        empty($_POST['reference']) ||
        empty($_POST['description']) ||
        empty($_POST['priceTaxIncl']) ||
        empty($_POST['priceTaxExcl']) ||
        empty($_POST['quantity'])
    ) {
        $error = 'Please fill in all the required fields.';
    } else {
      
        $reference = $_POST['reference'];
        $description = $_POST['description'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
        $quantity = $_POST['quantity'];
        $idLang = $_POST['cat'];
        
       
        
        $result = createProduct($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

        if ($result) {
         
            header('Location: index.php?action=display');
            exit();
        } else {
          
            $error = 'Failed to create product.';
        }
    }
    require_once(dirname(__FILE__, 2) . '/templates/formAjout.phtml');
}

 function modifProduct()

{
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idProduct = $_POST['idProduct'];
    $reference = $_POST['reference'];
    $description = $_POST['description'];
    $priceTaxIncl = $_POST['priceTaxIncl'];
    $priceTaxExcl = $_POST['priceTaxExcl'];
    $idLang = $_POST['idLang'];
    $quantity = $_POST['quantity'];
    $result = updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);
    if ($result) {
        header('Location: index.php?action=display');
        exit();
    } else {
        $error = 'Failed to update product.';
    }
}
$idProduct = $_GET['id']; 
$product = getProductById($idProduct);
require_once(dirname(__FILE__, 2) . '/templates/formModification.phtml');
}

