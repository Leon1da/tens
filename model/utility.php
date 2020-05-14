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
            <div class="alert alert-success" role="alert" >
                <?php echo $msg; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            break;
        case Status::Warning :
            ?>
            <div class="alert alert-warning" role="alert" >
                <?php echo $msg; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            break;
        case Status::Error :
            ?>
            <div class="alert alert-danger" role="alert" >
                <?php echo $msg; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            break;
    }


}

?>
