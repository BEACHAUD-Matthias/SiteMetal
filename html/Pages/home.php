<?php
    // Récupération des données
    $derniereReview = getLastArticle(refTypeArticle: 1);
    $derniereCritique = getLastArticle(refTypeArticle: 2);
    $dernierEssai = getLastArticle(refTypeArticle: 3);
?>

<div class="containerGlobal">
    <?= loadMiniArticle($derniereReview) ?>

    <a href='/listArticles?id_type_article=1'>
        <button>Liste des Critiques</button>
    </a>

    <?= loadMiniArticle($derniereCritique) ?>

    <a href='/listArticles?id_type_article=2'>
        <button>Liste des Interviews</button>
    </a>

    <?= loadMiniArticle($dernierEssai) ?>

    <a href='/listArticles?id_type_article=3'>
        <button>Liste des Essais</button>
    </a>
</div>

