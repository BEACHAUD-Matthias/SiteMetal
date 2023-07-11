<?php

require_once 'General.php';

/** Récupère un article par son id */
function getArticle(string $id_Article): mixed
{
    // Récupération de la connexion à la base de données
    $pdo = getPDO(); // Fonction getPDO() hérité de General.php
    // Préparation de la requête pour récupérer l'article
    $query = $pdo->prepare(query: "SELECT * FROM Article WHERE id_Article = :id_Article");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: ['id_Article' => $id_Article]);

    // Retour de l'article récupéré
    return $query->fetch();
}

/**
 * @param string|null $refTypeArticle
 * @param string|null $refAuteur
 *
 * @return mixed
 */
function getLastArticle(?string $refTypeArticle = null, ?string $refAuteur = null): mixed
// TODO : gérer via fetch
// TODO : split PDO (voir getArticle())
{
    $condition = $refTypeArticle ? "WHERE ref_Type_Article = $refTypeArticle" : "";
    $condition .= $refAuteur ? "WHERE ref_Auteur = $refAuteur" : "";

    return getPDO()->query("
        SELECT * FROM Article 
        LEFT JOIN User ON Article.ref_Auteur=User.id_User
        $condition
        ORDER BY Article.id_Article DESC
    ")->fetch();
}