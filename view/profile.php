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

    $user_id = $user['id'];

    // query statistiche utente
    $query = "
        SELECT * 
        FROM games
        WHERE user = :user_id
    ";

    $check = $pdo->prepare($query);
    $check->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $check->execute();
    $stats = $check->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <br><br>
    <br><br>

    <div class="row justify-content-center">
<!--            <span class="border" id="data-profile-container">-->
                <form class="border rounded col-xs-10 col-sm-8 col-md-6 col-xl-4" id="data-profile-container">
                    <h2> Dati Personali </h2>
                    <br>
                    <div class="form-group form-row">
                        <label for="nome" class="col-md-4 col-form-label">Nome</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="<?php echo $user['nome']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="cognome" class="col-md-4 col-form-label">Cognome</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="<?php echo $user['cognome']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="mail" class="col-md-4 col-form-label">Mail</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="<?php echo $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="username" class="col-md-4 col-form-label">Username</label>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input type="text" class="form-control" placeholder="<?php echo $user['username']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <button type="submit" class="btn btn-primary mb-2">Modifica</button>
                    </div>
                </form>
<!--            </span>-->
    </div>

    <?php
    echo "<br>";
    // stampa statistiche
    foreach ($stats as $rows){
        foreach ($rows as $col){
            echo $col." ";
        }
        echo "<br>";
    }


    ?>
    <?php
}

