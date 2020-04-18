<?php
if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);

    $msg = sprintf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    $html = '<div class="alert alert-success" role="alert" >';
    $html .= $msg;
    $html .= '<a href=\'model/logout.php\'>logout</a>';
    $html .= '</div>';

} else {
    $msg = sprintf("Effettua il %s per accedere all'area riservata", '<a href="#sign-in">login</a>');
    $html = '<div class="alert alert-warning" role="alert" >';
    $html .= $msg;
    $html .= "</div>";

}
echo $html;