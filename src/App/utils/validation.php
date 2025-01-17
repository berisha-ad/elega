<?php
$success = $success ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $rights = $_POST['rights'];

    $errors = [];
    $passerrors = [];
    $success = "";

    // Validierung der Inputs des Benutzers

    if (empty($username)) {
        $errors['username'] = 'Benutzername darf nicht leer sein.';
    } elseif (strlen($username) < 4) {
        $errors['username'] = 'Der Benutzername muss mindestens 4 Zeichen lang sein.';
    }

    if (empty($email)) {
        $errors['email'] = 'E-Mail darf nicht leer sein.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'E-Mail-Adresse ist ungültig.';
    }

    // Lowercase
    if (!preg_match('/[a-z]/', $password)) {
        $passerrors['lower'] = "Das Passwort muss mindestens einen Kleinbuchstaben enthalten.";
    }
    
    // Uppercase
    if (!preg_match('/[A-Z]/', $password)) {
        $passerrors['upper'] = "Das Passwort muss mindestens einen Großbuchstaben enthalten.";
    }
    
    // mindestens eine Zahl
    if (!preg_match('/\d/', $password)) {
        $passerrors['number'] = "Das Passwort muss mindestens eine Zahl enthalten.";
    }
    
    // specialchar
    if (!preg_match('/[@$!%*?&]/', $password)) {
        $passerrors['special'] = "Das Passwort muss mindestens ein Sonderzeichen (@, $, !, %, *, ?, &) enthalten.";
    }
    
    // >8
    if (strlen($password) < 8) {
        $passerrors['len'] = "Das Passwort muss mindestens 8 Zeichen lang sein.";
    }

    if ($password !== $confirm) {
        $errors['confirm'] = 'Die Passwörter stimmen nicht überein.';
    }
    if ($rights !== 'confirmed') {
        $errors['rights'] = 'Sie müssen unsere Datenschutzbestimmungen akzeptieren!';
    }
    

    // Errorhandling

    if (empty($errors) && empty($passerrors)) {
        $success = "Ihre Registrierung war erfolgreich";
    } else {
        $success = "";
    }
}
