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
        // Sanitize the form data (for security)
        $reference = $_POST['reference'];
        $description = $_POST['description'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
        $quantity = $_POST['quantity'];
        $idLang = $_POST['cat'];
        
        // Assuming you have the function createProduct() implemented as shown in the previous responses

        // Call the createProduct() function to add the product to the database
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


