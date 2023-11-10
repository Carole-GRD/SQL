<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather app</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Ville</td>
                <th>Haut</td>
                <th>Bas</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrAll as $city): ?>
                <tr>
                    <td><?php echo $city['ville'] ?></td>
                    <td><?php echo $city['haut'] ?></td>
                    <td><?php echo $city['bas'] ?></td>
                    <td><?php require 'deleteCityButton.php'; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php
        echo '<br><br>';
        require 'addCityForm.php';
    ?>
</body>
</html>

