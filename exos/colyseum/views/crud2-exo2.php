<?php

    function selectCardTypes($bdd) {
        // Prépare la requête SELECT
        $query = 'SELECT * FROM cardTypes;';
        $stmtSelect = $bdd->query($query);
        // Compiler et exécuter la requête
        $arrCardTypes = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
            
        return $arrCardTypes;
    }
    $arrCardTypes = selectCardTypes($bdd);
    
    function selectCards($bdd) {
        // Prépare la requête SELECT
        $query = 'SELECT * FROM cards;';
        $stmtSelect = $bdd->query($query);
        // Compiler et exécuter la requête
        $arrCards = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
            
        return $arrCards;
    }
    $arrCards = selectCards($bdd);
?>

<h2>Ajouter un client</h2>


<!-- Formulaire pour ajouter un nouveaux client -->
<form method="post" action="../DB/crud/crud2-exo2.php">
    <div>
        <input type="text" name="lastName" id="" placeholder="Lastname" required>
    </div>
    <div>
        <input type="text" name="firstName" id="" placeholder="Firstname" required>
    </div>
    <div>
        <input type="date" name="birthDate" id="" placeholder="Birthdate" required>
    </div>
    <div>
        <input type="radio" name="card" id="card">
        <label for="card">Add a loyalty card</label>
    </div>
    <div>
        <input type="number" name="cardNumber" id="" placeholder="Card number" required>
    </div>
    <div>
        <select name="cardTypes" id="">
            <option value="">Choose a card type ...</option>
            <?php foreach($arrCardTypes as $type) { 
                echo '<option value ="' . $type['id'] .  '">' . $type['type'] . '</option>';
            } ?>
        </select>
    </div>

    <div>
        <button type="submit">ADD</button>
    </div>
</form>

<!-- Affiche tous les clients -->
<h2>Tous les clients</h2>
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