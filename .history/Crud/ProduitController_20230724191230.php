<?php

require_once(dirname(__FILE__,2).'/templates/Crud.phtml');

function getProducts()
{
    
     $products = getProduct();
     require_once(dirname(__FILE__,2).'/templates/Crud.phtml');
     
}