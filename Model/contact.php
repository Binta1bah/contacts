<?php


require_once('interface.php');

class Contact implements InterfaceContact
{
    private $nom;
    private $prenom;
    private $numero;
    private $favori;


    public function __construct($nom, $prenom, $numero, $favori)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setNumero($numero);
        $this->setFavori($favori);
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($newNom)
    {
        if (empty($newNom) || !preg_match("/^[a-zA-Z]+$/", $newNom)) {
            throw new Exception("Donner un nom correct svp");
        } else {
            $this->nom = $newNom;
        }
    }

    public function setPrenom($newPrenom)
    {
        if (empty($newPrenom) || !preg_match("/^[a-zA-Z ]+$/", $newPrenom)) {
            throw new Exception("Donner un prénom correct");
        } else {
            $this->prenom = $newPrenom;
        }
    }

    public function setNumero($newNumero)
    {
        if (empty($newNumero) || !preg_match("/^[0-9 +]+$/", $newNumero)) {
            throw new Exception("Donner un numéro de téléphone correct");
        } else {
            $this->numero = $newNumero;
        }
    }

    public function setFavori($newFavori)
    {
        if (!is_bool($newFavori)) {
            throw new Exception("Dites si le numéro est un favori ou pas");
        } else {
            $this->favori = $newFavori;
        }
    }

    public function ajouterContact($connexion)
    {

        try {
            $sql = ("INSERT INTO `contacts`(`nom`, `prenom`, `numero`, `favori`) VALUES (:nom, :prenom, :numero, :favori )");
            $insertion = $connexion->prepare($sql);
            $insertion->bindParam(':nom', $this->nom);
            $insertion->bindParam(':prenom', $this->prenom);
            $insertion->bindParam(':numero', $this->numero);
            $insertion->bindParam(':favori', $this->favori);

            $insertion->execute();
        } catch (PDOException $e) {
            echo "Non ajouté " . $e->getMessage();
        }
    }

    public static function afficherContact($connexion)
    {
        $sql = "SELECT * FROM `contacts` ORDER BY nom ASC;";
        $affiche = $connexion->query($sql);
        $resultat = $affiche->fetchAll();

        return $resultat;
    }

    public static function afficherContactUnique($connexion, $id)
    {
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $affiche = $connexion->prepare($sql);
        $affiche->bindParam(':id', $id);
        $affiche->execute();
        $resultat = $affiche->fetchAll();

        return $resultat;
    }

    public static function modifierContact($connexion, $id, $nom, $prenom, $numero, $favori)
    {
        $sql = "UPDATE `contacts` SET nom = :nom , prenom = :prenom, numero = :numero, favori = :favori WHERE id = :id";
        $update = $connexion->prepare($sql);
        $update->bindParam(':id', $id);
        $update->bindParam(':nom', $nom);
        $update->bindParam(':prenom', $prenom);
        $update->bindParam(':numero', $numero);
        $update->bindParam(':favori', $favori);

        $update->execute();

        return "Modification effectuée";
    }

    public static function supprimerContact($connexion, $id)
    {
        $sql = "DELETE FROM `contacts` WHERE id = :id";
        $delete = $connexion->prepare($sql);
        $delete->bindParam(':id', $id);
        $delete->execute();

        return "Suppression effectuté";
    }

    public static function listeFavori($connexion)
    {
        $sql = "SELECT * FROM `contactfavori`";
        $resultat = $connexion->query($sql);
        $resultat->execute();
        $liste = $resultat->fetchAll();

        return $liste;
    }
}
