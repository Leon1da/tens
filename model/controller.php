<?php
if(isset($_SESSION["session_id"])){
    // mostro messaggio di benvenuto
    ?>
    <script>
        $("#account-dropdown-link").text("<? echo $_SESSION["session_user"]; ?>");
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