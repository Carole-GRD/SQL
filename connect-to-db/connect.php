<?php
    $pdo = new PDO('mysql:host=localhost;dbname=votre_base', 'utilisateur', 'mot_de_passe');
?>



<!-- OU BIEN ??? -->

<!-- Créer un nouveau fichier PHP dans un nouveau sous-dossier de var/html/ et utiliser ce code : -->

<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'MOTDEPASSE');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}