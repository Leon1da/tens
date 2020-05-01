<?php
require_once('database.php');
require_once ('utility.php');


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $msg = 'Inserisci username e password';
    printErrorMessage(Status::Warning,$msg);
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
        $msg = 'Credenziali utente errate';
        printErrorMessage(Status::Warning,$msg);
    } else {
        session_start();
        session_regenerate_id();
        $_SESSION['session_id'] = session_id();
        $_SESSION['session_user'] = $user['username'];
        // nuova sessione
        // #area riservata
        include('controller.php');
        exit;
    }
}

?>