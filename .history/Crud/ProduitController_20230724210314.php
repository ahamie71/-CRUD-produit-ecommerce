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
            // Product created successfully, redirect to the display page
            header('Location: index.php?action=display');
            exit();
        } else {
            // Failed to create the product, show an error message
            $error = 'Failed to create product.';
        }
    }
    require_once(dirname(__FILE__, 2) . '/templates/formAjout.phtml');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the function updateProduct() implemented as shown in the previous responses

    $idProduct = $_POST['idProduct'];
    $reference = $_POST['reference'];
    $description = $_POST['description'];
    $priceTaxIncl = $_POST['priceTaxIncl'];
    $priceTaxExcl = $_POST['priceTaxExcl'];
    $idLang = $_POST['idLang'];
    $quantity = $_POST['quantity'];

   
    $result = updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

    if ($result) {
        // Product updated successfully, redirect to the display page or show a success message
        header('Location: index.php?action=display');
        exit();
    } else {
        // Failed to update the product, show an error message
        $error = 'Failed to update product.';
    }
}

// Assuming you have the function getProductById() implemented to retrieve the product details for editing
$idProduct = $_GET['id']; // Assuming you pass the product ID as a parameter in the URL
$product = getProductById($idProduct);

// Load the edit.html page and pass the product details to it
require_once(dirname(__FILE__, 2) . '/templates/edit.html');
?>


