<?php 


if (isset($_GET['action'])){

 if ($_GET['action'] == 'display' ) {
        require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
        
    }
if ($_GET['action'] == 'Home') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php'); 
    homepage();

}

if ($_GET['action'] == 'createArticle' ) {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    createArticle();
}

if ($_GET['action'] == 'Edit' ) {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    updateMessage();
}

if ($_GET['action'] == 'Delete') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    deleteArticle();
}

}
  
if ($_GET['action'] == 'logout') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    logout();
}

 else {
require_once(dirname(__FILE__) . '/');
homepage();
}
