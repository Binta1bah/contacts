<?php

require_once('../Model/contact.php');
require_once('../Model/db.php');

if (isset($_POST['supprimer'])) {
    $id = $_POST['supprime'];

    $sup = Contact::supprimerContact($connexion, $id);
    echo $sup;
    header('location: ../Vue/form.php');
}
