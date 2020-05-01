<?php
session_start();
if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);

}
else{

?>
    <div class="alert alert-danger" role="alert">
        Errore interno, per favore contatta l'amministratore del sistema.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>
