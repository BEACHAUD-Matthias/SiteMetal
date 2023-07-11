<?php
    $derniereReview = getLastArticle(refTypeArticle: 1);
    $derniereCritique = getLastArticle(refTypeArticle: 2);
    $dernierEssai = getLastArticle(refTypeArticle: 3);
    // TODO : Faire des Components pour les mini articles
?>

<div class='containerGlobal'>
    <a href="/article?id_Article=<?= $derniereReview['id_Article'] ?>">
        <div class='container'>
            <div class='article'>
                <h2><?= $derniereReview['titre_Article'] ?></h2>
                <hr>
                <p><?= $derniereReview['libelle_Article'] ?></p>
                <hr>
                <p><?= $derniereReview['pseudo_User'] ?></p>
            </div>
        </div>
    </a>
    <a href='/listArticles?id_type_article=1'>
        <button>Liste des Critiques</button>
    </a>
</div>

<div class='containerGlobal'>
    <a href="/article?id_Article=<?= $derniereCritique['id_Article'] ?>">
        <div class='container'>
            <div class='article'>
                <h2><?= $derniereCritique['titre_Article'] ?></h2>
                <hr>
                <p><?= $derniereCritique['libelle_Article'] ?></p>
                <hr>
                <p><?= $derniereCritique['pseudo_User'] ?></p>
            </div>
        </div>
    </a>
    <a href='/listArticles?id_type_article=2'>
        <button>Liste des Interviews</button>
    </a>
</div>

<div class='containerGlobal'>
    <a href="/article?id_Article=<?= $dernierEssai['id_Article'] ?>">
        <div class='container'>
            <div class='article'>
                <h2><?= $dernierEssai['titre_Article'] ?></h2>
                <hr>
                <p><?= $dernierEssai['libelle_Article'] ?></p>
                <hr>
                <p><?= $dernierEssai['pseudo_User'] ?></p>
            </div>
        </div>
    </a>
    <a href='/listArticles?id_type_article=3'>
        <button>Liste des Essais</button>
    </a>
</div>

<?php if (isUserConnected()) { ?>
    <div class='container'>
        <div class='article'>
            <h2><?= $dernierEssai['titre_Article'] ?></h2>
            <hr>
            <p><?= $dernierEssai['libelle_Article'] ?></p>
            <hr>
            <p><?= $dernierEssai['pseudo_User'] ?></p>
        </div>
    </div>
<?php } ?>

