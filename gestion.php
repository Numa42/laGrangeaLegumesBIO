<?php
include './vendor/autoload.php';

session_start();

// Vérifier si l'utilisateur est déjà connecté
if(!isset($_SESSION['user'])) {
    // Rediriger vers la page protégée
    header("Location: connexion.php");
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
    <link rel="stylesheet" href="css/gestion.css">
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
                    <a href="tarifs.php"><li>Tarifs légumes</li></a>
                </ul>
            </section>
        </nav>
        <img src="assets/image/logoAB.jpg" id="ab">
    </section>
</header>
<main>
    <h2>Panel de <?php echo $_SESSION['user'] ?></h2>
    <section id="panel">
        <section class="panel2">
            <a href="gestionActus.php">
                <img src="assets/image/icon/actu.svg" height="75" width="75" />
                <h3>Gestion actualités</h3>
            </a>
            <a href="gestionProduits.php">
                <img src="assets/image/icon/legumesBold.svg" height="75" width="75" />
                <h3>Gestion produits</h3>
            </a>
            <a href="gestionFormules.php">
                <img src="assets/image/icon/bakalegumes.svg" height="75" width="75" />
                <h3>Gestion formules</h3>
            </a>
        </section>
        <section class="panel2">
            <a href="gestionPartenaires.php">
                <img src="assets/image/icon/partenaires.svg" height="75" width="75" />
                <h3>Gestion partenaires</h3>
            </a>
            <a href="gestionFactures.php">
                <img src="assets/image/icon/facture.svg" height="75" width="75" />
                <h3>Gestion factures</h3>
            </a>
            <a href="gestionClient.php">
                <img src="assets/image/icon/personCircle.svg" height="75" width="75" />
                <h3>Gestion clients</h3>
            </a>
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