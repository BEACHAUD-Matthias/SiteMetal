<?php
    $pdo = new PDO("mysql:host=mysql;dbname=DB_PHP;charset=utf8mb4", "root", "root");
    $article_link = $pdo->query("
    SELECT * FROM `Article` 
    LEFT JOIN User ON Article.ref_Auteur=User.id_User
    WHERE id_Article=".$_GET["id_Article"]."
    ")->fetch();
?> 
<!--A partir d'ici commence une variable "ob_start()"-->
<?php ob_start();?>
    <div class='container'>
        <div class='articleFull'>
            <h2><?=$article_link['titre_Article']?></h2>
            <hr>
            <p><?=$article_link['libelle_Article']?></p>
            <hr>
            <p><?=$article_link['pseudo_User']?></p>
            <hr>
            
        </div>
    </div>
<!-- tout ce qui se situe entre ob_start et ob_get_clean est placé dans une variable
<?php $contenuPage = ob_get_clean(); ?>
<?php require("Template.php");?>