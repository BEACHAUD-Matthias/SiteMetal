<?php

$fonctionsPath = __DIR__ . '/Fonctions';
$files = scandir($fonctionsPath);
foreach ($files as $file) {
    if (str_ends_with($file, '.php')) {
        include_once "$fonctionsPath/$file";
    }
}

// Récupération de la route
$route = $_SERVER['REDIRECT_URL'];
// Attribution de la route 'home' s'il n'y en a pas
$route = '/' == $route ? 'home' : $route;

// Route du fichier dans les assets
$assetPath = __DIR__ . "/Assets/$route";
// Affichage de l'asset s'il existe
if (file_exists($assetPath)) {
    include_once $assetPath;
    exit();
}

// Route du fichier dans les pages
$pagePath = __DIR__ . "/Pages/$route.php";
// Redirection vers la page 404 si la page demandée n'existe pas
if (!file_exists($pagePath)) {
    header("Location: /404");
    exit;
}

$user = sessionGet(attribute: 'user');
$username = $user ? '<p>' . $user['pseudo_User'] . '</p>' : '';
?>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="SiteMetalCSS.css">
        <title>SiteMetal</title>
    </head>
    <body>
        <div class="navbar">
            <a href="/home"><button>Accueil</button></a>
            <a href="/listeArticle?id_type_article=1"><button>Liste Critiques</button></a>
            <a href="/listeArticle?id_type_article=2"><button>Liste Interviews</button></a>
            <a href="/listeArticle?id_type_article=3"><button>Liste Essais</button></a>
            <a href='/login'><button>Connexion</button></a>
            <a href='/disconnect'><button>Déconnexion</button></a>
            <?= $username ?>
        </div>
        <div class='template'>
            <?= include $pagePath; ?>
        </div>
    </body>
</html>

