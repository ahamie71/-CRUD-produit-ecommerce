<?php

include "db.php";

function getProducts()
{
    
     $products = getProduct();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');
     
}