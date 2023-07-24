<?php

function getProducts()
{
    require_once(dirname(__FILE__,) . '/templates/Crud.php');
     $products = getProduct();
    require_once(dirname(__FILE__,) . '/templates/Crud.php');
    
}