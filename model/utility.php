<?php

abstract class Status
{
    const Error = -1;
    const Success = 1;
    const Warning = 2;
}

function printErrorMessage($status, $msg){
    switch ($status) {
        case Status::Success :
            ?>
            <div class="alert alert-success" role="alert">
            <?php
            break;
        case Status::Warning :
            ?>
            <div class="alert alert-warning my-alert" role="alert" >
            <?php
            break;
        case Status::Error :
            ?>
            <div class="alert alert-danger my-alert" role="alert" >
            <?php
            break;
    }

    echo $msg;
    ?>
        <button type="button" class="close my-alert-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}

?>
