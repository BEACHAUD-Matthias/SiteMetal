<?php
    // Renvois à la page d'accueil si l'id_Article est invalide
    if(!isset($_GET["id_Article"]) || '' == $_GET["id_Article"]) {
        returnHome(); // General.php
    }

    // Récupération des données
    $article = getArticle(id_Article: $_GET["id_Article"]); // Article.php
    $auteur = getUser(id_User: $article['ref_Auteur']); // User.php
?> 

<div class='container'>
    <div class='articleFull'>
        <h2><?=$article['titre_Article']?></h2>
        <hr>
        <p><?=$article['libelle_Article']?></p>
        <hr>
        <p><?=$auteur['pseudo_User']?></p>
        <hr>
    </div>
</div>