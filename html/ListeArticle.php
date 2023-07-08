<?php
$id_type_article = $_GET["id_type_article"];
    $pdo = new PDO("mysql:host=mysql;dbname=DB_PHP;charset=utf8mb4", "root", "root");
    $articles = $pdo->query("
        SELECT * FROM `Article` 
        LEFT JOIN Type_Article ON Article.ref_type_Article=Type_Article.id_type_Article
        LEFT JOIN User ON Article.ref_Auteur=User.id_User
        WHERE id_type_Article=$id_type_article ORDER BY Article.id_Article DESC
    ");
?> 
<!--A partir d'ici commence une variable "ob_start()"-->
<?php ob_start();?>
    <div class='template'>
        <div class='containerGlobal'>
            <?php foreach($articles as $article){ ?>
                <a href="VueArticle.php?id_Article=<?=$article['id_Article']?>">
                    <div class='container'>
                        <div class='article'>
                            <h2><?=$article['titre_Article']?></h2>
                            <hr>
                            <p><?=$article['libelle_Article']?></p>
                            <hr>
                            <p><?=$article['pseudo_User']?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
<!-- tout ce qui se situe entre ob_start et ob_get_clean est placé dans une variable
<?php $contenuPage = ob_get_clean(); ?>
<?php require("Template.php");?>