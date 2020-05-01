<?php
session_start();
require_once('database.php');
require_once ('utility.php');

$status = Status::Success;

if (isset($_SESSION['session_id'])) {
    // sei gia` loggato (sessione salvata)
    // #area riservata
    include "dashboard.php";
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password';
        $status = Status::Warning;
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
            $status = Status::Error;
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            // nuova sessione
            // #area riservata
            include "dashboard.php";
            exit;
        }
    }

    printErrorMessage($status,$msg);
    exit;
//    echo "<br>";
//    echo "<a href='index.php'>torna indietro</a>";
//    printf($msg, '<a href="#">torna indietro</a>');
    printErrorMessage(Status::Error, "Errore interno, per favore contatta l'amministratore del sistema.");

}
?>