$(document).ready(function() {

    /* MODAL LOGIN */

// load login modal when sign-in btn is clicked
    $("#login-btn").click(function () {

        clearLoginModalMessage();

        if ($("#login-form")[0].checkValidity()) {
            // form validato
            var username = $("#username-lgn").val();
            var password = $("#password-lgn").val();
            var request = $.ajax({
                type: "POST",
                url: "model/login.php",
                data: {username: username, password: password},
                dataType: "html"
            });
            request.done(function (response) {
                // se necessario, effettuo il salvataggio dei dati della partita effettuata come guest
                s_localstore_check();
                // alert(response);
                // visualizzo risultato
                //rimosso perche non devo visualizzare nulla
                $("#main-content").prepend(response);
                // chiudo il pannello di login
                $("#btn-close-login").click();

                if (//window.matchMedia("(max-width: 576px)").matches ||
                    // window.matchMedia("(max-width: 768px)").matches ||
                    window.matchMedia("(max-width: 992px)").matches) {
                    $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

                }

                closeAlertMessage();

            });
        } else {
            // form non valido
            $(".form-msg").text("compila i campi contrassegnati in rosso");
            if (!$("#username-lgn")[0].checkValidity()) {
                $("#username-lgn").addClass("border border-danger");
            }
            if (!$("#password-lgn")[0].checkValidity()) {
                $("#password-lgn").addClass("border border-danger");
            }
        }


    });

// on login modal close
    $("#in-panel").on("hidden.bs.modal", function () {
        clearLoginModalMessage();
    });

// delete login validation message
    function clearLoginModalMessage() {
        $(".form-msg").text("");
        $("#username-lgn").removeClass("border border-danger");
        $("#password-lgn").removeClass("border border-danger");
    }

    /* MODAL REGISTRAZIONE */

// load registration modal when sign-up btn is clicked
    $("#register-btn").click(function () {
        clearRegistrationModalMessage();

        // html form validation
        // $("#register-form").reportValidity();
        if ($("#register-form")[0].checkValidity()) {

            var nome = $("#name-reg").val();
            var cognome = $("#surname-reg").val();
            var email = $("#email-reg").val();
            var sesso = $("#sesso-reg").val();
            var username = $("#username-reg").val();

            var password = $("#password-reg").val();
            var password_check = $("#password-reg-check").val();

            if(password != password_check) {
                // la password non corrisponde
                $(".form-msg").append("Le password devono coincidere.<br>");
                $("#password-reg-check").addClass("border border-danger");
                $("#password-reg").addClass("border border-danger");
                return;
            }

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


                if (//window.matchMedia("(max-width: 576px)").matches ||
                    // window.matchMedia("(max-width: 768px)").matches ||
                    window.matchMedia("(max-width: 992px)").matches) {
                    $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili
                }

                closeAlertMessage();


            });


        } else {
            if (!$("#name-reg")[0].checkValidity()) {
                $("#name-reg").addClass("border border-danger");
                $(".form-msg").append("nome: almeno 3, massimo 50 caratteri<br>");
            }

            if (!$("#surname-reg")[0].checkValidity()) {
                $("#surname-reg").addClass("border border-danger");
                $(".form-msg").append("cognome: almeno 3, massimo 50 caratteri<br>");
            }

            if (!$("#email-reg")[0].checkValidity()) {
                $("#email-reg").addClass("border border-danger");
                $(".form-msg").append("mail: non valida<br>");
            }

            if (!$("#username-reg")[0].checkValidity()) {
                $("#username-reg").addClass("border border-danger");
                $(".form-msg").append("username: almeno 3, massimo 30 caratteri<br>");
            }
            if (!$("#password-reg")[0].checkValidity()) {
                $("#password-reg").addClass("border border-danger");
                $(".form-msg").append("password: almeno 8, massimo 30 caratteri<br>");

            }
            if (!$("#password-reg-check")[0].checkValidity()) {
                $("#password-reg-check").addClass("border border-danger");
                $(".form-msg").append("conferma password: almeno 8, massimo 30 caratteri<br>");

            }
        }
    });

// on register modal close
    $("#up-panel").on("hidden.bs.modal", function () {
        clearRegistrationModalMessage();
    });

// delete register validation message
    function clearRegistrationModalMessage() {
        $(".form-msg").text("");
        $("#name-reg").removeClass("border border-danger");
        $("#surname-reg").removeClass("border border-danger");
        $("#email-reg").removeClass("border border-danger");
        $("#username-reg").removeClass("border border-danger");
        $("#password-reg").removeClass("border border-danger");
        $("#password-reg-check").removeClass("border border-danger");

    }

    // imposta un timer che fa chiudere i messagi di bootstrap
    // (avvenuto login/registrazione)
    function closeAlertMessage() {
        setTimeout(function () {
            $(".my-alert-btn").click(); // click sull [x]
        }, 2000);
    }

});