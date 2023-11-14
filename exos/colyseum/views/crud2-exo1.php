<h2>Ajouter un client</h2>


<!-- Formulaire pour ajouter un nouveaux client -->
<form method="post" action="../DB/crud/crud2-exo1.php">
    <div>
        <input type="text" name="lastName" id="" placeholder="Lastname" >
    </div>
    <div>
        <input type="text" name="firstName" id="" placeholder="Firstname" required>
    </div>
    <div>
        <input type="date" name="birthDate" id="" placeholder="Birthdate" required>
    </div>
    <div>
        <input type="radio" name="card" id="card">
        <label for="card">Card</label>
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
    </div>
<?php } ?>