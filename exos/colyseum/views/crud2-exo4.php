<?php

// Récupérer les informations du client Gabriel Perry
$queryClientInfo = 'SELECT * FROM clients WHERE lastName = "Perry" AND firstName = "Gabriel"';
$stmtClientInfo = $bdd->query($queryClientInfo);
$clientInfo = $stmtClientInfo->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($clientInfo);
// echo '</pre>';

// Récupérer tous les clients
$queryAllClients = 'SELECT * FROM clients;';
$stmtAllClients = $bdd->query($queryAllClients);
$arrAllClients = $stmtAllClients->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrAllClients);
// echo '</pre>';

// Récupérer toutes les cartes
$queryCards = 'SELECT * FROM cards;';
$stmtCards = $bdd->query($queryCards);
$arrCards = $stmtCards->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrCards);
// echo '</pre>';

// Récupérer toutes les types de carte
$queryCardTypes = 'SELECT * FROM cardtypes;';
$stmtCardTypes = $bdd->query($queryCardTypes);
$arrCardTypes = $stmtCardTypes->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrCardTypes);
// echo '</pre>';

?>

<h2>Modifier un client</h2>


<!-- Formulaire pour ajouter un nouveaux client -->
<form method="post" action="../DB/crud/crud2-exo4.php">
    <div>
        <input type="text" name="lastName" id="" placeholder="<?php echo $clientInfo['lastName']; ?>">
    </div>
    <div>
        <input type="text" name="firstName" id="" placeholder="<?php echo $clientInfo['firstName']; ?>">
    </div>
    <div>
        <input type="date" name="birthDate" id="" value="<?php echo $clientInfo['birthDate']; ?>">
    </div>
    <div>
        <input type="checkbox" name="card" id="card" <?php if ($clientInfo['card']) echo 'checked' ?>>
        <label for="card">Add a loyalty card</label>
    </div>
    <div>
        <input type="number" name="cardNumber" id="" placeholder="<?php echo $clientInfo['cardNumber']; ?>">
    </div>

    <div>
        <button type="submit">UPDATE</button>
    </div>
</form>



<!-- Affiche tous les clients -->
<h2>Tous les clients</h2>
<!-- arrAllClients est donné par crud1 via index.php (à la racine) -->
<?php foreach($arrAllClients as $client) { ?>   
    <div style="border: 1px solid black; margin: 20px; width: 400px; padding-left: 20px;">
        <p>id : <?php echo $client['id']; ?></p>
        <p>Nom : <?php echo $client['lastName']; ?></p>
        <p>Prénom : <?php echo $client['firstName']; ?></p>
        <p>Date de naissance : <?php echo date("d/m/Y", strtotime($client['birthDate'])); ?></p>
        <p>Carte de fidélité : <?php echo ($client['card'] == 1) ? "Oui" : "Non"; ?></p>
        
        <p>Numéro de carte : <?php if ($client['cardNumber'] != NULL) echo $client['cardNumber']; ?></p>

        <p>Type de carte : <?php
            // Vérifie si le client a une carte de fidélité
            if ($client['card'] == 1) {
                // Parcours la liste des cartes pour trouver la carte correspondante
                foreach ($arrCards as $card) {
                    // Vérifie si le numéro de carte du client correspond à la carte actuellement parcourue
                    if ($client['cardNumber'] == $card['cardNumber']) {
                        // Parcours la liste des types de carte pour trouver le type correspondant
                        foreach ($arrCardTypes as $type) {
                            // Vérifie si l'ID du type de carte correspond à l'ID du type de la carte actuellement parcourue
                            if ($type['id'] == $card['cardTypesId']) {
                                // Affiche le type de carte
                                echo $type['type'];
                            }
                        }
                    }
                }
            }
        ?></p>
    </div>
<?php } ?>


