<?php

class ProduitDAO extends DAO
{

    public function getOne(int $id): ?object
    {
        // Utilisation d'une requête préparée pour éviter les failles SQL et sécuriser la récupération des données
        $stmt = $this->pdo->prepare("SELECT * FROM Produit WHERE id_produit=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Produit($row);

    }

    public function getAll(): array
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM Produit ORDER BY id_produit");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = $row;
        return $res;

    }

    public function edit(Produit $obj): string
    {
        $array = $obj->getAll();
        $stmt = $this->pdo->prepare("UPDATE Produit SET code_balance=?, nom_produit=?, type_produit=?, source=?, prix=?, unite=? WHERE id_produit=?");
        $stmt->execute($array);
        return implode($array)." - ".$array[0];
    }

    public function delete(object $obj): int
    {
        return -1;
    }
}