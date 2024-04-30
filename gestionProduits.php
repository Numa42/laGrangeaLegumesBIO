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
$produitDAO = new ProduitDAO(MaBD::getInstance());

if (isset($_GET['action']) && $_GET['action'] == 'executer'){
    $produitDAO->delete(intval($_GET['id']));
    header("Location: gestionProduits.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Grange à Légumes BIO</title>
    <link rel="icon" href="assets/image/icon.png">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/gestionProduits.css">
    <script>
        function confirmerAction(id_Produit) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                // Si l'utilisateur confirme, inclure les données du form dans l'url puis exécuter le code PHP
                window.location.href = "gestionProduits.php?action=executer&id=" + id_Produit; // Rediriger vers votre_page.php avec un paramètre d'action
            } else {
                // Si l'utilisateur annule, ne rien faire
            }
        }
    </script>
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
        if (isset($_POST['edit'])) {
            $array = array ();
            $array["id_produit"] = $_POST['id_produit'];
            $array["code_balance"] = $_POST['Code'];
            $array["nom_produit"] = $_POST['Nom'];
            $array["type_produit"] = $_POST['Type'];
            $array["source"] = $_POST['Fournisseur'];
            $array["prix"] = $_POST['Prix'];
            $array["unite"] = $_POST['Unité'];
            $produit = new Produit($array);

            $res = $produitDAO->edit($produit);
            echo "<p class='logMsg'>".$array["nom_produit"]." a été édité</p>";
        }
        if (isset($_POST['remove'])) {

            // Déclencher la fonction JavaScript depuis PHP
            echo "<script>confirmerAction(".$_POST['id_produit'].");</script>";
        }
        ?>
    </section>
    <section class="main">
        <form method='post'>
            <p>Ajouter un produit :</p>
            <section class='form'>
                <section class='text'>
                    <input name='Code' type='text' placeholder="Code balance" />
                    <input name='Nom' type='text' placeholder="Nom" />
                    <input name='Type' type='text' placeholder="Type" />
                    <input name='Fournisseur' type='text' placeholder="Fournisseur" />
                    <input name='Prix' type='text' placeholder="Prix" />
                    <input name='Unité' type='text' placeholder="Unité" />
                    <input type='image' name='add[]' class='btn-content' src='/assets/image/icon/add.svg'>
                </section>
            </section>
        </form>
        <section id='formHead' class='form'>
            <section class='text textHeader'>
                <p class='header'>Code balance<p/>
                <p class='header'>Nom<p/>
                <p class='header'>Type<p/>
                <p class='header'>Fournisseur<p/>
                <p class='header'>Prix<p/>
                <p class='header'>Unité<p/>
            </section>
        </section>
        <?php
        $produits = $produitDAO->getAll();
        foreach (array_keys($produits) as $p){
            $produit = new Produit($produits[$p]);
            $produit->toForm();
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