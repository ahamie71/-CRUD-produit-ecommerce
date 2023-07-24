<?php 


if (isset($_GET['action'])){

  if ($_GET['action'] =='display') {
         require_once(dirname(__FILE__,1) . '/Crud/ProduitController.php');
         getProducts(); 
    }

}



// if ($_GET['action'] == 'Home') {
//     require_once(dirname(__FILE__) . '/Crud/ProduitController.php'); 
   

// }

// if ($_GET['action'] == 'createArticle' ) {
//     require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    
// }

// if ($_GET['action'] == 'Edit' ) {
//     require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
   
// }

// if ($_GET['action'] == 'Delete') {
//     require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    
// }

// }
  
// if ($_GET['action'] == 'logout') {
//     require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
    
// }

//  else {
// require_once(dirname(__FILE__,2) . '/Crud/ProduitController.php');

// }
