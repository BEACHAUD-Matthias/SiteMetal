<?php
    if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] && $_SESSION['user']){;
        $userName = '<p>'.$_SESSION['user']['pseudo_User'].'</p>';
    }
    else {
        $userName = '';
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="SiteMetalCSS.css">
    </head>
    <body>
        <div class="navbar">
            <a href="Acceuil.php"><button>Acceuil</button></a>
            <a href="ListeArticle.php?id_type_article=1"><button>Liste Critiques</button></a>
            <a href="ListeArticle.php?id_type_article=2"><button>Liste Interviews</button></a>
            <a href="ListeArticle.php?id_type_article=3"><button>Liste Essais</button></a>
            <a href='Log.php'><button>Connexion</button></a>
            <a href='Deconnexion.php'><button>Deconnexion</button></a>
            <?= $userName ?>

        </div>
        <div>
            <?= $contenuPage ?>
        </div>
    </body>     
</html>