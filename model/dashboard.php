<?php
//session_start();

if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);

    echo sprintf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    echo "<br>";
    echo "<a href='model/logout.php'>logout</a>";
} else {
    echo sprintf("Effettua il %s per accedere all'area riservata", '<a href="index.php">login</a>');
}