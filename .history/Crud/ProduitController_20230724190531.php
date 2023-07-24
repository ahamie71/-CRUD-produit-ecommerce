<?php

function getProducts()
{
    require_once(dirname(__FILE__,2) .'/templates/Crud.php');
     $products = getProduct();
   
    
}