<?php
    include_once './Fonctions/General.php';
    $user = sessionGet('user');
    $userName = $user ? '<p>'.$user['pseudo_User'].'</p>' : '';
?>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="SiteMetalCSS.css">
        <title>SiteMetal</title>
    </head>
    <body>
        <div class="navbar">
            <a href="Accueil.php"><button>Accueil</button></a>
            <a href="ListeArticle.php?id_type_article=1"><button>Liste Critiques</button></a>
            <a href="ListeArticle.php?id_type_article=2"><button>Liste Interviews</button></a>
            <a href="ListeArticle.php?id_type_article=3"><button>Liste Essais</button></a>
            <a href='Login.php'><button>Connexion</button></a>
            <a href='Deconnexion.php'><button>Déconnexion</button></a>
            <?= $userName ?>
        </div>
        <div>
            <div class='template'>
                <?= $contenuPage ?? '' ?>
            </div>
        </div>
    </body>
</html>