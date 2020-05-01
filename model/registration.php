<?php
require_once('database.php');
require_once ('utility.php');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$sesso = $_POST['sesso'] ?? '';


$pwdLenght = mb_strlen($password);


if (empty($username) || empty($password)) {
    $msg = 'Compila tutti i campi';
    printErrorMessage(Status::Warning, $msg);

} elseif ($pwdLenght < 8 || $pwdLenght > 20) {
    $msg = 'Lunghezza minima password 8 caratteri.
            Lunghezza massima 20 caratteri.';
    printErrorMessage(Status::Warning, $msg);
} else {
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = "
        SELECT id
        FROM users
        WHERE username = :username or email = :email
    ";

    $check = $pdo->prepare($query);
    $check->bindParam(':username', $username, PDO::PARAM_STR);
    $check->bindParam(':email', $email, PDO::PARAM_STR);
    $check->execute();

    $user = $check->fetchAll(PDO::FETCH_ASSOC);

    if (count($user) > 0) {
        $msg = 'Username o email già in uso';
        printErrorMessage(Status::Warning, $msg);
    } else {
        $query = "
            INSERT INTO users
            VALUES (0, :username, :password, :email, :sesso)
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->bindParam(':sesso', $sesso, PDO::PARAM_STR);
        $check->execute();

        if ($check->rowCount() > 0) {
            $msg = 'Registrazione eseguita con successo';
            printErrorMessage(Status::Success,$msg);
        } else {
            $msg = 'La registrazione non e` andata a buon fine.';
            printErrorMessage(Status::Error, $msg);
        }
    }
}

?>
