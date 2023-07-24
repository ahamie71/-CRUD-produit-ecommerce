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


function createProduct($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
{
    

    // Prepare the SQL query
    $query = $db->prepare("INSERT INTO products (reference, description, priceTaxIncl, priceTaxExcl, idLang, quantity) VALUES (?, ?, ?, ?, ?, ?)");

    // Execute the query with the provided product details
    $query->execute([
        $reference,
        $description,
        $priceTaxIncl,
        $priceTaxExcl,
        $idLang,
        $quantity
    ]);

    // Check if the insertion was successful
    if ($query->rowCount() > 0) {
        return true; // Product created successfully
    } else {
        return false; // Failed to create product
    }
}



