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
function sessionGet(string $value)
{
    return $_SESSION[$value] ?? null;
}

/** Affiche un message */
function alert(string $msg): void
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}