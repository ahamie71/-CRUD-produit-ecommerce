<?php

include "./modele/produit.php";
include "./modele/language.php";

function Acceuil(){

    require_once(dirname(__FILE__,2).'/templates/acceuil.phtml');
     
}
function getProducts()
{
     $products = getProduct();
     $languages=getAllLanguages();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');

     
}


function addProduct()
{
    
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
    $idProduct = $_GET['id'];

    $product = $productRepository->getProductById($idProduct);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérez les données du formulaire d'édition
        $reference = $_POST['reference'];
        $description = $_POST['description'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
        $quantity = $_POST['quantity'];
        $idLang = $_POST['cat'];

        // Mettez à jour le produit en base de données
        $result = $productRepository->updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

        if ($result) {
            header('Location: index.php?action=AfficheCrud');
            exit();
        } else {
            $error = 'Failed to update product.';
        }
    }

    require_once(dirname(__FILE__, 2) . '/templates/EditProduct.php');
}




function DeletProduct()
{
if (isset($_GET['id'])) {
    $idProduct = $_GET['id'];

    // Assuming you have the function deleteProduct() implemented as shown below
    $result = deleteProduct($idProduct);

    if ($result) {
        // Product deleted successfully, redirect to the display page or show a success message
        header('Location: index.php?action=display');
        exit();
    } else {
        // Failed to delete the product, show an error message or redirect to an error page
        echo "Failed to delete product.";
    }
}
}


