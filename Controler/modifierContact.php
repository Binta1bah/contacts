<?php

require_once('../Model/contact.php');
require_once('../Model/db.php');


if (isset($_POST['modifier'])) {
    $id = $_POST['modif'];

    $contact = Contact::afficherContactUnique($connexion, $id);

    // var_dump($contact);
    // die;
}

if (isset($_POST['Modifier'])) {

    $id = $_POST['modifie'];
    $newNom = $_POST['nom'];
    $newPrenom = $_POST['prenom'];
    $newNumero = $_POST['telephone'];
    $newFavori = isset($_POST['favori']) && $_POST['favori'] == 'on' ? true : false;
    $contact = Contact::afficherContactUnique($connexion, $id);

    $newContact = Contact::modifierContact($connexion, $id, $newNom, $newPrenom, $newNumero, $newFavori);
    echo $newContact;
    header("Location: ../Vue/form.php");

    // var_dump($newContact);
    // die;
}
