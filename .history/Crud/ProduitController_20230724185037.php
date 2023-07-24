<?php

function getProducts()
{

    require_once(dirname(__FILE__, 2) . '/templates/navbar.phtml');

    $products = getProducts();
  require_once(dirname(__FILE__, 2) . '/templates/displayposts.php');
  
   getProduct(); 
}