<?php if (empty($_SESSION)) {
    if (empty($user)) {
        if (password_verify($_POST['mdpconnect'], $user['mdp'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['mailconnect'] = $user['email'];
            $_SESSION['admin'] = $user['admin'];
            header('location: ../index.php');
        } else {
            $errors['user'] = 'invalid password';
        }
    } else {
        $errors['users'] = 'user inexistant';
    }
}
