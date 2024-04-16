<?php

class CompteDAO extends DAO
{
    public function getOne($login): ?object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE Identifiant = ?");
        $stmt->execute([$login]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Compte($row);
    }

    public function getAll(): array
    {
        $res = array();
        $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = $row;
        return $res;
    }

    public function save(object $obj): int
    {
        return -1;
    }

    public function delete(object $obj): int
    {
        return -1;
    }

    public function check($login, $mdp){
        // Vérifier les informations d'identification dans la base de données
        echo "<alt>".$login." - ".$mdp."</alt>";
        $stmt = $this->pdo->prepare("SELECT identifiant FROM Utilisateur WHERE identifiant = '$login' AND mot_de_passe = SHA1('$mdp')");
        echo "<alt>".$stmt->num_rows."</alt>";

        if ($stmt->num_rows > 0) {
            // Authentification réussie
            echo "<p>Réussi</p>";
            return $this->getOne($login);
        } else {
            // Authentification échouée
            echo "<p>Echec</p>";
            return null;
        }
    }

}