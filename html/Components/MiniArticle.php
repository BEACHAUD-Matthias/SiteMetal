<?php

    /** Mini article */
    function loadMiniArticle(array $article): string
    {
        $id_Article = $article['id_Article'];
        $titre_Article = $article['titre_Article'];
        $libelle_Article = $article['libelle_Article'];
        $pseudo_User = getUser($article['ref_Auteur'])['pseudo_User']; // User.php

        return "
             <a href='/article?id_Article=$id_Article'>
                <div class='container'>
                    <div class='article'>
                        <h2>$titre_Article</h2>
                        <hr>
                        <p>$libelle_Article</p>
                        <hr>
                        <p>$pseudo_User</p>
                    </div>
                </div>
            </a>
        ";
    }
