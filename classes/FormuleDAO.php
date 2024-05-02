<?php

class FormuleDAO extends DAO
{

    public function getOne(int $id): ?object
    {
        // Utilisation d'une requête préparée pour éviter les failles SQL et sécuriser la récupération des données
        $stmt = $this->pdo->prepare("SELECT * FROM Formule WHERE num_formule=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Formule($row);
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Formule");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = $row;
        return $res;
    }
}