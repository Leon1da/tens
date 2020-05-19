$("#zero").hide();
$("#second").hide();

$(document).ready(function() {

    setTimeout(function () {
        $("#zero").fadeIn(100);
    },400);

    $("#zero").animate({'margin-left': '+=10vw'}, 500);
    setTimeout(function () {
        $("#first").animate({'margin-left': '+=110vw'}, 500);
        setTimeout(function () {
            $("#second").animate({'margin-left': '-=90vw'}, 500);
            $("#second").show();
            setTimeout(function () {
                $("#third").animate({'margin-left': '+=110vw'}, 500);
            },400);
        },400);

    },1000);

    $("#home-play-btn").click(function () {
        var old_active = $(".nav-item.active"); // old page
        $("#main-content").load("view/game.php", function () {
            old_active.removeClass("active"); // de-active old anchor
            $(".nav-link[href='#game']").parent(this).addClass("active"); // active new anchor


        });
    });

});