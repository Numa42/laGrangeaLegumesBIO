<?php

class produitDAO extends DAO
{

    public function getOne(int $id): ?object
    {
        // Utilisation d'une requête préparée pour éviter les failles SQL et sécuriser la récupération des données
        $stmt = $this->pdo->prepare("SELECT * FROM Produits WHERE code_produit=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Produit($row);

    }

    public function getAll(): array
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM Produits ORDER BY code_produit");
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
}