<?php


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
function edit($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
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
    
    $db = connectionDataBase();

    
    $query = $db->prepare("INSERT INTO products (reference, description, priceTaxIncl, priceTaxExcl, idLang, quantity) VALUES (?, ?, ?, ?, ?, ?)");

  
    $query->execute([
        $reference,
        $description,
        $priceTaxIncl,
        $priceTaxExcl,
        $idLang,
        $quantity
    ]);

    
    if ($query->rowCount() > 0) {
        return true; 
    } else {
        return false; 
    }
}




