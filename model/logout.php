<?php
require_once('utility.php');
session_start();
if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);


}
else{
printErrorMessage(Status::Error, "Errore interno, per favore contatta l'amministratore del sistema.");
}
?>
