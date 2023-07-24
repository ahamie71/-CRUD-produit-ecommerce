<?php
function connectionDataBase()
{
    try {
        return new PDO('mysql:host=localhost;dbname=mBlog;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}