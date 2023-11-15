<?php

// Inclue le fichier de connexion à la base de données
require 'DB/connectDB.php';
$bdd = connectDB();


require 'views/read.php';
require 'views/create.php';

?>