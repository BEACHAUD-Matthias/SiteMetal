<?php

$fonctionsPath = __DIR__ . '/Fonctions';
$files = scandir($fonctionsPath);
foreach ($files as $file) {
    if (str_ends_with($file, '.php')) {
        include_once "$fonctionsPath/$file";
    }
}

$componentsPath = __DIR__ . '/Components';
$files = scandir($componentsPath);
foreach ($files as $file) {
    if (str_ends_with($file, '.php')) {
        include_once "$componentsPath/$file";
    }
}

// Récupération de la route ('home' si vide)
$route = $_SERVER['REDIRECT_URL'] ?? 'home';

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
    $pagePath = __DIR__ . "/Pages/404.php";
}

$user = sessionGet(attribute: 'user');
$username = $user ? '<p>' . $user['pseudo_User'] . '</p>' : '';
?>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="SiteMetalCSS.css">
        <title>SiteMetal</title>
        <?= loadAlert() ?>
    </head>
    <body>
        <div class="navbar">
            <a href="/home"><button>Accueil</button></a>
            <a href="/listArticles?id_type_article=1"><button>Liste Critiques</button></a>
            <a href="/listArticles?id_type_article=2"><button>Liste Interviews</button></a>
            <a href="/listArticles?id_type_article=3"><button>Liste Essais</button></a>
            <a href='/login'><button>Connexion</button></a>
            <a href='/disconnect'><button>Déconnexion</button></a>
            <?= $username ?>
        </div>
        <div class='template'>
            <?= include $pagePath; ?>
        </div>
    </body>
</html>

