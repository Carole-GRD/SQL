<?php

/*
|--------------------------------------------------------------------------
| Exo 2
|--------------------------------------------------------------------------
|
| Créer un formulaire permettant d'ajouter un client dans la base de données.
| Il devra comporter les champs : nom, prénom, date de naissance, carte de fidélité (case à cocher) 
| et numéro de carte de fidélité.
| Ajouter à ce formulaire les champs permettant de créer une carte de fidélité : numéro de carte et type de carte.
| Ajouter, grâce à ce formulaire, Louise Ciccone née le 16 août 1958 et possédant une carte de fidélité. 
| Ajouter sa carte de fidélité n°7125. 
| C'est une carte de type 2.
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
    $lastName = sanitizeString2($_POST['lastName'] ?? '');
    $firstName = sanitizeString2($_POST['firstName'] ?? '');
    $birthDate = isset($_POST['birthDate']) ? new DateTime(trim($_POST['birthDate'])) : null;
    $birthDate = $birthDate ? $birthDate->format('Y-m-d') : null;
    $card = isset($_POST['card']) ? 1 : 0;
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : null;
    $cardTypesId = isset($_POST['cardTypes']) ? $_POST['cardTypes'] : null;

    // Inclue le fichier de connexion à la base de données
    require '../connectDB.php';
    $bdd = connectDB();

    try {
        //   =========================    CONCERNANT le nouveau client =========================
        // Prépare la requête
        $queryClient = 'INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber)
        VALUES (:lastName, :firstName, :birthDate, :card, :cardNumber)';
        $stmtInsertClient = $bdd->prepare($queryClient);

        // Associe des valeurs aux paramètres du prepared statement
        $stmtInsertClient->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmtInsertClient->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmtInsertClient->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
        $stmtInsertClient->bindParam(':card', $card, PDO::PARAM_INT);
        $stmtInsertClient->bindParam(':cardNumber', $cardNumber, PDO::PARAM_INT);

        // Compile et exécute la requête pour insérer le client
        $stmtInsertClient->execute();

        //   =========================    CONCERNANT la nouvelle carte =========================
        // Prépare la requête
        $queryCard = 'INSERT INTO cards (cardNumber, cardTypesId)
        VALUES (:cardNumber, :cardTypesId)';
        $stmtInsertCard = $bdd->prepare($queryCard);

        // Associe des valeurs aux paramètres du prepared statement
        $stmtInsertCard->bindParam(':cardNumber', $cardNumber, PDO::PARAM_INT);
        $stmtInsertCard->bindParam(':cardTypesId', $cardTypesId, PDO::PARAM_INT);

        // Compile et exécute la requête pour insérer la carte fidélité
        $stmtInsertCard->execute();

        // Redirige vers la page d'accueil après l'ajout du client
        header('Location: /');
        exit;

    } catch (PDOException $e) {
        // Affiche un message d'erreur si la requête ne s'exécute pas correctement
        echo "Erreur : " . $e->getMessage();
    }
}

?>