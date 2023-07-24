<?php

function getarticle()
{
  
  require_once(dirname(__FILE__, 2) . '/templates/navbar.phtml');

  $products = ();
  require_once(dirname(__FILE__, 2) . '/templates/displayposts.php');
}