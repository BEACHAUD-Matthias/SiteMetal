<?php
    // Renvois à la page d'accueil si l'id_type_article est invalide
    if(!isset($_GET["id_type_article"]) || "" == $_GET["id_type_article"]) {
        returnHome(); // General.php
    }

    // Récupération des données
    $articles = getListArticle(refTypeArticle: $_GET["id_type_article"]); // Article.php

    $miniArticles = "";
    if ($articles) {
        foreach ($articles as $article) {
            $miniArticles .= loadMiniArticle($article);
        }
    } else {
        $miniArticles = "<p class='msg'>aucun articles</p>";
    }
?>

<div class='containerGlobal'>
    <?= $miniArticles ?>
</div>