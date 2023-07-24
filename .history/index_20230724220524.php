<?php 


if (isset($_GET['action'])){

  if ($_GET['action'] =='display') {
         require_once(dirname(__FILE__) .'/Crud/ProduitController.php');
         getProducts(); 
    }

}

if ($_GET['action'] == 'create' ) {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    addProduct();
 }

 if ($_GET['action'] == 'edit' ) {
require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    modifProduct();   
}

if ($_GET['action'] == 'Delete') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    
}


  


 else {
require_once(dirname(__FILE__,2) . '/Crud/ProduitController.php');
getProducts(); 
}
