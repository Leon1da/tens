<?php
require('../model/database.php');

// partite giocate di sempre
$query = "SELECT COUNT(*) AS giocate FROM games";
$check = $pdo->prepare($query);
$check->execute();
$num_games = $check->fetchAll(PDO::FETCH_ASSOC);

if (count($num_games) > 0){
    ?>
<!--    <button class="btn btn-primary btn-block rounded-pill" type="button">-->
        Giocate fino ad oggi:
        <span class="badge" style="background-color: rgba(92, 158, 173, 1); color: white;">
            <?php echo $num_games[0]['giocate']; ?>
        </span>
    <br>
<!--    </button>-->
    <?php
}


// partite vinte oggi

// SELECT COUNT(*) FROM games WHERE start>="2020-05-14 00:00:00" AND start<="2020-05-14 23:59:59"

$day = date("Y-m-d"); // YYYY-MM-GG
$start_day = $day." 00:00:00";
$end_day = $day." 23:59:59";

$query = "SELECT COUNT(*) AS vinte_oggi FROM games WHERE start >= :start_day AND start <= :end_day AND vittoria = 1";
$check = $pdo->prepare($query);
$check->bindParam(':start_day', $start_day, PDO::PARAM_STR);
$check->bindParam(':end_day', $end_day, PDO::PARAM_STR);
$check->execute();
$num_win_today = $check->fetchAll(PDO::FETCH_ASSOC);

if (count($num_win_today) > 0) {
    ?>
<!--    <button class="btn btn-primary btn-block rounded-pill" type="button">-->
        Vinte oggi:
        <span class="badge badge-success">
            <?php echo $num_win_today[0]['vinte_oggi']; ?>
        </span>
<!--    </button>-->
    <?php
}

?>


