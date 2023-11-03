<?php

require_once('../Model/contact.php');
require_once('../Model/db.php');

// var_dump($connexion);
// die;

if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero = $_POST['telephone'];
    $favori = isset($_POST['favori']) && $_POST['favori'] == 'on' ? true : false;

    $contact = new Contact($nom, $prenom, $numero, $favori);

    try {
        $contact->ajouterContact($connexion);
    } catch (PDOException $e) {

        echo "Ajout non effectée " . $e->getMessage();
    }
}


$liste = Contact::afficherContact($connexion);

// var_dump($liste);
// die;
