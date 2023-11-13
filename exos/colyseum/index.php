
<?php

    require 'PHP/connectDB.php';
    $bdd = connectDB();

    
    require 'PHP/select.php';
    $arrAllClients = selectAllClients($bdd);    
    $arrAllShows = selectAllShows($bdd);
    $arrFirstClients = selectFirstClients($bdd);    
    $arrClientsWithCard = selectClientsWithCard($bdd);    
    $arrClientsWithNamesStartingWithM = selectClientsWithNamesStartingWithM($bdd);    
    $arrShowsInfos = selectShowsInfos($bdd);    

    require 'views/index.php';

?>