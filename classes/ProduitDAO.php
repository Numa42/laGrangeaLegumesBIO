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

    public function insert(Produit $obj): int
    {
        $array = $obj->getAll();
        array_pop($array);
        echo "<p>".implode($array)."</p>";
        $stmt = $this->pdo->prepare("INSERT INTO `Produit`(`code_balance`, `nom_produit`, `type_produit`, `source`, `prix`, `unite`) VALUES (?,?,?,?,?,?)");
        $stmt->execute($array);
        return 1;
    }

    public function edit(Produit $obj): string
    {
        $array = $obj->getAll();
        $stmt = $this->pdo->prepare("UPDATE Produit SET code_balance=?, nom_produit=?, type_produit=?, source=?, prix=?, unite=? WHERE id_produit=?");
        $stmt->execute($array);
        return 1;
    }

    public function delete(int $id): int
    {
        $array = array($id);
        $stmt = $this->pdo->prepare("DELETE FROM `Produit` WHERE id_produit=?");
        $stmt->execute($array);
        return -1;
    }
}