<?php
session_start();

// Connection a la base de données
try {
    $bdd = new PDO('mysql:host=sql11.freemysqlhosting.net;dbname=sql11416776;charset=utf8', 'sql11416776', 'V8Q9q7hy3b');
} catch (Exception $e) {
    print_r($e->getMessage());
}

//Initialisation de tableaux vides
$errors = [];
$user = [];


if (!empty($_GET) && ($_GET['action']) == 'delete') {
    var_dump($_GET);
    session_destroy();
    header('location: /index.php');
}
if (!empty($_POST)) { //Si le formulaire n'est pas vide
    if (!empty($_POST['email']) && !empty($_POST['password'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $req = $bdd->prepare('SELECT * FROM users WHERE email = :emailconnect');
        $req->execute(array(
            'emailconnect' => $_POST['email'],
        ));
        $user = $req->fetch(PDO::FETCH_ASSOC);

        //Si l'utilisateur n'est pas déjà connecté
        if (empty($_SESSION)) {
            if (!empty($user)) { //Si le tableau contenant des informations pour se logger n'est pas vide
                if (password_verify($_POST['password'], $user['mdp'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['emailconnect'] = $user['email'];
                    $_SESSION['connected'] = true;
                    header('location: ../index.php');
                } else {
                    $errors['users'] = 'invalid password';
                }
            } else {
                $errors['user'] = 'user inexistant';
            }
        } else
            $errors['connect'] = 'Vous êtes déjà connecté';
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
    die;
}
