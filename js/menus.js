$(document).ready(function() {

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
        page = page.substring(1, page.length);
        var url = "view/" + page + ".php"; // url to load
        $("#main-content").load(url, function () {
            anchor.parent().addClass("active"); // active new anchor
            old_active.removeClass("active"); // de-active old anchor

            if (//window.matchMedia("(max-width: 576px)").matches ||
                // window.matchMedia("(max-width: 768px)").matches ||
                window.matchMedia("(max-width: 992px)").matches) {
                $(".navbar-toggler").click(); //chiude il menu su dispositivi mobili

            }

        });
    });

});