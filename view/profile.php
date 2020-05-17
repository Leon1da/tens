<?php
require_once('../model/database.php');
require_once ('../model/utility.php');

session_start();
if(isset($_SESSION['session_id'])){

    $username = $_SESSION['session_user'];

    // query dati utente
    $query = "
        SELECT id, username, email, nome, cognome, sesso 
        FROM users
        WHERE username = :username
    ";

    $check = $pdo->prepare($query);
    $check->bindParam(':username', $username, PDO::PARAM_STR);
    $check->execute();
    $user = $check->fetch(PDO::FETCH_ASSOC);

    if(count($user)>0){

        ?>

        <h6> Dati </h6>
        <br>

        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nome</div>
                    </div>
                    <input type="text" class="form-control" placeholder="<?php echo $user['nome']; ?>" readonly>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Cognome</div>
                    </div>
                    <input type="text" class="form-control" placeholder="<?php echo $user['cognome']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Mail</div>
                    </div>
                    <input type="text" class="form-control" placeholder="<?php echo $user['email']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Username</div>
                    </div>
                    <input type="text" class="form-control" placeholder="<?php echo $user['username']; ?>" readonly>
                </div>
            </div>
        </div>
        <hr>


        <?php


        $user_id = $user['id'];
        // query statistiche utente
        $query = "
        SELECT sum(score) as total, sum(numero_domande) as domande, sum(esatte) as esatte, sum(errate) as errate
        FROM games
        WHERE user = :user_id
        GROUP BY user  
    ";

        $check = $pdo->prepare($query);
        $check->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $check->execute();
        $stats = $check->fetchAll(PDO::FETCH_ASSOC);

        if(count($stats)>0){ ?>

            <h6> Storico </h6>
            <br>

            <div class="row">
                <div class="col">
                    <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"/>
                    </svg>
                    &nbsp
                    &nbsp
                    PUNTEGGIO
                </div>
                <div class="col"> <?php echo $stats[0]['total']; ?>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    </svg>
                    &nbsp
                    &nbsp
                    CORRETTE
                </div>
                <div class="col">
                    <?php echo $stats[0]['esatte']; ?>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                    </svg>
                    &nbsp
                    &nbsp
                    ERRATE
                </div>
                <div class="col">
                    <?php echo $stats[0]['errate']; ?>
                </div>

            </div>

            </div>

            <?php

        }else{
            echo "Non hai ancora effettuato nessuna partita. <br> Cosa aspetti?";
        }

    }

}

