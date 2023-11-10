<?php

    require 'db/connectDB.php';
    $bdd = connectDB();

    require 'functions/selectCityFunction.php';
    $arrAll = selectCity($bdd);

    require 'views/weather.php';

?>