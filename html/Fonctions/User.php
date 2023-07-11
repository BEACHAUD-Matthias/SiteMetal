<?php


require_once 'General.php';


/**
 * @param string $id_User
 * @return mixed
 */
function getUser(string $id_User): mixed
{
    // Récupération de la connexion à la base de données
    $pdo = getPDO(); // General.php
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
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant'); // General.php
        return;
    }
    // Si l'email est incorrect
    if (!preg_match('/@.+\./',$userForm['email'])) {
        alert(msg: 'Adresse Email incorrecte'); // General.php
        return;
    }
    // Si la date de naissance est incorrecte
    if ('' != $userForm['birthdate'] && !preg_match('/^(\d{4})-(\d{2})-(\d{2})$/',$userForm['birthdate'])) {
        alert(msg: 'La date de naissance saisie est incorrecte'); // General.php
        return;
    }

    // Récupération de la connexion à la base de données
    $pdo = getPDO();  // General.php
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
    // Connexion à l'utilisateur créé
    login(username: $userForm['username'],password: $userForm['password']); // User.php
}


/** Connexion d'un utilisateur */
function login($username, $password): void
{
    // Si les champs obligatoires ne sont pas remplis
    if ('' == $username || '' == $password){
        alert(msg: 'Nom d\'utilisateur ou mot de passe manquant'); // General.php
        return;
    }

    // Récupération de la connexion à la base de données
    $pdo = getPDO();  // General.php
    // Préparation de la requête pour récupérer l'utilisateur
    $query = $pdo->prepare(query: 'SELECT * FROM User WHERE pseudo_User=:pseudo');
    // Exécution de la requête en appliquant ses paramètres
    $query->execute(params: ['pseudo' => $username]);
    // Récupération de l'utilisateur
    $user = $query->fetch();

    // Si l'utilisateur n'est pas trouvé
    if (!$user) {
        alert(msg: 'Utilisateur non existant'); // General.php
        return;
    }

    // Si le mot de passe incorrecte
    if ($password != $user['pass_User']) {
        alert(msg: 'Mot de passe incorrecte'); // General.php
        return;
    }

    // Ajout de l'utilisateur à la session
    sessionSet(attribute: 'user', value: $user); // General.php
    // Retour à l'accueil
    returnHome(); // General.php
}
