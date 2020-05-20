<?php session_start(); ?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font google -->
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&family=Nunito:ital,wght@1,600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v94">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

    <title>Ten's</title>

    <link rel="shortcut icon" href="resources/favicon.ico?v2">

</head>
<body>

<img src="resources/logo_background_black.svg" id="bg" alt="">

 <!-- Header -->

 <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

     <a class="navbar-brand" id="logo" href="#home">
         <img src="resources/logo_navbar.svg" width="31" height="23" class="d-inline-block align-top" alt="">
<!--         Ten's-->
     </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offset-md-2 collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link menu" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#about-us">Chi siamo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#statistics">Classifiche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#game">Gioca</a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">-->
<!--                    Multiplayer-->
<!--                </a>-->
<!--            </li>-->

        </ul>
        <div class="row mx-auto">
            <div class="nav-item dropdown invisible" id="account-panel">
                <div class="row align-items-center" >
                    <span style="color: white;">Ciao</span>
                    <a class="nav-link dropdown-toggle" href="#" id="profile-name-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#profile" id="apri">Il mio profilo </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#logout">Esci</a>
                    </div>

                </div>
            </div>

            <!-- Button trigger modal -->
            <div class="visible" id="access-panel">
                <button type="button" class="btn btn-outline-light my-btn" id="sign-in" data-toggle="modal" data-target="#in-panel" >Accedi</button>
                <button type="button" class="btn btn-outline-light my-btn" id="sign-up" data-toggle="modal" data-target="#up-panel" >Registrati</button>

            </div>

        </div>



    </div>
</nav>


 <!-- Profile Modal -->
 <div class="offset-md-4 col-md-4 offset-sm-2 col-sm-6 modal-content hide-my-profile-modal" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
     <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Profilo</h5>
         <button type="button" class="close"  id="close-profile-modal" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body" id="profile-modal-body">

     </div>
 </div>

 <div id="main-content">

 </div>


 <!-- Modal --> <!-- Login -->
 <div class="modal fade" id="in-panel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenterTitle">Accedi ora</h5>
                 <button type="button" class="close" id="btn-close-login" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="login-form">
                     <div class="form-group">
                         <input type="text" class="form-control" id="username-lgn" placeholder="Username" name="username" required>
                     </div>
                     <div class="form-group" style="margin-bottom: 0;">
                         <input type="password" class="form-control" id="password-lgn" placeholder="Password" name="password" required>
                     </div>
                 </form>

                 <small class="form-text text-danger form-msg" style="color: red;"></small>
             </div>
             <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-primary btn-block rounded-pill w-50" id="login-btn">Accedi</button>
             </div>

         </div>
     </div>
 </div>

 <!-- Modal --> <!-- Sign Up -->
 <div class="modal fade" id="up-panel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenterTitle">Crea il tuo account gratuito</h5>
                 <button type="button" class="close" id="btn-close-signup" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="register-form">
                    <!-- Dati Personali-->
                     <div class="form-group">
                         <div class="row">
                             <div class="col">
                                 <input type="text" class="form-control" id="name-reg" placeholder="Nome*" minlength="2" maxlength="30" required>
                             </div>
                             <div class="col">
                                 <input type="text" class="form-control" id="surname-reg" placeholder="Cognome*" minlength="2" maxlength="30" required>
                             </div>
                         </div>
                     </div>
                     <div class="form-group" style="margin-bottom: 0;">
                         <div class="row">
                             <div class="col-md-7">
                                 <input type="email" placeholder="Email*" id="email-reg" class="form-control"
                                        pattern="[\w-]+@([\w-]+\.)+[\w-]+" required>
                             </div>
                             <div class="col-md-5">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <label class="input-group-text" for="inputGroupSelect01">Sesso</label>
                                     </div>

                                 <select class="custom-select my-rounded-pill-right" id="sesso-reg">
                                         <option value="N" selected>Scegli</option>
                                         <option value="M">Uomo</option>
                                         <option value="F">Donna</option>
                                         <option value="A">Altro</option>
                                     </select>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <hr style="margin-top: 0;">
                        <!-- Credenziali -->

                     <div class="form-group">
                         <input type="text" class="form-control" id="username-reg" placeholder="Username*" name="username"  minlength="8" max="50" required>
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-reg" placeholder="Password*" name="password"  minlength="8" maxlength="50" required>
                     </div>
                     <small class="form-text text-muted">
                         Utilizzeremo le informazioni che ci fornisci al solo scopo di mogliorare la tua esperienza di gioco.
                         <br>
                         I tuoi dati personali non saranno condivisi con nessun altro, nel rispetto della tua privacy.
                         <br>
                         *Campo obbligatorio
                     </small>
                     <small class="form-text text-danger form-msg" style="color: red;"></small>
                 </form>

             </div>
             <div class="modal-footer justify-content-center">
                 <button type="button" class="btn btn-primary btn-block rounded-pill w-50" id="register-btn">Crea Account</button>
             </div>
         </div>
     </div>
 </div>

</div>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


 <script src="js/main.js"></script>
 <script src="js/model_view.js"></script>
 <script src="js/menus.js"></script>
 <script src="js/modals.js"></script>
<script src="js/game/game_stats.js" type="text/javascript"></script>

<script>
    $("#bg").hide();

    $(document).ready(function () {
        setTimeout(function () {
            $("#bg").fadeIn(1000);
        },3500);
    });
</script>

 <?php
 require_once('model/controller.php');
 ?>

</body>
</html>