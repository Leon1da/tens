<?php
if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);

?>
<script>
    // nascondo i bottoni di login e registrazione
    $("#access-panel").toggleClass("invisible");
    // mostro il menu del profilo
    $("#account-panel").toggleClass("invisible");

    // mostro messaggio di benvenuto
    $("#account-dropdown-link").text("<? echo $session_user; ?>");
</script>
<?php
}
exit;
?>