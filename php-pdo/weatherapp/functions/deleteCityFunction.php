<?php

    if ( !isset($_POST['delete-city']) OR $_POST['delete-city']=='')
    {
        header('Location: ../index.php');
        exit;
    }

    require '../db/connectDB.php';
    $bdd = connectDB();

    // Préparer la requête
    $query = 'DELETE FROM Météo WHERE ville=:ville';
    $stmtDelete = $bdd->prepare($query);

    echo $_POST['delete-city'];
    // Associer des valeurs aux paramètres du prepared statement
    $stmtDelete->bindParam(':ville', $_POST['delete-city'], PDO::PARAM_STR);

    try {
        // Compiler et exécuter la requête
        $stmtDelete->execute();

        // // Récupérer toutes les données retournées
        // $arrAll = $stmt->fetchAll();

        // Clore la requête préparée
        $stmtDelete->closeCursor();
        $stmtDelete = NULL;

        header('Location: ../index.php');

    } catch (PDOException $e) {
        // Afficher un message d'erreur si la requête ne s'exécute pas correctement
        echo "Erreur : " . $e->getMessage();
    }

?>