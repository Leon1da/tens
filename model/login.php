<?php
session_start();
require_once('database.php');
$msg = '[LOGIN] ';


if (isset($_SESSION['session_id'])) {
    //header('Location: dashboard.php');
    //include "dashboard.php";
    //echo "<h1>[DASHBOARD] Gia` loggato</h1>";

    // #area riservata
    include "dashboard.php";
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password';
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
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            //header('Location: dashboard.php');
            //include "dashboard.php";
            //echo "<h1>[DASHBOARD] Nuova sessione</h1>";

            // #area riservata
            include "dashboard.php";
            exit;
        }
    }
    echo $msg;
    echo "<br>";
    echo "<a href='index.php'>torna indietro</a>";
    //printf($msg, '<a href="../user.php">torna indietro</a>');
}

?>