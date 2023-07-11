<?php
    // Si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        createUser(userForm: $_POST); // User.php
    }
?>

<form method="POST">
    <label>
        <p>Prénom</p>
        <input type="text" name="firstname"/>
    </label>
    <label>
        <p>Nom</p>
        <input type="text" name="lastname"/>
    </label>
    <label>
        <p>Adresse mail</p>
        <input type="email" name="email"/>
    </label>
    <label>
        <p>Date de naissance</p>
        <input type="date" name="birthdate"/>
    </label>
    <label>
        <p>Nom d'utilisateur*</p>
        <input type="text" name="username" required/>
    </label>
    <label>
        <p>Mot de passe*</p>
        <input type="password" name="password" required/>
    </label>
    <div class="form-bottom">
        <input type="submit" value="Créer le compte"/>
        <a href="./Login">Se connecter</a>
    </div>
</form>