<?php

    if(( !isset($_POST['city']) OR $_POST['city']=='')OR  
        (!isset($_POST['max']) OR $_POST['max']=='') OR 
        (!isset($_POST['min']) OR $_POST['min']==''))
    {
        header('Location: ../index.php');
        exit;
    }

    require '../db/connectDB.php';
    $bdd = connectDB();

    // Préparer la requête
    $query = 'INSERT INTO Météo (ville, haut, bas) VALUES (?, ?, ?)';
    $stmtInsert = $bdd->prepare($query);

    // Associer des valeurs aux paramètres du prepared statement
    $stmtInsert->bindParam(1, $_POST['city'], PDO::PARAM_STR);
    $stmtInsert->bindParam(2, $_POST['max'], PDO::PARAM_INT);
    $stmtInsert->bindParam(3, $_POST['min'], PDO::PARAM_INT);

    try {
        // Compiler et exécuter la requête
        $stmtInsert->execute();
        
        // // Récupérer toutes les données retournées
        // $arrAll = $stmt->fetchAll();
        
        // Clore la requête préparée
        $stmtInsert->closeCursor();
        $stmtInsert = NULL;

        header('Location: ../index.php');

    } catch (PDOException $e) {
        // Afficher un message d'erreur si la requête ne s'exécute pas correctement
        echo "Erreur : " . $e->getMessage();
    }
?>