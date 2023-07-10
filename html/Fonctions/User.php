<?php

include 'General.php';

/** Création d'un utilisateur */
function createUser(array $userForm): void
{
    // Si un des champs obligatoires n'est pas remplis
    if ('' == $userForm['username'] || '' == $userForm['password']){
        // Fonction alert() hérité de General.php
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant');
        return;
    }
    // Si l'email est incorrect
    if (!preg_match('/@.+\./',$userForm['email'])) {
        // Fonction alert() hérité de General.php
        alert(msg: 'Adresse Email incorrecte');
        return;
    }

    // Préparation de la requête pour enregistrer l'utilisateur
    // Fonction getPDO() hérité de General.php
    $query = getPDO()->prepare(query: "
        INSERT INTO User (nom_User, prenom_User, mail_User, date_naissance_User, pseudo_User, pass_User)
        VALUES (:nom_User, :prenom_User, :mail_User, :date_naissance_User, :pseudo_User, :pass_User);
    ");
    // Exécution de la requête
    $query->execute(params: [
        'nom_User' => $userForm['firstname'],
        'prenom_User' => $userForm['lastname'],
        'mail_User' => $userForm['email'],
        'date_naissance_User' => $userForm['birthdate'],
        'pseudo_User' => $userForm['username'],
        'pass_User' => $userForm['password'],
    ]);

    login(username:  $userForm['username'],password: $userForm['password']);
}

/** Connexion d'un utilisateur */
function login($username, $password): void
{
    // Si les champs obligatoires ne sont pas remplis
    if ('' == $username || '' == $password){
        // Fonction alert() hérité de General.php
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant');
        return;
    }

    // Préparation de la requête
    // Fonction getPDO() hérité de General.php
    $query = getPDO()->prepare(query: 'SELECT * FROM User WHERE pseudo_User=:pseudo');
    $query->execute(params: ['pseudo' => $username]);

    // Récupération de l'utilisateur
    $user = $query->fetch();

    // Si l'utilisateur n'est pas trouvé
    if (!$user) {
        // Fonction alert() hérité de General.php
        alert(msg: 'Utilisateur non existant');
        return;
    }

    // Si le mot de passe incorrecte
    if ($password != $user['pass_User']) {
        // Fonction alert() hérité de General.php
        alert(msg: 'Mot de passe incorrecte');
        return;
    }

    // Ajout de l'utilisateur à la session
    // Fonction sessionSet() hérité de General.php
    sessionSet(attribute: 'user', value: $user);
    // Redirection vers Accueil.php
    header(header: 'Location: Accueil.php');
}

/** Suppression d'un utilisateur */
function disconnect(): void
{
    session_destroy();
    header(header: 'Location: Accueil.php');
}
