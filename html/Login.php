<?php

require_once './Fonctions/User.php';

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fonction login() hérité de User.php
    login(username: $_POST['username'], password: $_POST['password']);
}
?>

<?php ob_start(); // Debut de l'enregistrement de l'HTML ?>
    <div class="form-background">
        <form method="POST">
            <label>
                <p>Nom d'utilisateur</p>
                <input type="text" name="username" placeholder="Username..." required/>
            </label>
            <label>
                <p>Mot de passe</p>
                <input type="password" name="password" placeholder="Password" required/>
            </label>
            <div>
                <input type="submit" value="Log in"/>
                <a href="./Register.php">Créer un compte</a>
            </div>
        </form>
    </div>
<?php $contenuPage = ob_get_clean(); // Fin de l'enregistrement de l'HTML ?>
<?php require("Template.php"); // Chargement du modèle en utilisant l'HTML enregistré ?>

