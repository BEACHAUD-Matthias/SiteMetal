<?php
    $pdo = new PDO("mysql:host=mysql;dbname=DB_PHP;charset=utf8mb4", "root", "root");
    $derniereReview = $pdo->query("
        SELECT * FROM `Article` 
        LEFT JOIN Type_Article ON Article.ref_Type_Article=Type_Article.id_Type_Article
        LEFT JOIN User ON Article.ref_Auteur=User.id_User
        WHERE id_Type_Article=1 ORDER BY Article.id_Article DESC
    ")->fetch();
    $derniereCritique = $pdo->query("
        SELECT * FROM `Article`
        LEFT JOIN Type_Article ON Article.ref_Type_Article=Type_Article.id_Type_Article
        LEFT JOIN User ON Article.ref_Auteur=User.id_User
        WHERE id_Type_Article=2 ORDER BY Article.id_Article DESC
    ")->fetch();
    $dernierEssai = $pdo->query("
        SELECT * FROM `Article` 
        LEFT JOIN Type_Article ON Article.ref_Type_Article=Type_Article.id_Type_Article
        LEFT JOIN User ON Article.ref_Auteur=User.id_User
        WHERE id_Type_Article=3 ORDER BY Article.id_Article DESC
    ")->fetch();
?> 
<!--A partir d'ici commence une variable "ob_start()"-->
<?php ob_start();?>
        <div class='containerGlobal'>
            <a href="VueArticle.php?id_Article=<?=$derniereReview['id_Article']?>">
                <div class='container' >
                    <div class='article'>
                        <h2><?=$derniereReview['titre_Article']?></h2>
                        <hr>
                        <p><?=$derniereReview['libelle_Article']?></p>
                        <hr>
                        <p><?=$derniereReview['pseudo_User']?></p>
                    </div>
                </div>
            </a>
            <a href='ListeArticle.php?id_type_article=1'><button>Liste des Critiques</button></a>
        </div>

        <div class='containerGlobal'>
            <a href="VueArticle.php?id_Article=<?=$derniereCritique['id_Article']?>">
                <div class='container'>
                    <div class='article'>
                        <h2><?=$derniereCritique['titre_Article']?></h2>
                        <hr>
                        <p><?=$derniereCritique['libelle_Article']?></p>
                        <hr>
                        <p><?=$derniereCritique['pseudo_User']?></p>
                    </div>
                </div>
            </a>
            <a href='ListeArticle.php?id_type_article=2'><button>Liste des Interviews</button></a>
        </div>
        
        <div class='containerGlobal'>
            <a href="VueArticle.php?id_Article=<?=$dernierEssai['id_Article']?>">
                <div class='container'>
                    <div class='article'>
                        <h2><?=$dernierEssai['titre_Article']?></h2>
                        <hr>
                        <p><?=$dernierEssai['libelle_Article']?></p>
                        <hr>
                        <p><?=$dernierEssai['pseudo_User']?></p>
                    </div>
                </div>
            </a>
            <a href='ListeArticle.php?id_type_article=3'><button>Liste des Essais</button></a>
        </div>

        <?php
            session_start();
            if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
        ?>

            <div class='container'>
                <div class='article'>
                    <h2><?=$dernierEssai['titre_Article']?></h2>
                    <hr>
                    <p><?=$dernierEssai['libelle_Article']?></p>
                    <hr>
                    <p><?=$dernierEssai['pseudo_User']?></p>
                </div>
            </div>
        <?php } ?>

<!-- tout ce qui se situe entre ob_start et ob_get_clean est placé dans une variable
<?php $contenuPage = ob_get_clean(); ?>
<?php require("Template.php");?>

