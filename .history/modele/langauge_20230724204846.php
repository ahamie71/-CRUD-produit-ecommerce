<?php

include "db.php";

function getAllLanguages()
{
    // Assuming you have already established a database connection using the connectionDataBase() function
    $db = connectionDataBase();

    // Prepare the SQL query
    $query = $db->prepare("SELECT * FROM languages");

    // Execute the query
    $query->execute();

    // Fetch all the results as an associative array
    $languages = $query->fetchAll(PDO::FETCH_ASSOC);

    // Return the array containing all languages
    return $languages;
}