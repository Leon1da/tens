<?php
require_once('../model/database.php');
require_once ('../model/utility.php');

session_start();
if(isset($_SESSION['session_id'])){

    $username = $_SESSION['session_user'];

    // query dati utente
    $best_score_query = "
        SELECT id, username, email, nome, cognome, sesso 
        FROM users
        WHERE username = :username
    ";

    $check = $pdo->prepare($best_score_query);
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

        // all score

        $all_score_query = "
        SELECT sum(score) as total, sum(vittoria) as vittorie, sum(esatte) as esatte, sum(errate) as errate
        FROM games g
        WHERE g.user = :user_id
        GROUP BY g.user
        ";

        $check = $pdo->prepare($all_score_query);
        $check->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $check->execute();
        $all_score_result = $check->fetchAll(PDO::FETCH_ASSOC);

        // best score

        $best_score_query = "
        SELECT MAX(score) as score ,esatte as esatte, errate as errate, c.nome as categoria
        FROM games g JOIN category c ON g.categoria = c.id 
        WHERE g.user = :user_id
        GROUP BY g.user 
        ";

        $check = $pdo->prepare($best_score_query);
        $check->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $check->execute();
        $best_score_result = $check->fetchAll(PDO::FETCH_ASSOC);


        if(strlen($all_score_result[0]['total'])>0){
        ?>
        Totale di sempre
        <div class="row">
            <button type="button" class="btn" style="background-color: transparent;">
                Score: <span class="badge badge-light"><?php echo $all_score_result[0]['total']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Vittorie: <span class="badge badge-light"><?php echo $all_score_result[0]['vittorie']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Esatte: <span class="badge badge-light"><?php echo $all_score_result[0]['esatte']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Errate: <span class="badge badge-light"><?php echo $all_score_result[0]['errate']; ?></span>
            </button>
        </div>
        <?php
        }
        if(strlen($best_score_result[0]['score'])>0) {
            ?>
        Partita migliore
        <div class="row">
            <button type="button" class="btn" style="background-color: transparent;">
                Score: <span class="badge badge-light"><?php echo $best_score_result[0]['score']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Esatte: <span class="badge badge-light"><?php echo $best_score_result[0]['esatte']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Errate: <span class="badge badge-light"><?php echo $best_score_result[0]['errate']; ?></span>
            </button>

            <button type="button" class="btn" style="background-color: transparent;">
                Categoria: <span class="badge badge-light"><?php echo $best_score_result[0]['categoria']; ?></span>
            </button>
        </div>

        <?php
        }else{
            echo "Non hai ancora effettuato nessuna partita. <br> Cosa aspetti?";
        }
    }
}

