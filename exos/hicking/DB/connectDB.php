<?php

    function connectDB() {
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');
            return $pdo;
            // echo 'connect to DB succefully';
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
?>