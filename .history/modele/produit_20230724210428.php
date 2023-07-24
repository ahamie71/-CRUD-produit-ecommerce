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
function getProductById($idProduct)
{
    $Connect = connectionDataBase();
    $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
    LEFT JOIN languages ON products.idLang = languages.idLang;
    WHERE products.idProduct =  $id";
    $search = $Connect->prepare($req);
    $search->execute();
    $product = $search->fetch();
    return $product;

}
function deletepost($id)
{
    $Connect = connectionDataBase();
    $sql = "DELETE FROM posts WHERE id= $id";
    $delet = $Connect->prepare($sql);
    $delet->execute();

}

function updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
{
   
    $db = connectionDataBase();


    $query = $db->prepare("UPDATE products 
                          SET reference = ?, 
                              description = ?, 
                              priceTaxIncl = ?, 
                              priceTaxExcl = ?, 
                              idLang = ?, 
                              quantity = ? 
                          WHERE idProduct = ?");

    
    $result = $query->execute([
        $reference,
        $description,
        $priceTaxIncl,
        $priceTaxExcl,
        $idLang,
        $quantity,
        $idProduct
    ]);

    // Return true if the update was successful, otherwise, return false
    return $result;
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




