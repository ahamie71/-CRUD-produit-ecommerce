<?php

function getProducts()
{
    require_once(dirname(__FILE__,3).'/templates/Crud.php');
     $products = getProduct();
   
    
}