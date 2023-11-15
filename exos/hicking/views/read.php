<?php

// Get all hiking from the database
$query = 'SELECT * FROM hiking;';
$stmtSelect = $bdd->query($query);
$arrAllHiking = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrAllHiking);
// echo '</pre>';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <style>
        th, td {
            text-align: center;
            width: 100px;
        }
        td:first-of-type {
            text-align: left;
            padding-left: 50px;
        }
        tr th:first-of-type,
        tr td:first-of-type {
            width:  400px;
        }
        th:last-of-type,
        td:last-of-type {
            width: 150px;
        }
    </style>
</head>
<body>
    <h1>Liste des randonnées</h1>
    <table>
        <!-- Afficher la liste des randonnées -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Difficulty</th>
                <th>Distance</th>
                <th>Duration</th>
                <th>Height difference</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrAllHiking as $hiking) { ?>
                <tr>
                    <td><?php echo $hiking['name'] ?></td>
                    <td><?php echo $hiking['difficulty'] ?></td>
                    <td><?php echo $hiking['distance'] ?></td>
                    <td><?php echo $hiking['duration'] ?></td>
                    <td><?php echo $hiking['height_difference'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>