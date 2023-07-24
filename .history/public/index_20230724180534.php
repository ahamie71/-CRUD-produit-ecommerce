<?php 
session_start();

if (isset($_GET['action'])){

 if ($_GET['action'] == 'display' ) {
        require_once(dirname(__FILE__) . '/Crud/ProduitController.php');
        
    }
if ($_GET['action'] == 'Home') {
    require_once(dirname(__FILE__) . '/Crud/ProduitController.php'); 
    homepage();

}


if ($_GET['action'] == 'createArticle'  && isset( $_SESSION['user'])) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    createArticle();
}




if ($_GET['action'] == 'Edit' && isset( $_SESSION['user'])) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    updateMessage();
}

if ($_GET['action'] == 'Delete') {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    deleteArticle();
}


}
  

if ($_GET['action'] == 'logout') {
    require_once(dirname(__FILE__) . '/src/controllers/logincontroller.php');
    logout();
}

 else {
require_once(dirname(__FILE__) . '/src/controllers/homecontrollers.php');
homepage();
}
