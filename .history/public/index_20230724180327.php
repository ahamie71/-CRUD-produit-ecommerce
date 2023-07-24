<?php 
session_start();

if (isset($_GET['action'])){

 if ($_GET['action'] == 'display'  && isset( $_SESSION['user'])) {
        require_once(dirname(__FILE__) . 'ProduitController.php');
        
    }
if ($_GET['action'] == 'Home') {
    require_once(dirname(__FILE__) . '/'); 
    homepage();

}
if ($_GET['action'] == 'Register') {
    require_once(dirname(__FILE__) . '/src/controllers/registercontroller.php');
    registration();
}
if ($_GET['action'] == 'addArticle') {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    addArticle();
}

if ($_GET['action'] == 'createArticle'  && isset( $_SESSION['user'])) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    createArticle();
}


if ($_GET['action'] == 'affichecom' && isset( $_SESSION['user'])) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    getcomment();
}


if ($_GET['action'] == 'Edit' && isset( $_SESSION['user'])) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    updateMessage();
}

if ($_GET['action'] == 'Delete') {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    deleteArticle();
}
if ($_GET['action'] == 'displayonepost' ) {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    DisplayOnePost();
    
}

if ($_GET['action'] == 'Connect') {
    require_once(dirname(__FILE__) . '/src/Controllers/logincontroller.php');
    connection();
}

if ($_GET['action'] == 'commenter') {
    require_once(dirname(__FILE__) . '/src/controllers/postscontroller.php');
    addComment();
}

if ($_GET['action'] == 'Admin' && isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
    require_once(dirname(__FILE__) . '/src/controllers/admincontroller.php');
    AdminPage();  
}



if ($_GET['action'] == 'Admincategorie') {
    require_once(dirname(__FILE__) . '/src/controllers/categoriecontroller.php');
    categorie();
   
   
}

if ($_GET['action'] == 'supcat') {
    require_once(dirname(__FILE__) . '/src/controllers/categoriecontroller.php');
    deletecategory();
   
   
}


if ($_GET['action'] == 'cat') {
    require_once(dirname(__FILE__) . '/src/controllers/categoriecontroller.php');
    createCategories();
   
   
}
if ($_GET['action'] == 'adduser') {
    require_once(dirname(__FILE__) . '/src/controllers/admincontroller.php');
    add_user(); 
}

if ($_GET['action'] == 'move') {
    require_once(dirname(__FILE__) . '/src/controllers/admincontroller.php');
    moveUser();
}

if ($_GET['action'] == 'logout') {
    require_once(dirname(__FILE__) . '/src/controllers/logincontroller.php');
    logout();
}
}
 else {
require_once(dirname(__FILE__) . '/src/controllers/homecontrollers.php');
homepage();
}
