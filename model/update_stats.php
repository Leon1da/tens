<?php
session_start();
require_once('database.php');

    if(isset($_SESSION['session_id'])){
        $query = "
            INSERT into games
        ";
    }
