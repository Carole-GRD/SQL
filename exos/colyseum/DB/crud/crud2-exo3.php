<?php
    
/*
|--------------------------------------------------------------------------
| Exo 3
|--------------------------------------------------------------------------
|
| Créer un formulaire permettant d'ajouter un spectacle.
| Il contiendra les champs : titre, artiste, date, type de spectacle, genre 1, genre 2, durée, heure de début.
| Ajouter le spectacle "I love techno" de David Guetta qui a lieu le 20 septembre 2019. 
| C'est un concert (showTypesId : 1) de musique électronique (firstGenresId : 4)
| et clubbing (secondGenreId : 10) qui dure 3 heures et qui commence à 21h.
|
*/

// Fonction de nettoyage des chaînes de caractères
function sanitizeString3($string) {
    $trim_string = trim($string);
    $stripslashes_string = stripslashes($trim_string);
    $cleaned_string = htmlspecialchars($stripslashes_string, ENT_QUOTES, 'UTF-8');
    return $cleaned_string;
}

// Fonction pour formater le temps
function formatTime($time) {
    // Utiliser la classe DateTime pour valider et formater le temps
    $dateTime = DateTime::createFromFormat('H:i', $time);

    // Vérifier si la conversion a réussi
    if ($dateTime instanceof DateTime) {
        // Retourner le temps au format hh:mm:ss
        return $dateTime->format('H:i:s');
    }

    // Retourner null si la conversion a échoué
    return null;
}


// Vérifie si le formulaire a été soumis en utilisant la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitization et validation des entrées du formulaire
    $title = sanitizeString3($_POST['title'] ?? '');
    $performer = sanitizeString3($_POST['performer'] ?? '');
    $date = isset($_POST['date']) ? new DateTime(trim($_POST['date'])) : null;
    $date = $date ? $date->format('Y-m-d') : null;
    $showTypesId = isset($_POST['showTypesId']) ? $_POST['showTypesId'] : null;
    $firstGenresId = isset($_POST['firstGenresId']) ? $_POST['firstGenresId'] : null;
    $secondGenreId = isset($_POST['secondGenreId']) ? $_POST['secondGenreId'] : null;
    $duration = isset($_POST['duration']) ? formatTime($_POST['duration']) : null;
    $startTime = isset($_POST['startTime']) ? formatTime($_POST['startTime']) : null;

    // Inclue le fichier de connexion à la base de données
    require '../connectDB.php';
    $bdd = connectDB();

    try {
        //   =========================    CONCERNANT le nouveau spectacle =========================
        // Prépare la requête d'insertion du spectacle
        $queryShow = 'INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime)
        VALUES (:title, :performer, :date, :showTypesId, :firstGenresId, :secondGenreId, :duration, :startTime)';
        $stmtInsertShow = $bdd->prepare($queryShow);

        // Associe des valeurs aux paramètres du prepared statement
        $stmtInsertShow->bindParam(':title', $title, PDO::PARAM_STR);
        $stmtInsertShow->bindParam(':performer', $performer, PDO::PARAM_STR);
        $stmtInsertShow->bindParam(':date', $date, PDO::PARAM_STR);
        $stmtInsertShow->bindParam(':showTypesId', $showTypesId, PDO::PARAM_INT);
        $stmtInsertShow->bindParam(':firstGenresId', $firstGenresId, PDO::PARAM_INT);
        $stmtInsertShow->bindParam(':secondGenreId', $secondGenreId, PDO::PARAM_INT);
        $stmtInsertShow->bindParam(':duration', $duration, PDO::PARAM_STR);
        $stmtInsertShow->bindParam(':startTime', $startTime, PDO::PARAM_STR);

        // Compile et exécute la requête pour insérer le spectacle
        $stmtInsertShow->execute();


        // Redirige vers la page d'accueil après l'ajout du spectacle
        header('Location: /');
        exit;

    } catch (PDOException $e) {
        // Affiche un message d'erreur si la requête ne s'exécute pas correctement
        echo "Erreur : " . $e->getMessage();
    }
}

?>