<?php

require_once('../Controler/favori.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/style.css">
    <title>Document</title>
</head>

<body>

    <div id="general">
        <div>
            <h1 id="favori">Mes Contacts Favori</h1>
        </div>

        <div id="FavoriList">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numéro de téléphone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($favori as $f) : ?>
                        <tr>
                            <td><?php echo $f['nom'] ?></td>
                            <td><?php echo $f['prenom'] ?></td>
                            <td><?php echo $f['numero'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>