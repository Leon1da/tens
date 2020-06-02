$(document).ready(function() {

    // carica il modal profilo o effetuua il logout qunado il link relativo viene clickato
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
                if (window.matchMedia("(max-width: 992px)").matches) {
                    $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

                }

                break;
            case "#logout":
                var url = "model/logout.php";
                $.get(url, function (response) {
                    $("#main-content").prepend(response);
                });
                $("#profile-modal").addClass("hide-my-profile-modal");
                if (window.matchMedia("(max-width: 992px)").matches) {
                    $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

                }
                break;
        }
    });

    // carica le pagine al click sui link sul menu
    // - home
    // - about us
    // - statistics
    // - game
    // - multiplayers (coming soon)
    $(".nav-link.menu").click(function () {
        var old_active = $(".nav-item.active"); // vecchia pagina
        var anchor = $(this);
        var page = anchor.attr("href"); // pagina da visitare
        page = page.substring(1, page.length);
        var url = "view/" + page + ".php"; // url da caricare
        $("#main-content").load(url, function () {
            anchor.parent().addClass("active"); // imposta il nuovo link come attivo
            old_active.removeClass("active");   // rimuovo la

            if (//window.matchMedia("(max-width: 576px)").matches ||
                // window.matchMedia("(max-width: 768px)").matches ||
                window.matchMedia("(max-width: 992px)").matches) {
                $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

            }

        });
    });

});