<?php session_start(); ?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v2">

    <title>Myousic</title>
</head>
<body>
 <!-- Header -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offset-md-2 collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" name="home" href="#">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" name="about-us" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" name="statistics" href="#">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" name="game" href="#">Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                    Multiplayer
                </a>
            </li>

        </ul>
        <div class="row mx-auto">
            <div class="nav-item dropdown invisible" id="account-panel">
                <div class="row align-items-center" >
                    Ciao
                    <a class="nav-link dropdown-toggle" href="#" id="account-dropdown-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#profile">Il mio profilo </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#logout" id="logout-btn">Esci</a>
                    </div>

                </div>
            </div>

            <!-- Button trigger modal -->
            <div class="visible" id="access-panel">
                <button type="button" class="btn btn-outline-dark my-btn" id="sign-in" data-toggle="modal" data-target="#in-panel" > Sign In</button>
                <button type="button" class="btn btn-outline-dark my-btn" id="sign-up" data-toggle="modal" data-target="#up-panel" > Sign Up </button>

            </div>

        </div>



    </div>
</nav>

 <div id="main-content">
 </div>


 <!-- Modal --> <!-- Login -->
 <div class="modal fade" id="in-panel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenterTitle">Account Sign In</h5>
                 <button type="button" class="close" id="btn-close-login"data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="login-form">
                     <div class="form-group">
                         <input type="text" class="form-control" id="username-lgn" placeholder="Username" name="username" required>
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-lgn" placeholder="Password" name="password" required>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="login-btn">Sign In</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal --> <!-- Sign Up -->
 <div class="modal fade" id="up-panel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenterTitle">Create your free account</h5>
                 <button type="button" class="close" id="btn-close-signup" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="register-form">
                     <div class="form-group">
                         <div class="row">
                             <div class="col">
                                 <input type="text" class="form-control" id="name-reg" placeholder="Nome*" required>
                             </div>
                             <div class="col">
                                 <input type="text" class="form-control" id="surname-reg" placeholder="Cognome*" required>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-7">
                                 <input type="email" placeholder="Email*" id="email-reg" class="form-control">
                             </div>
                             <div class="col-md-5">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <label class="input-group-text" for="inputGroupSelect01">Sesso</label>
                                     </div>
                                     <select class="custom-select" id="sesso-reg">
                                         <option value="N" selected>Scegli</option>
                                         <option value="M">Uomo</option>
                                         <option value="F">Donna</option>
                                         <option value="A">Altro</option>
                                     </select>
                                 </div>

                             </div>
                         </div>
                     </div>

                     <div class="form-group">
                         <input type="text" class="form-control" id="username-reg" placeholder="Username*" name="username" maxlength="50" required>
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-reg" placeholder="Password*" name="password" required>
                     </div>
                     <small class="form-text text-muted">
                         Utilizzeremo le informazioni che ci fornisci al solo scopo di mogliorare la tua esperienza di gioco.
                         <br>
                         I tuoi dati personali non saranno condivisi con nessun altro, nel rispetto della tua privacy.
                         <br>
                         *Campo obbligatorio
                     </small>
                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="register-btn">Create an Account</button>
             </div>
         </div>
     </div>
 </div>

</div>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="js/model_view.js"></script>

 <?php
 require_once('model/controller.php');
 ?>
<script>

    $(document).ready(function() {

        // load user profile stat and data
        $(".dropdown-item").click(function () {
            var page = $(this).attr("href");
            var url = "view/" + page.substring(1, page.length) + ".php";
            alert(url);
            switch (page) {
                case "#profile":
                     $("#main-content").load(url, function () {

                     });
                     break;

            }
        });

        // load pages when a nav-anchor is clicked
        $(".nav-link").click(function () {
            var old_active = $(".nav-item.active"); // old page
            var anchor = $(this);   // clicked anchor
            var page = anchor.attr("name"); // page to visit
            var url = "view/"+page + ".php"; // url to load
            $("#main-content").load(url, function () {
                anchor.parent().addClass("active"); // active new anchor
                old_active.removeClass("active"); // de-active old anchor

            });
        });


        // login
        $("#login-btn").click(function () {
            var username = $("#username-lgn").val();
            var password = $("#password-lgn").val();
            var request = $.ajax({
                type: "POST",
                url: "model/login.php",
                data: {username: username, password: password},
                dataType: "html"
            });
            request.done( function (response) {
                alert(response);
                // visualizzo risultato
                $("#main-content").html(response);
                // chiudo il pannello di login
                $("#btn-close-login").click();

            });

        });

        // register
        $("#register-btn").click(function () {

            var nome = $("#name-reg").val();
            var cognome = $("#surname-reg").val();
            var email = $("#email-reg").val();
            var sesso = $("#sesso-reg").val();

            var username = $("#username-reg").val();
            var password = $("#password-reg").val();

            alert(nome + " " + cognome + " " + email  + " " + sesso + " " + username + " " + password);

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
            request.done( function (response) {
                alert(response);
                //visualizzo risultato
                $("#main-content").html(response);
                // chiudo il pannello di registrazione
                $("#btn-close-signup").click();

            });
        });

        //logout
        $("#logout-btn").click(function () {
            $.get("model/logout.php", function (response) {
                alert("logout");
                //visualizzo risultato
                $("#main-content").html(response);
            });

        });

        // !!! important !!!
        // allaccio trigger in questo modo poiche l'elemento di cui devo
        // intercettare il click non esiste nel DOM al momento della sua creazione
        // ma viene caricato successivamente tramite registration.php facendo una chiamata AJAX
        $(document).on('click', '.alert > a', function(){
            var ref = $(this).attr("href");
            alert(ref);
            switch (ref) {
                case "#sign-in":
                    $("#sign-in").click();  //apro pannello di login
                    break;

                case "#sign-up":
                    $("#sign-up").click();  //apro pannello di registrazione
                    break;
            }
        });
    });

</script>



</body>
</html>