<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" >

    <title>Myousic</title>
</head>
<body>
 <!-- Header -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md-6 offset-md-2 collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
    </div>
    <div class="col-md-3 offset-md-1">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark my-btn" id="sign-in" data-toggle="modal" data-target="#in-panel" > Sign In</button>
        <button type="button" class="btn btn-outline-dark my-btn" id="sign-up" data-toggle="modal" data-target="#up-panel" > Sign Up </button>
    </div>
</nav>

 <div class="container-fluid">

 <div id="main-content">
 </div>


 <!-- Modal --> <!-- Sign In -->
 <div class="modal fade" id="in-panel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenterTitle">Account Sign In</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="login-form">
                     <div class="form-group">
                         <input type="text" class="form-control" id="username-lgn" placeholder="Username" name="username">
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-lgn" placeholder="Password" name="password">
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
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" id="register-form">
                     <div class="form-group">

                         <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                     </div>

                     <div class="form-group">
                         <input type="text" class="form-control" id="username-reg" placeholder="Username" name="username" maxlength="50" required>
                     </div>
                     <div class="form-group">
                         <input type="password" class="form-control" id="password-reg" placeholder="Password" name="password" required>
                     </div>

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

<script>
    $(document).ready(function() {

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
            var login = '1'
            var request = $.ajax({
                type: "POST",
                url: "model/login.php",
                data: {username: username, password: password, login: login},
                dataType: "html"
            });
            request.done( function (response) {
                alert(response);
                // visualizzo risultato
                $("#main-content").html(response);

                // chiudo il pannello di login
                $("button.close").click();

            });

        });

        // register
        $("#register-btn").click(function () {
            var username = $("#username-reg").val();
            var password = $("#password-reg").val();
            var register = '1';
            var request = $.ajax({
                type: "POST",
                url: "model/registration.php",
                data: {username: username, password: password, register : register},
                dataType: "html"
            });
            request.done( function (response) {
                alert(response);

                //visualizzo risultato
                $("#main-content").html(response);

                // chiudo il pannello di registrazione
                $("button.close").click();

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