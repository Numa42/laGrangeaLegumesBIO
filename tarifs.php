<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './vendor/autoload.php';

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
    <link rel="stylesheet" href="css/tarifs.css">
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
        <nav>
            <section id="menu0">
                <a id="acceuil" href="index.html"><p class="pMenu">Acceuil</p></a>
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
                    <a href="tarifs.html"><li>Tarifs légumes</li></a>
                </ul>
            </section>
        </nav>
        <img src="assets/image/logoAB.jpg" id="ab">
    </section>
</header>
<main>
    <section id="headTarifs">
        <h2>TARIFS LÉGUMES</h2>
        <p>Mis à jour le 15/04/2024</p>
    </section>
    <h4>Les légumes ci-dessous sont évidemment tous BIO !</h4>
    <table>
        <tr class="thead">
            <td>Nom</td>
            <td>Producteur</td>
            <td>Prix</td>
        </tr>
        <?php
        $produits = $produitDAO->getAll();
            foreach (array_keys($produits) as $p){
                $produit = new Produit($produits[$p]);
                $produit->toTable();
            }
        ?>
    </table>
</main>
<footer>
    <p>&copy; 2024 La Grange à Légumes Bio. Tous droits réservés.</p>
    <p>Ce site web à été réalisé par Numa Verpillon</p>
</footer>
</body>
<script src="js/base.js"></script>
</html>

<!--TODO-->
<!--Indiquation BIO-->
<!--Type passe dans le nom-->