<?php
// questo script serve a mostrare il nome dell'utente in alto a destra quando esso e` loggato
// (sessione attiva)
if(isset($_SESSION["session_id"])){
    // mostro messaggio di benvenuto
    ?>
    <script>
        $("#profile-name-link").text("<?php echo $_SESSION["session_user"]; ?>");
        show_hide_logged_panel(true);
    </script>
    <?php
}else{
    ?>

    <script>
        show_hide_logged_panel(false);
    </script>

    <?php
}

?>