<?php

class MaBD
{
    static private $pdo = null; // Le singleton

    // Obtenir l'instance unique de la classe (singleton)
    static function getInstance(): PDO
    {
        // Informations de connexion à la base de données
        $dsn = "mysql:host=localhost;dbname=u953514786_Gestion;charset=utf8";
        $username = "u953514786_Admin";
        $password = "Admini42";

        // Si la connexion n'a pas encore été établie, on la crée
        if (self::$pdo == null) {

            // Création d'une nouvelle instance de la classe PDO (connexion à la base de données)
            try {
                self::$pdo = new PDO($dsn, $username, $password);
            } catch(PDOException $e) {
                echo 'Erreur de connexion : ' . $e->getMessage();
            }
        }

        // Retourne l'instance unique de la classe PDO
        return self::$pdo;
    }
}