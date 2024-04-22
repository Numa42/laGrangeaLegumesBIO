<?php

include './vendor/autoload.php';

session_start();

$compteDAO = new CompteDAO(MaBD::getInstance());

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Grange à Légumes BIO</title>
    <link rel="icon" href="assets/image/icon.png">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/connexion.css">
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
    <form method="post">
        <h2>CONNEXION</h2>
        <div id="connect">
            <section class="input">
                <label for="id"></label>
                <input type="text" id="id" name="login" placeholder="Nom d'utilisateur" required>
            </section>
            <section class="input">
                <label for="psw"></label>
                <input type="password" id="psw" name="password" placeholder="Mot de passe" required>
            </section>
            <?php
            if (isset($_POST['log'])) {
                $login = $_POST['login'];
                $mdp = $_POST['password'];

                // Vérification des identifiants avec la méthode check de CompteDAO
                $compte = $compteDAO->check($login, $mdp);

                if ($compte!==null){
                    $_SESSION['user'] = $login; // Stocker l'identifiant de l'utilisateur dans la session
                    header("Location: gestion.php");
                    exit;
                }else{
                    echo "<p class='erreur'>Identifiants ou mot de passe incorrects</p>";
                }
            }
            ?>
        </div>
        <input class="send" type="submit" value="CONNEXION" name="log[]">
    </form>

</main>
<footer>
    <p>&copy; 2024 La Grange à Légumes Bio. Tous droits réservés.</p>
    <p>Ce site web à été réalisé par Numa Verpillon</p>
</footer>
</body>
<script src="js/base.js"></script>
</html>