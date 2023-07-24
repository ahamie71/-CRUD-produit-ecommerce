<?php

function getProducts()
{
  require_once(dirname(__FILE__, 2) . '/templates/Crud.phtml');
  header('location:index.php?action=display');
  getProduct(); 
}