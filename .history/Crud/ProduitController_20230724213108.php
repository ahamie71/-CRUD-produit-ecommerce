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

 function modifProduct()

{
    if (isset($_POST['reference']) && isset($_POST['description']) && isset($_POST['priceTaxIncl']) && !isset($_POST['priceTaxExcl']) && !isset($_POST['quantity'])){
        $reference= $_POST['reference'];
        $description= $_POST['description'];
        $id = $_GET['idLang'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
       
       
        if ($post->getUserId() === $_SESSION['user']->getId()) {
          $post = $postRepo->editPost($content, $id, $title);
          header("location:index.php?action=Display");
        } else {
          header('location:index.php?action=Logout');
        }
      }
      $repo = new PostRepository();
      $post = $repo->getPostById($_GET['id']);
      require_once(dirname(__FILE__, 2) . '/View/Posts/EditForm.php');
    }
