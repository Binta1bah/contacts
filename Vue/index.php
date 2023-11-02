<?php

require_once('../Controler/ajout.php');
require_once('../Controler/supprimerContact.php');
require_once('../Controler/favori.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/style.css">
    <title>Gestion des Contacts</title>

</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2>Ajouter un contact</h2>
            <form id="contactForm" method="post">
                <input type="text" name="nom" placeholder="Nom" required><br>
                <input type="text" name="prenom" placeholder="Prénom" required><br>
                <input type="text" name="telephone" placeholder="Numéro de téléphone" required><br><br>
                <div class="favori">
                    <label for="favori">Ajouter comme favori</label>
                    <input class="chek" type="checkbox" name="favori">
                </div>
                <br>
                <button name="ajouter" type="submit">Ajouter</button>
            </form>
        </div>

        <div class="contacts-container">
            <div class="enHaut">
                <h2 class="titre">Liste des contacts</h2>
                <form action="" method="post" class="form">
                    <input id="btn" type="submit" name="listeFavori" value="Mes contacts Favoris">
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numéro de téléphone</th>
                        <th>Favori</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="contactsList">
                    <?php foreach ($liste as $li) : ?>
                        <tr>
                            <td><?php echo $li['nom']; ?></td>
                            <td><?php echo $li['prenom']; ?></td>
                            <td><?php echo $li['numero']; ?></td>
                            <td><?php echo $li['favori'] == 1 ? "OUI" : "NON"; ?></td>
                            <td>
                                <div class="modSup">
                                    <form action="mofid.php" method="post">
                                        <input type="hidden" name="modif" value="<?php echo $li['id'] ?>">
                                        <button class="modifier" name="modifier">Modifier</button>

                                    </form>

                                    <form action="" method="post">
                                        <input type="hidden" name="supprime" value="<?php echo $li['id'] ?>">
                                        <button class="supprimer" name="supprimer">Supprimer</button>
                                    </form>
                                </div>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>