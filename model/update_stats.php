<?php
session_start();
require_once('database.php');

    if(isset($_SESSION['session_id'])){
        //TODO vittoria, time
        $query = "
            INSERT into games (user,categoria,score,numero_domande,esatte,errate,mancate,vittoria,start,stop)
            VALUES ((SELECT id FROM users WHERE username = :username), (SELECT id FROM category WHERE nome = :category), :score, :total, :correct, :wrong, :missed, 1, 0, 0);
        ";

        $req = $pdo->prepare($query);
        $req->bindParam(':username',$_SESSION['session_user'],PDO::PARAM_STR);
        $req->bindParam(':category',$_POST['category'],PDO::PARAM_STR);
        $req->bindParam(':score',$_POST['score'],PDO::PARAM_STR);
        $req->bindParam(':total',$_POST['total'],PDO::PARAM_STR);
        $req->bindParam(':correct',$_POST['correct'],PDO::PARAM_STR);
        $req->bindParam(':wrong',$_POST['wrong'],PDO::PARAM_STR);
        $req->bindParam(':missed',$_POST['missed'],PDO::PARAM_STR);
        $req->execute();
    }