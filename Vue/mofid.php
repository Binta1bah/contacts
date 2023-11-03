<?php
require_once('../Controler/modifierContact.php');
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

    <div class="container">
        <div class="form-container">
            <h2>Modifier ce contact</h2>
            <form id="contactForm" method="post">
                <input type="text" name="nom" placeholder="Nom" value="<?php echo $contact[0]['nom'] ?>"><br>
                <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $contact[0]['prenom'] ?>"><br>
                <input type="text" name="telephone" placeholder="Numéro de téléphone" value="<?php echo $contact[0]['numero'] ?>"><br>
                <div class="favori">
                    <label for="favori">Favori</label>
                    <input class="chek" type="checkbox" name="favori" <?php if ($contact[0]['favori'] == 1) {
                                                                            echo 'checked';
                                                                        } ?>>
                </div>
                <br>
                <input type="hidden" name="modifie" value="<?php echo $contact[0]['id'] ?>">
                <button name="Modifier" type="submit">Modifier</button>
            </form>
        </div>

</body>

</html>