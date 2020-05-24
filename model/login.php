<?php
require_once('database.php');
require_once ('utility.php');


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    printErrorMessage(Status::Warning,"Inserisci username e password");
} else {
    $query = "
        SELECT username, password
        FROM users
        WHERE username = :username
    ";

    $check = $pdo->prepare($query);
    $check->bindParam(':username', $username, PDO::PARAM_STR);
    $check->execute();

    $user = $check->fetch(PDO::FETCH_ASSOC);

    if (!$user || password_verify($password, $user['password']) === false) {
        printErrorMessage(Status::Warning,"Credenziali utente errate");
    } else {
        session_start();
        session_regenerate_id();
        $_SESSION['session_id'] = session_id();
        $_SESSION['session_user'] = $user['username'];
        // nuova sessione
        // #area riservata
        printErrorMessage(Status::Success,"Login effettuato con successo");
        include('controller.php');
        exit;
    }
}

?>