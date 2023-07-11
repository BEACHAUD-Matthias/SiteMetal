<?php
    // Si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        login(username: $_POST['username'], password: $_POST['password']); // User.php
    }
?>

<form method="POST">
    <label>
        <p>Nom d'utilisateur</p>
        <input type="text" name="username" required/>
    </label>
    <label>
        <p>Mot de passe</p>
        <input type="password" name="password" required/>
    </label>
    <div class="form-bottom">
        <input type="submit" value="Log in"/>
        <a href="/register">Créer un compte</a>
    </div>
</form>

