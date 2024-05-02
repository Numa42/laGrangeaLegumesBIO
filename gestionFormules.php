<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include './vendor/autoload.php';

    session_start();

    if(!isset($_SESSION['user'])) {
        // Rediriger vers la page protégée
        header("Location: connexion.php");
        exit;
    }

    // Obtenir l'instance de la base de données
    $formuleDAO = new FormuleDAO(MaBD::getInstance());
    $produitDAO = new ProduitDAO(MaBD::getInstance());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Grange à Légumes BIO</title>
    <link rel="icon" href="assets/image/icon.png">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/gestionFormules.css">
</head>
<body>
<header>
    <a href="index.html">
        <img src="assets/image/logo.png">
    </a>
    <section class="title">
        <h1>LA GRANGE À LÉGUMES </h1><h1 class="bio">BIO</h1>
    </section>
    <section id="right">
        <img id="menuIcon" src="assets/image/menuIcon.png" onclick="toggleStatus()">
        <img id="menuClose" src="assets/image/menuClose.png" onclick="toggleStatus()">
        <nav id="nav">
            <section id="menu0">
                <a id="acceuil" href="index.html"><p class="pMenu">Accueil</p></a>
            </section>
            <section id="menu1">
                <a id="panel" href="panel.php"><p class="pMenu">Panel</p></a>
            </section>
        </nav>
        <img src="assets/image/logoAB.jpg" id="ab">
    </section>
</header>
<main>
    <section class="mainSection">
        <h2>ÉDITION DES FORMULES PANIERS</h2>
        <section id="formules">
            <section class="formule" id="ptit">
                <h3>P'TIT</h3>
                <ul class="ptit">
                    <?php
                    $array = $formuleDAO->getAll();
                    for ($i=0; $i>count($array); $i++){
                        $formule = new Formule($array[$i]);
                        if ($formule->num === 0){
                            $produit = $produitDAO->getOne($formule->produit);
                            $produit->toList();
                        }
                    }
                    ?>
                </ul>
                <section class="add">
                    <input name="produit" class="textArea" type="text">
                    <input id="addBtn" type="image" src="assets\image\icon\add.svg">
                </section>
            </section>
            <section class="formule" id="moyen">
                <h3>MOYEN</h3>
                <ul class="moyen">
                    <?php
                    $array = $formuleDAO->getAll();
                    for ($i=0; $i>count($array); $i++){
                        $formule = new Formule($array[$i]);
                        if ($formule->num === 1){
                            $produit = $produitDAO->getOne($formule->produit);
                            $produit->toList();
                        }
                    }
                    ?>
                </ul>
                <section class="add">
                    <input name="produit" class="textArea" type="text">
                    <input id="addBtn" type="image" src="assets\image\icon\add.svg">
                </section>
            </section>
            <section class="formule" id="grand">
                <h3>GRAND</h3>
                <ul class="grand">
                    <?php
                        $array = $formuleDAO->getAll();
                        for ($i=0; $i>count($array); $i++){
                            $formule = new Formule($array[$i]);
                            if ($formule->num === 2){
                                $produit = $produitDAO->getOne($formule->produit);
                                $produit->toList();
                            }
                        }
                    ?>
                </ul>
                <section class="add">
                    <input name="produit" class="textArea" type="text">
                    <input id="addBtn" type="image" src="assets\image\icon\add.svg">
                </section>
            </section>
        </section>
        <section id="vider">
            <button>VIDER</button>
        </section>
    </section>
</main>
<footer>
    <p>&copy; 2024 La Grange à Légumes Bio. Tous droits réservés.</p>
    <p>Ce site web à été réalisé par Numa Verpillon</p>
</footer>
</body>
<script src="js/base.js"></script>
</html>