<?php
require_once('utility.php');
session_start();
if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
    printErrorMessage(Status::Success,"Logout eseguito. Alla prossima!");
    include('controller.php');
}
else{
printErrorMessage(Status::Error, "Errore interno, per favore contatta l'amministratore del sistema.");
}
?>
<script>
    // imposta un timer che fa chiudere i messagi di bootstrap
    // (avvenuto login/registrazione)
    function closeAlertMessage() {
        setTimeout(function () {
            $(".my-alert-btn").click(); // click sull [x]
        }, 2000);
    }

    closeAlertMessage();
</script>

