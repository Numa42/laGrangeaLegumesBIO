<?php

class ClientDAO extends DAO
{

    public function getOne(int $id): ?object
    {
        // Utilisation d'une requête préparée pour éviter les failles SQL et sécuriser la récupération des données
        $stmt = $this->pdo->prepare("SELECT * FROM Client WHERE id_produit=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Produit($row);
    }

    public function getAll(): array
    {
        $array = array();
        $stmt = $this->pdo->prepare("SELECT * FROM Client");
        $stmt->execute();
        // Utilisation d'une boucle pour récupérer toutes les lignes
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Ajouter chaque ligne au tableau
            $array[] = $row;
        }
        return $array;
    }
}