<?php

/*
|--------------------------------------------------------------------------
| Exo 1
|--------------------------------------------------------------------------
|
| Créer un formulaire permettant d'ajouter un client dans la base de données.
| Il devra comporter les champs : nom, prénom, date de naissance, carte de fidélité (case à cocher) 
| et numéro de carte de fidélité.
| A l'aide de ce formulaire, ajouter à la liste des clients Alicia Moore née le 8 septembre 1979 
| et ne possédant pas de carte de fidélité.
|
*/
function sanitizeString($string) {
    $trim_string = trim($string);
    $stripslashes_string = stripslashes($trim_string);
    $cleaned_string = htmlspecialchars($stripslashes_string, ENT_QUOTES, 'UTF-8');
    return $cleaned_string;
}

// Vérifie si le formulaire a été soumis en utilisant la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // Sanitization et validation
    $lastName = sanitizeString($_POST['lastName'] ?? '');
    $firstName = sanitizeString($_POST['firstName'] ?? '');
    $birthDate = isset($_POST['birthDate']) ? new DateTime(trim($_POST['birthDate'])) : null;
    $birthDate = $birthDate ? $birthDate->format('Y-m-d') : null;

    // Inclue le fichier de connexion à la base de données
    require '../connectDB.php';
    $bdd = connectDB();
    
    // Prépare la requête
    $query = 'INSERT INTO clients (lastName, firstName, birthDate, card)
    VALUES (?, ?, ?, ?)';
    $stmtInsert = $bdd->prepare($query);

    // Associe des valeurs aux paramètres du prepared statement
    $stmtInsert->bindParam(1, $lastName, PDO::PARAM_STR);
    $stmtInsert->bindParam(2, $firstName, PDO::PARAM_STR);
    $stmtInsert->bindParam(3, $birthDate, PDO::PARAM_STR);
    
    // Vérifie si la case de la carte de fidélité est cochée
    $card = isset($_POST['card']) ? 1 : 0;
    $stmtInsert->bindParam(4, $card, PDO::PARAM_INT);


    try {
        // Compile et exécute la requête
        $stmtInsert->execute();
    
        // Redirige vers la page d'accueil après l'ajout du client
        header('Location: /');
        exit;
    
    } catch (PDOException $e) {
        // Affiche un message d'erreur si la requête ne s'exécute pas correctement
        echo "Erreur : " . $e->getMessage();
    }
}

?>


