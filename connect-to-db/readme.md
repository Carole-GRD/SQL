# Se connecter à une base de données avec PDO

## Pré-requis

-   Connaître les manipulations de base d'une BD
    -   [SELECT FROM, WHERE, ORDER BY](https://github.com/becodeorg/BXLCentral/blob/master/Parcours/MySQL/1.select.md)
-   Avoir créé sa première base de données
    -   [suivre ce lien pour créer sa BD](https://github.com/becodeorg/BeCode/wiki/Installer-LAMP-sur-Ubuntu)
-   Être familiarisé à PHPMyAdmin


## PDO : deux secondes de théorie...


-   [Introduction à PDO](https://docs.google.com/presentation/d/14-5BGNJyuILB2kfYlxzsaFDRNA8zCrot9DbYVVNo3X4/edit?usp=sharing) - connexion à la DB

PDO est une méthode **d'accès** aux base de données: **P** HP **D** ata **O** bjects.  
PDO est activé par défaut lorsqu'on installe php5.6 ou plus.

Pour le vérifier, rends-toi sur le fichier `info.php` précédement créé (à l'adresse [http://localhost/info.php](http://localhost/info.php)) et fais une recherche sur PDO ( `ctrl/pomme + F`).

> s'il n'est pas activé, vous devrez le faire manuellement dans le fichier php.ini et modifier cette ligne:
> `pdo_mysql.default_socket = /opt/lampp/var/mysql/mysql.sock`

## Se connecter à la BD avec PDO

Tu dois créer un nouveau fichier PHP dans un nouveau sous-dossier de var/html/
et utiliser ce code :

```php
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
```

Pour que ça fonctionne il te faut ces infos :

-   le nom d'hôte (localhost) : généralement ceci ne change pas;
-   la base de données (becode) : c'est le nom de la base de données à manipuler et créée via PHPMyAdmin;
-   le login (root) : ton nom d'utilisateur;
-   le mot de passe : sous WAMP il n'y a pas de mot de passe, sous MAMP le mot de passe est par défaut root mais il se peut que tu l'aie changé lors de la modification des droits d'écriture.

_Qu'est-ce-que c'est que ces TRY et CATCH:_ meme principe que dans async/await, c'est pour "catch" les eventuels erreurs.



[plus d'infos sur PHP.net](http://php.net/manual/fr/book.pdo.php)


