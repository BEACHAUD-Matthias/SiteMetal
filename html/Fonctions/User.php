<?php

require_once 'General.php';

/**
 * @param string $id_User
 * @return mixed
 */
function getUser(string $id_User): mixed
{
    // Récupération de la connexion à la base de données
    $pdo = getPDO(); // Fonction getPDO() hérité de General.php
    // Préparation de la requête pour récupérer l'utilisateur
    $query = $pdo->prepare(query: "SELECT * FROM User WHERE id_User = :id_User");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: ['id_User' => $id_User]);

    // Retour de l'utilisateur récupéré
    return $query->fetch();
}

/** Création d'un utilisateur */
function createUser(array $userForm): void
{
    // Si un des champs obligatoires n'est pas remplis
    if ('' == $userForm['username'] || '' == $userForm['password']){
        // Fonction alert() hérité de General.php
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant');
        // Fin de la fonction
        return;
    }
    // Si l'email est incorrect
    if (!preg_match('/@.+\./',$userForm['email'])) {
        // Fonction alert() hérité de General.php
        alert(msg: 'Adresse Email incorrecte');
        // Fin de la fonction
        return;
    }
    // Si la date de naissance est incorrecte
    if ('' != $userForm['birthdate'] && !preg_match('/^(\d{4})-(\d{2})-(\d{2})$/',$userForm['birthdate'])) {
        // Fonction alert() hérité de General.php
        alert(msg: 'La date de naissance saisie est incorrecte');
        // Fin de la fonction
        return;
    }

    // Récupération de la connexion à la base de données
    $pdo = getPDO(); // Fonction getPDO() hérité de General.php
    // Préparation de la requête pour enregistrer l'utilisateur
    $query = $pdo->prepare(query: "
        INSERT INTO User (nom_User, prenom_User, mail_User, date_naissance_User, pseudo_User, pass_User)
        VALUES (:nom_User, :prenom_User, :mail_User, :date_naissance_User, :pseudo_User, :pass_User);
    ");
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: [
        'nom_User' => $userForm['firstname'],
        'prenom_User' => $userForm['lastname'],
        'mail_User' => $userForm['email'],
        'date_naissance_User' => '' == $userForm['birthdate'] ? null : $userForm['birthdate'],
        'pseudo_User' => $userForm['username'],
        'pass_User' => $userForm['password'],
    ]);
    // Connexion à l'utilisateur créer
    login(username: $userForm['username'],password: $userForm['password']); // Fonction login() native de User.php
}

/** Connexion d'un utilisateur */
function login($username, $password): void
{
    // Si les champs obligatoires ne sont pas remplis
    if ('' == $username || '' == $password){
        // Affichage d'un message
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant'); // Fonction alert() hérité de General.php
        // Fin de la fonction
        return;
    }

    // Préparation de la requête pour récupérer l'utilisateur
    $query = getPDO()->prepare(query: 'SELECT * FROM User WHERE pseudo_User=:pseudo'); // Fonction getPDO() hérité de General.php
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: ['pseudo' => $username]);
    // Récupération de l'utilisateur
    $user = $query->fetch();

    // Si l'utilisateur n'est pas trouvé
    if (!$user) {
        // Affichage d'un message
        alert(msg: 'Utilisateur non existant'); // Fonction alert() hérité de General.php
        // Fin de la fonction
        return;
    }

    // Si le mot de passe incorrecte
    if ($password != $user['pass_User']) {
        // Affichage d'un message
        alert(msg: 'Mot de passe incorrecte'); // Fonction alert() hérité de General.php
        // Fin de la fonction
        return;
    }

    // Ajout de l'utilisateur à la session
    sessionSet(attribute: 'user', value: $user); // Fonction sessionSet() hérité de General.php
    // Retour à l'accueil
    returnHome(); // Fonction returnHome() hérité de General.php
}

/** Suppression d'un utilisateur */
function disconnect(): void
{
    // Retrait de l'utilisateur à la session
    sessionRemove(attribute: 'user'); // Fonction sessionRemove() hérité de General.php
    // Retour à l'accueil
    returnHome(); // Fonction returnHome() hérité de General.php
}
