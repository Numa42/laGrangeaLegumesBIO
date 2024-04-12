<?php
/*
   Classe abstraite pour l'accès aux données d'une base
   Hypothèse : une table contient toujours un champ id (integer autoincrémenté) qui est la clé primaire.
*/

abstract class DAO
{
    const UNKNOWN_ID = -1; // Identifiant non déterminé
    protected $pdo; // Objet PDO pour l'accès à la table

    // Le constructeur reçoit l'objet PDO contenant la connexion
    public function __construct(PDO $connector){
        $this->pdo = $connector;
    }

    // Méthode abstraite pour récupérer un objet dont on donne l'identifiant
    abstract public function getOne(int $id): ?object;

    // Méthode abstraite pour récupérer tous les objets dans une table
    abstract public function getAll(): array;

    // Méthode abstraite pour sauvegarder l'objet $obj :
    //     $obj->id == UNKNOWN_ID ==> INSERT
    //     $obj->id != UNKNOWN_ID ==> UPDATE
    abstract public function save(object $obj): int;

    // Méthode abstraite pour effacer l'objet $obj (DELETE)
    abstract public function delete(object $obj): int;

}