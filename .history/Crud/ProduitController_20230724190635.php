<?php

function getProducts()
{
    require_once(dirname(__FILE__,1).'/templates/Crud.php');
     $products = getProduct();
   
    
}