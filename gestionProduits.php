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

if(isset($_POST)){
    $str = "";
    foreach($_POST as $p){
        $str .= $p;
    }
    echo "<pre>".$str."</pre>";
}

// Obtenir l'instance de la base de données
$produitDAO = new ProduitDAO(MaBD::getInstance());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Grange à Légumes BIO</title>
    <link rel="icon" href="assets/image/icon.png">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/gestionProduits.css">
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
                <p id="entreprise" class="pMenu">L'entreprise</p>
                <ul id="menuEntreprise" class="menu">
                    <a href="presentation.html"><li>Présentation</li></a>
                    <a href="partenaires.html"><li>Partenaires</li></a>
                    <a href="contact.html"><li>Contact</li></a>
                </ul>
            </section>
            <section id="menu2">
                <p id="vente" class="pMenu">Paniers</p>
                <ul id="menuVente" class="menu">
                    <a href="formules.html"><li>Formules</li></a>
                    <a href="conditionsVente.html"><li>Conditions de ventes</li></a>
                    <a href="tarifs.php"><li>Tarifs légumes</li></a>
                </ul>
            </section>
        </nav>
        <img src="assets/image/logoAB.jpg" id="ab">
    </section>
</header>
<main>
    <section class="msg">
        <?php

        ?>
    </section>
    <section class="main">
        <?php
        echo "<section class='form'>
                    <p class='id'></p>
                    <section class='text'>
                        <p class='header'>Code balance<p/>
                        <p class='header'>Nom<p/>
                        <p class='header'>Type<p/>
                        <p class='header'>Fournisseur<p/>
                        <p class='header'>Prix<p/>
                        <p class='header'>Unité<p/>
                    </section>
                    <input type='image' name='edit[]' class='btn-content' src='/assets/image/icon/edit.svg'>
                    <input type='image' name='remove[]' class='btn-content' src='/assets/image/icon/remove.svg'>
                </section>";
        $produits = $produitDAO->getAll();
        echo "<pre>oui</pre>";
        foreach (array_keys($produits) as $p){
            $produit = new Produit($produits[$p]);
            $produit->toForm();
        }
        if (isset($_POST['edit'])) {
            $array = array ();
            $array["code_balance"] = $_POST['Code'];
            $array["nom_produit"] = $_POST['Nom'];
            $array["type_produit"] = $_POST['Type'];
            $array["source"] = $_POST['Fournisseur'];
            $array["prix"] = $_POST['Prix'];
            $array["unite"] = $_POST['Unité'];
            $array["id_produit"] = $_POST['id_produit'];
            $produit = new Produit($array);
            $res = $produitDAO->edit($produit);
            echo "<pre>".$res."</pre>";
        }
        if (isset($_POST['remove'])) {
            echo "<p>COUBEH</p>";
        }
        ?>
    </section>
</main>
<footer>
    <p>&copy; 2024 La Grange à Légumes Bio. Tous droits réservés.</p>
    <p>Ce site web à été réalisé par Numa Verpillon</p>
</footer>
</body>
<script src="js/base.js"></script>
</html>