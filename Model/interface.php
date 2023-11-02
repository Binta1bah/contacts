<?php

interface InterfaceContact {
    public function ajouterContact($connexion);
    public static function afficherContact($connexion);
    public static function afficherContactUnique($connexion, $id);
    public static function modifierContact($connexion, $id, $nom, $prenom, $numero, $favori);
    public static function supprimerContact($connexion, $id);
}