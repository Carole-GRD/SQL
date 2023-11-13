
<?php

    require 'DB/connectDB.php';
    $bdd = connectDB();

    require 'DB/crud/crud1.php';
    $arrAllClients = selectAllClients($bdd);    
    $arrAllShows = selectAllShows($bdd);
    $arrFirstClients = selectFirstClients($bdd);    
    $arrClientsWithCard = selectClientsWithCard($bdd);    
    $arrClientsWithNamesStartingWithM = selectClientsWithNamesStartingWithM($bdd);    
    $arrShowsInfos = selectShowsInfos($bdd);    

    require 'DB/crud/crud2-exo1.php';


    require 'views/index.php';

?>