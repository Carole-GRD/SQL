<?php

/*
|--------------------------------------------------------------------------
| Exo 1
|--------------------------------------------------------------------------
|
| Afficher tous les clients.
|
*/
function selectAllClients($bdd) {
    // Prépare la requête SELECT
    $query = 'SELECT * FROM clients;';
    $stmtSelect = $bdd->query($query);
    // Compiler et exécuter la requête
    $arrAllClients = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
        
    return $arrAllClients;
}

/*
|--------------------------------------------------------------------------
| Exo 2
|--------------------------------------------------------------------------
|
| Afficher tous les types de spectacles possibles.
|
*/
function selectAllShows($bdd) {
    // Prépare la requête SELECT
    $query = 'SELECT * FROM shows;';
    $stmtSelect = $bdd->query($query);
    // Compiler et exécuter la requête
    $arrAllShows = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
        
    return $arrAllShows;
}

/*
|--------------------------------------------------------------------------
| Exo 3
|--------------------------------------------------------------------------
|
| Afficher les 20 premiers clients.
|
*/
function selectFirstClients($bdd) {
    // Prépare la requête SELECT
    $query = 'SELECT * FROM clients LIMIT 20;';
    $stmtSelect = $bdd->query($query);
    // Compiler et exécuter la requête
    $arrFirstClients = $stmtSelect->fetchAll();
        
    return $arrFirstClients;
}

/*
|--------------------------------------------------------------------------
| Exo 4
|--------------------------------------------------------------------------
|
| N'afficher que les clients possédant une carte de fidélité.
|
*/
function selectClientsWithCard($bdd) {
    // Prépare la requête SELECT
    $query = 'SELECT * FROM clients WHERE card = 1;';
    $stmtSelect = $bdd->query($query);
    // Compiler et exécuter la requête
    $arrClientsWithCard = $stmtSelect->fetchAll();
        
    return $arrClientsWithCard;
}

/*
|--------------------------------------------------------------------------
| Exo 5
|--------------------------------------------------------------------------
|
| Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
|   Les afficher comme ceci :
|       Nom : *Nom du client*
|       Prénom : *Prénom du client*
|   Trier les noms par ordre alphabétique.
|
*/
function selectClientsWithNamesStartingWithM($bdd) {
    // Prépare la requête SELECT
    $query = 'SELECT firstName, lastName FROM clients WHERE lastname LIKE "M%" ORDER BY lastname ASC;';
    $stmtSelect = $bdd->query($query);
    // Compiler et exécuter la requête
    $arrClientsWithNamesStartingWithM = $stmtSelect->fetchAll();
        
    return $arrClientsWithNamesStartingWithM;
}

/*
|--------------------------------------------------------------------------
| Exo 6
|--------------------------------------------------------------------------
|
| Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. 
| Trier les titres par ordre alphabétique.
| Afficher les résultat comme ceci : "Spectacle" par "artiste", le "date" à "heure".
|
*/
function selectShowsInfos($bdd) {
    // Prépare la requête SELECT avec la conversion de date
    $query = 'SELECT title, performer, DATE_FORMAT(date, "%m/%d/%Y") AS formatted_date, startTime FROM shows ORDER BY title ASC;';
    
    // Compiler et exécuter la requête
    $stmtSelect = $bdd->query($query);
    
    // Récupérer les résultats sous forme de tableau associatif
    $arrShowsInfos = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
    
    return $arrShowsInfos;
}

/*
|--------------------------------------------------------------------------
| Exo 7
|--------------------------------------------------------------------------
|
| Afficher tous les clients comme ceci :
|   Nom : *Nom du client*
|   Prénom : *Prénom du client*
|   Date de naissance : *Date de naissance du client*
|   Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
|   Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*
|
*/  

?>