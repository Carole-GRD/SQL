
<?php

    // Inclue le fichier de connexion à la base de données
    require 'DB/connectDB.php';
    $bdd = connectDB();

    // Inclue tous les selects de crud1
    require 'DB/crud/crud1.php';
    $arrAllClients = selectAllClients($bdd);    
    $arrAllShows = selectAllShows($bdd);
    $arrFirstClients = selectFirstClients($bdd);    
    $arrClientsWithCard = selectClientsWithCard($bdd);    
    $arrClientsWithNamesStartingWithM = selectClientsWithNamesStartingWithM($bdd);    
    $arrShowsInfos = selectShowsInfos($bdd);    

    // Inclue les exos crud2
    require 'DB/crud/crud2-exo1.php';
    require 'DB/crud/crud2-exo2.php';

    // Inclue les vues 
    require 'views/index.php';

?>