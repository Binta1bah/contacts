<?php

require_once('../Model/contact.php');
require_once('../Model/db.php');

if (isset($_POST['listeFavori'])) {

    $favori = Contact::listeFavori($connexion);

    header('location: ../Vue/favori.php');

    // var_dump($favori);
    // die;
}

$favori = Contact::listeFavori($connexion);
