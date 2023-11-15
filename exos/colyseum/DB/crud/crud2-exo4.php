<?php

/*
|--------------------------------------------------------------------------
| Exo 4
|--------------------------------------------------------------------------
|
| Créer un formulaire comprenant les champs : nom, prénom, date de naissance, carte de fidélité (case à cocher)
| et numéro de carte de fidélité.
| Ce formulaire devra permettre de modifier un client.
| Dans ce formulaire, afficher les information de Gabriel Perry. 
| Modifier sa date de naissance : il est né le 9 avril 1994.
|
*/

function sanitizeString2($string) {
    $trim_string = trim($string);
    $stripslashes_string = stripslashes($trim_string);
    $cleaned_string = htmlspecialchars($stripslashes_string, ENT_QUOTES, 'UTF-8');
    return $cleaned_string;
}

// Vérifie si le formulaire a été soumis en utilisant la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitization et validation
    $lastName = sanitizeString2($_POST['lastName']);
    $firstName = sanitizeString2($_POST['firstName']);
    $birthDate = isset($_POST['birthDate']) ? new DateTime(trim($_POST['birthDate'])) : null;
    $birthDate = $birthDate ? $birthDate->format('Y-m-d') : null;
    $card = isset($_POST['card']) ? 1 : 0;
    $cardNumber = isset($_POST['cardNumber']) ? trim($_POST['cardNumber']) : null;

    // ----------------------------------------------------------------------------------------------
    // Inclue le fichier de connexion à la base de données
    require '../connectDB.php';
    $bdd = connectDB();

    // ----------------------------------------------------------------------------------------------
    // Mise à jour du client Gabriel Perry
    $queryUpdate = 'UPDATE clients SET';

    // Ajouter les champs à la requête uniquement s'ils ont été fournis
    if (!empty($lastName)) {
        $queryUpdate .= ' lastName = :lastName,';
    }
    if (!empty($firstName)) {
        $queryUpdate .= ' firstName = :firstName,';
    }
    if (!empty($birthDate)) {
        $queryUpdate .= ' birthDate = :birthDate,';
    }
    if (isset($_POST['card'])) {
        $queryUpdate .= ' card = :card,';
    }
    if (!empty($cardNumber)) {
        $queryUpdate .= ' cardNumber = :cardNumber,';
    }

    // Supprimer la virgule finale si des champs ont été ajoutés à la requête
    $queryUpdate = rtrim($queryUpdate, ',');

    // Ajouter la clause WHERE pour filtrer le client à mettre à jour
    $queryUpdate .= ' WHERE lastName = "Perry" AND firstName = "Gabriel"';

    $stmtUpdate = $bdd->prepare($queryUpdate);

    // ----------------------------------------------------------------------------------------------
    // Associer des valeurs aux paramètres du prepared statement
    if (!empty($lastName)) {
        $stmtUpdate->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    }
    if (!empty($firstName)) {
        $stmtUpdate->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    }
    if (!empty($birthDate)) {
        $stmtUpdate->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
    }
    if (isset($_POST['card'])) {
        $stmtUpdate->bindParam(':card', $card, PDO::PARAM_INT);
    }
    if (!empty($cardNumber)) {
        $stmtUpdate->bindParam(':cardNumber', $cardNumber, PDO::PARAM_INT);
    }


    try {
        $stmtUpdate->execute();
        echo "Le client a été mis à jour avec succès.";
        // Redirige vers la page d'accueil après l'ajout du spectacle
        header('refresh:2; url=/'); // Redirige après 2 secondes
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

?>