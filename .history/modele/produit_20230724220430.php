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
    WHERE products.idProduct =  $idProduct";
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
    // Assuming you have already established a database connection using the connectionDataBase() function
    $db = connectionDataBase();

    // Prepare the SQL query
    $query = $db->prepare("UPDATE products 
                          SET reference = ?, 
                              description = ?, 
                              priceTaxIncl = ?, 
                              priceTaxExcl = ?, 
                              idLang = ?, 
                              quantity = ? 
                          WHERE idProduct = ?");

    // Execute the query with the updated product details and product ID
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
function deleteProduct($idProduct)
{
   
    $db = connectionDataBase();

   
    $query = $db->prepare("DELETE FROM products WHERE idProduct = ?");

   
    $result = $query->execute([$idProduct]);


    return $result;
}


