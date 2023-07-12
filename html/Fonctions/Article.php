<?php

/** Récupère un article selon son id */
function getArticle(string $id_Article): mixed
{
    // Récupération de la connexion à la base de données
    $pdo = getPDO(); // General.php
    // Préparation de la requête pour récupérer l'article
    $query = $pdo->prepare(query: "SELECT * FROM Article WHERE id_Article = :id_Article");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: ['id_Article' => $id_Article]);

    // Retour de l'article récupéré
    return $query->fetch();
}


/**
 * Récupère la liste d'articles
 *
 * @param string|null $refTypeArticle Selon le type d'article
 * @param string|null $refAuteur Selon l'auteur
 */
function getListArticle(?string $refTypeArticle = null, ?string $refAuteur = null): array|false
{
    // Init du string de conditions et de l'array de paramètres
    $condition = '';
    $params = [];
    // Ajout de condition et paramètre s'il y a une ref_Type_Article
    if ($refTypeArticle) {
        $condition .= "WHERE ref_Type_Article = :ref_Type_Article";
        $params[":ref_Type_Article"] = $refTypeArticle;
    }
    // Ajout de condition et paramètre s'il y a une ref_Auteur
    if ($refAuteur) {
        $condition .= "WHERE ref_Auteur = :ref_Auteur";
        $params[":ref_Auteur"] = $refAuteur;
    }

    // Récupération de la connexion à la BDD
    $pdo = getPDO(); // General.php
    // Préparation de la requête
    $query = $pdo->prepare(query: "SELECT * FROM Article $condition ORDER BY id_Article DESC");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: $params);

    // Retour des articles récupérés
    return $query->fetchAll();
}


/**
 * Récupère le dernier article
 *
 * @param string|null $refTypeArticle Selon le type d'article
 * @param string|null $refAuteur Selon l'auteur
 */
function getLastArticle(?string $refTypeArticle = null, ?string $refAuteur = null): mixed
{
    // Init du string de conditions et de l'array de paramètres
    $condition = '';
    $params = [];
    // Ajout de condition et paramètre s'il y a une ref_Type_Article
    if ($refTypeArticle) {
        $condition .= "WHERE ref_Type_Article = :ref_Type_Article";
        $params[":ref_Type_Article"] = $refTypeArticle;
    }
    // Ajout de condition et paramètre s'il y a une ref_Auteur
    if ($refAuteur) {
        $condition .= "WHERE ref_Auteur = :ref_Auteur";
        $params[":ref_Auteur"] = $refAuteur;
    }

    // Récupération de la connexion à la BDD
    $pdo = getPDO(); // General.php
    // Préparation de la requête
    $query = $pdo->prepare(query: "SELECT * FROM Article $condition ORDER BY id_Article DESC LIMIT 1");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: $params);

    // Retour de l'article récupéré
    return $query->fetch();
}