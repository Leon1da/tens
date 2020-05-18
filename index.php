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
    <link rel="stylesheet" href="css/style.css?v87">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

    <title>Ten's</title>
</head>
<body>
 <!-- Header -->

 <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

     <a class="navbar-brand" id="logo" href="#home">
         <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
         Ten's
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

 <script src="js/model_view.js"></script>

 <?php
 require_once('model/controller.php');
 ?>

<script>

    $(document).ready(function() {

        // rendo la modal del profilo draggable
        $("#profile-modal").draggable();

        $("#main-content").load("view/home.php");

        // load pages when dropdown-item (PROFILE SUB-MENU) is clicked
        // - Il mio profilo
        // - logout
        $(".dropdown-item").click(function () {
            var page = $(this).attr("href");
            switch (page) {
                case "#profile":
                    // mostro modal profilo
                    $("#profile-modal").removeClass("hide-my-profile-modal");
                    var url = "view/profile.php";
                    $("#profile-modal-body").load(url);
                    break;
                case "#logout":
                    var url = "model/logout.php";
                    $.get(url, function (response) {
                        $("#main-content").prepend(response);
                    });

                    $("#profile-modal").addClass("hide-my-profile-modal");

                    break;
            }
        });

        // chiudo modal profilo se viene clickata la [X]
        $("#close-profile-modal").click(function () {
            $("#profile-modal").addClass("hide-my-profile-modal");
        });

        // load pages when a nav-anchor (MAIN MENU) is clicked
        // - home
        // - about us
        // - statistics
        // - game
        // - multiplayers (coming soon)
        $(".nav-link.menu").click(function () {
            var old_active = $(".nav-item.active"); // old page
            var anchor = $(this);   // clicked anchor
            var page = anchor.attr("href"); // page to visit
            page = page.substring(1,page.length);
            var url = "view/"+page + ".php"; // url to load
            $("#main-content").load(url, function () {
                anchor.parent().addClass("active"); // active new anchor
                old_active.removeClass("active"); // de-active old anchor
                $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

            });
        });

        // al click sul logo manda sulla home page
        $("#logo").click(function () {
            $("#main-content").load("view/home.php");
        })

        function clearLoginModalMessage() {
            $(".form-msg").text("");
            $("#username-lgn").removeClass("border border-danger");
            $("#password-lgn").removeClass("border border-danger");
        }

        // load login modal when sign-in btn is clicked
        $("#login-btn").click(function () {

            clearLoginModalMessage();

            if($("#login-form")[0].checkValidity()) {
                    // form validato
                    var username = $("#username-lgn").val();
                    var password = $("#password-lgn").val();
                    var request = $.ajax({
                        type: "POST",
                        url: "model/login.php",
                        data: {username: username, password: password},
                        dataType: "html"
                    });
                    request.done( function (response) {
                        // alert(response);
                        // visualizzo risultato
                        //rimosso perche non devo visualizzare nulla
                        $("#main-content").prepend(response);
                        // chiudo il pannello di login
                        $("#btn-close-login").click();

                        $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

                        // setto timer che fa chiudere il messaggio
                        setTimeout(function () {
                            $(".my-alert-btn").click();
                        },5000);

                    });
                }else{
                // form non valido
                $(".form-msg").text("compila i campi contrassegnati in rosso");
                if(!$("#username-lgn")[0].checkValidity()){
                    $("#username-lgn").addClass("border border-danger");
                }
                if(!$("#password-lgn")[0].checkValidity()){
                    $("#password-lgn").addClass("border border-danger");
                }
            }


        });

        $("#in-panel").on("hidden.bs.modal", function () {
            clearLoginModalMessage();
        });

        function clearRegistrationModalMessage() {
            $(".form-msg").text("");
            $("#name-reg").removeClass("border border-danger");
            $("#surname-reg").removeClass("border border-danger");
            $("#email-reg").removeClass("border border-danger");
            $("#username-reg").removeClass("border border-danger");
            $("#password-reg").removeClass("border border-danger");

        }

        // load registration modal when sign-up btn is clicked
        $("#register-btn").click(function () {

          clearRegistrationModalMessage();
            // html form validation
            // $("#register-form").reportValidity();
            if($("#register-form")[0].checkValidity()){
                var nome = $("#name-reg").val();
                var cognome = $("#surname-reg").val();
                var email = $("#email-reg").val();
                var sesso = $("#sesso-reg").val();

                var username = $("#username-reg").val();
                var password = $("#password-reg").val();

                // alert(nome + " " + cognome + " " + email  + " " + sesso + " " + username + " " + password);

                var request = $.ajax({
                    type: "POST",
                    url: "model/registration.php",
                    data: {
                        nome: nome,
                        cognome: cognome,
                        email: email,
                        sesso: sesso,
                        username: username,
                        password: password,
                    },
                    dataType: "html"
                });
                request.done(function (response) {
                    // alert(response);
                    //visualizzo risultato
                    $("#main-content").prepend(response);
                    // chiudo il pannello di registrazione
                    $("#btn-close-signup").click();


                    $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

                    // setto timer che fa chiudere il messaggio
                    setTimeout(function () {
                        $(".my-alert-btn").click();
                    },5000);

                });

            }else{
                if(!$("#name-reg")[0].checkValidity()){
                    $("#name-reg").addClass("border border-danger");
                    $(".form-msg").append("nome: almeno 3, massimo 50 caratteri<br>");


                }

                if(!$("#surname-reg")[0].checkValidity()){
                    $("#surname-reg").addClass("border border-danger");
                    $(".form-msg").append("cognome: almeno 3, massimo 50 caratteri<br>");
                }

                if(!$("#email-reg")[0].checkValidity()){
                    $("#email-reg").addClass("border border-danger");
                    $(".form-msg").append("mail: non valida<br>");
                }

                if(!$("#username-reg")[0].checkValidity()){
                    $("#username-reg").addClass("border border-danger");
                    $(".form-msg").append("username: almeno 8, massimo 30 caratteri<br>");
                }

                if(!$("#password-reg")[0].checkValidity()){
                    $("#password-reg").addClass("border border-danger");
                    $(".form-msg").append("password: almeno 8, massimo 30 caratteri<br>");

                }

            }


        });

        $("#up-panel").on("hidden.bs.modal", function () {
            clearRegistrationModalMessage();
        });

        // carica la classifica ogni volta che viene selezionata una nuova categoria
        $(document).on('change','select', function() {
            var category = $("select option:selected").text();
            // non riesco a capire per quale motivo il testo dell'option selezionato
            // e` <nome_catogoria>Scegli, quindi faccio un substring per rimuovere
            // la parte inutile
            category = category.substring(0, category.length - 6);
            // alert(category);
            var request = $.ajax({
                type: "POST",
                url: "view/elements/GetRankingTable.php",
                data: {category: category},
                dataType: "html"
            });
            request.done( function (response) {
                // alert(response);
                //visualizzo risultato
                $("#rank").html(response);

            });
        });

    });

</script>



</body>
</html>