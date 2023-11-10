<?php

    function selectCity($bdd) {
        // Prépare la requête SELECT
        $query = 'SELECT * FROM Météo;';
        $stmtSelect = $bdd->query($query);
        // Compiler et exécuter la requête
        $arrAll = $stmtSelect->fetchAll();
        // // echo '<pre>';
        // // print_r($arrAll);
        // // echo '</pre>';
        return $arrAll;
    }

?>