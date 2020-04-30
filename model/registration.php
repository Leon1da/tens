<?php
require_once('database.php');
require_once ('utility.php');

$status = Status::Success;

if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $sesso = $_POST['sesso'] ?? '';

    // [todo] rimuovere/modificare
    $isUsernameValid = filter_var(
        $username,
        FILTER_VALIDATE_REGEXP, [
            "options" => [
                "regexp" => "/^[a-z\d_]{3,20}$/i"
            ]
        ]
    );
    $pwdLenght = mb_strlen($password);

    if (empty($username) || empty($password)) {
        $msg = 'Compila tutti i campi %s';
        $status = Status::Warning;
    } elseif (false === $isUsernameValid) {
        $msg = 'L\'username non è valido. Sono ammessi solamente caratteri 
                alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                Lunghezza massima 20 caratteri';
        $status = Status::Warning;
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = 'Lunghezza minima password 8 caratteri.
                Lunghezza massima 20 caratteri.';
        $status = Status::Warning;
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT id
            FROM users
            WHERE username = :username
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();

        $user = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) > 0) {
            $msg = 'Username già in uso %s';
            $status = Status::Warning;
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
                $msg = 'Registrazione eseguita con successo';   // [TODO] indirizzare verso il login
                $status = Status::Success;
            } else {
                $msg = 'Problemi con l\'inserimento dei dati %s'; //[TODO] indirizzare verso la registrazione
                $status = Status::Error;
            }
        }
    }

    $html ='';
    switch ($status) {
        case Status::Success :
            $html .= '<div class="alert alert-success" role="alert" >';
            $html .= $msg;
            $html .=' <a href="#sign-in">effettua il login</a>';
            $html .= "</div>";
            break;
        case Status::Warning :
            $html .= '<div class="alert alert-warning" role="alert" >';
            $html .= $msg;
            $html .=' <a href="#sign-up">riprova</a>';
            $html .= "</div>";
            break;
        case Status::Error :
            $html .= '<div class="alert alert-danger" role="alert" >';
            $html .= $msg;
            $html .=' <a href="#sign-up">riprova</a>';
            $html .= "</div>";
            break;
    }

}
    echo $html;