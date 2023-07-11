<?php
// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fonction createUser() hérité de User.php
    createUser(userForm: $_POST);
}
?>

<div class="form-background">
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
        <div>
            <input type="submit" value="Créer le compte"/>
            <a href="./Login.php">Se connecter</a>
        </div>
    </form>
</div>