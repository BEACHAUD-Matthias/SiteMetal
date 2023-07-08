<?php

class ConnexionMessages
{
  public const CONNEXION_IS_VALID = 1;
  public const INVALID_USER = 2;
  public const INVALID_PASSWORD = 3;
}

if (empty($_POST) || !isset($_POST['username']) || !isset($_POST['password'])) {
  redirect('Acceuil.php');
}

$pdo = new PDO("mysql:host=mysql;dbname=DB_PHP;charset=utf8mb4", "root", "root");

$login = $_POST['username'];
$password = $_POST['password']; // mot de passe saisi par l'utilisateur



$query = "SELECT * FROM User WHERE pseudo_User=:pseudo";
$stmt = $pdo->prepare($query);
$stmt->execute(['pseudo' => $login]);

$user = $stmt->fetch();

if (!$user) {
  header('Location: Log.php?msg=' . ConnexionMessages::INVALID_USER);
exit();
}

$userPassword = $user['pass_User'];
if ($password === false|| $password!=$userPassword) {
  header('Location: Log.php?msg=' . ConnexionMessages::INVALID_PASSWORD);
  exit();
}

session_start();
$_SESSION['isConnected'] = true;
$_SESSION['user'] = $user;
header('Location: Acceuil.php?msg=' . ConnexionMessages::CONNEXION_IS_VALID);