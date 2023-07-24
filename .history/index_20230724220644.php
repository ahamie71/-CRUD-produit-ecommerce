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

if ($_GET['action'] == 'delete') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    DeletProduct();
}


  


 else {
require_once(dirname(__FILE__,) . '/Crud/ProduitController.php');
getProducts(); 
}
