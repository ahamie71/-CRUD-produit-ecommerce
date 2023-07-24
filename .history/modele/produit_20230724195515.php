<?php

include "db.php";
function getProduct()
{
    $db = connectionDataBase();
    $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
     LEFT JOIN languages ON products.idLang = languages.idLang";
     $stmt = $db->prepare($req);
     $stmt->execute();
     $products=$stmt->fetchAll();
     return $products;
     
}
function getProductById($id)
{
    $Connect = connectionDataBase();
    $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
    LEFT JOIN languages ON products.idLang = languages.idLang;
    WHERE products.idProduct =  $id";
    $search = $Connect->prepare($req);
    $search->execute();
    $post = $search->fetch();
    return $post;

}
function deletepost($id)
{
    $Connect = connectionDataBase();
    $sql = "DELETE FROM posts WHERE id= $id";
    $delet = $Connect->prepare($sql);
    $delet->execute();

}
function editPost($content, $id,$title)
{
    $Connect = connectionDataBase();
    $update = $Connect->prepare("UPDATE  posts SET content=:content , title=:title WHERE id = $id");
    $update->execute(
        array(
            ':content' => $content,
            ':title' => $title
        )
    );

}

function addArticle()
{

  if (isset($_POST['content']) && isset($_POST['title']) && isset($_POST['cat']) && isset($_FILES['image'])) {
$imgPath =uploadPicture($_FILES['image']);
if ($imgPath){
    $content = $_POST['content'];
    $title = $_POST['title'];
    $user_id = $_SESSION['user']['id'];
    $category_id = $_POST['cat'];
    $created_at = date('Y-m-d H:i:s');
    $image =$imgPath;

    require_once(dirname(__FILE__, 2) . '/Model/articles.php');
  createPost($user_id, $title, $content, $image, $created_at, $category_id);
  header('location:index.php?action=display');
  exit();
}
else{

  echo "probleme";
}
  }
else{
  var_dump($_POST);
}
  
}