<?php
require_once('database.php');
require_once ('utility.php');

$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$sesso = $_POST['sesso'] ?? '';

$name_size = strlen($nome);
$cognome_size = strlen($cognome);
$username_size = strlen($username);
$password_size = strlen($password);



if (empty($nome) || empty($cognome) || empty($email) || empty($username) || empty($password)) {
    printErrorMessage(Status::Warning, "Devi compilare tutti i campi obbligatori tutti i campi");
}else if ($name_size < 3 || $name_size > 50) {
    printErrorMessage(Status::Warning, "Il nome deve contenere almeno 3 caratteri e al massimo 50");
}else if ($cognome_size < 3 || $cognome_size > 50) {
    printErrorMessage(Status::Warning, "Il congnome deve contenere almeno 3 caratteri e al massimo 50");
}else if ($username_size < 3 || $username_size > 50) {
    printErrorMessage(Status::Warning, "l'username deve contenere almeno 3 caratteri e al massimo 50");
}else if ($password_size < 3 || $password_size > 50) {
    printErrorMessage(Status::Warning, "La password deve contenere almeno 8 caratteri e al massimo 50");
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
        printErrorMessage(Status::Warning, "L'username scelto e` gia` in uso");
    } else {
        $query = "
            INSERT INTO users
            VALUES (0, :username, :password, :email, :nome, :cognome, :sesso)
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->bindParam(':nome', $nome, PDO::PARAM_STR);
        $check->bindParam(':cognome', $cognome, PDO::PARAM_STR);
        $check->bindParam(':sesso', $sesso, PDO::PARAM_STR);
        $check->execute();

        if ($check->rowCount() > 0) {
            printErrorMessage(Status::Success,"Registrazione eseguita con successo");
        } else {
            printErrorMessage(Status::Error, "La registrazione non e` andata a buon fine.");
        }
    }
}

?>
