<?php

function getPDO(): PDO
{
    return new PDO("mysql:host=mysql;dbname=DB_PHP;charset=utf8mb4", "root", "root");
}

isset($_SESSION) ? : session_start();

/** Ajoute un élément à la session */
function sessionSet(string $attribute, $value): void
{
    $_SESSION[$attribute] = $value;
}

/** Récupère un élément de la session */
function sessionGet(string $attribute): mixed
{
    return $_SESSION[$attribute] ?? null;
}

/** Retire un élément de la session */
function sessionRemove(string $attribute): void
{
    unset($_SESSION[$attribute]);
}

/** Booléen de la connexion */
function isUserConnected(): bool
{
    return isset($_SESSION['user']);
}

/** Affiche un message */
function alert(string $msg): void
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

/** Renvoie à la page d'accueil */
function returnHome(): void
{
    header('Location: /home');
}