<?php

    // echo '<pre>';
    // print_r($arrAllClients);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($arrAllShows);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($arrFirstClients);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($arrClientsWithCard);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($arrClientsWithNamesStartingWithM);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($arrShowsInfos);
    // echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colyseum</title>
</head>
<body>
    <h2>Clients dont le nom commence par la lettre "M".</h2>
    <?php foreach($arrClientsWithNamesStartingWithM as $client) { ?>
        <p>Nom : <?php echo $client['lastName']; ?></p>
        <p>Prénom : <?php echo $client['firstName']; ?></p>
    <?php } ?>

    <h2>Tous les spectacles ainsi que l'artiste, la date et l'heure.</h2>
    <?php foreach($arrShowsInfos as $show) { ?>
        <p><?php echo $show['title']; ?> par <?php echo $show['performer']; ?>, le <?php echo $show['formatted_date']; ?> à <?php echo $show['startTime']; ?>.</p>
    <?php } ?>

    <h2>Tous les clients</h2>
    <?php foreach($arrAllClients as $client) { ?>
        <p>Nom : <?php echo $client['lastName']; ?></p>
        <p>Prénom : <?php echo $client['firstName']; ?></p>
        <p>Date de naissance : <?php echo date("d/m/Y", strtotime($client['birthDate'])); ?></p>
        <p>Carte de fidélité : <?php echo ($client['card'] == 1) ? "Oui" : "Non"; ?></p>
        
        <p>Numéro de carte : <?php if ($client['cardNumber'] != NULL) echo $client['cardNumber']; ?></p>
    <?php } ?>



</body>
</html>