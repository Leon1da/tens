<div class="jumbotron">
    <h1 id="zero" ">Benvenuto su Ten's</h1>
    <p>
    <h4 id="first"> Hai bisogno di un passatempo ? </h4>
    <h4 id="second">Ti piace la musica ma soprattutto le sfide ?</h4>
    <h4 id="third"> Ten's e` quello che fa per te. </h4>

    </p>
<!--    <a class="btn btn-primary btn-lg" href="#" role="button">Gioca</a>-->
</div>

<div class="row justify-content-center">
    <a href="#game">
<button type="button" class="btn btn-primary" id="home-play-btn">Gioca</button></a>
</div>

<script>
    $("#zero").hide();
    $("#first").hide();
    $("#second").hide();
    $("#third").hide();

    $(document).ready(function() {

        setTimeout(function () {
            $("#zero").fadeIn(500).animate({'margin-left': '+=2vw'}, 1000);

            setTimeout(function () {
                $("#first").fadeIn(1000).animate({'margin-left': '+=12vw'}, 500);
                setTimeout(function () {
                    $("#second").fadeIn(1000).animate({'margin-left': '+=14vw'}, 500);
                    setTimeout(function () {
                        $("#third").fadeIn(1000).animate({'margin-left': '+=16vw'}, 500);
                    }, 1500);
                }, 1500);
            }, 500);
        }, 500);

        $("#home-play-btn").click(function () {
            var old_active = $(".nav-item.active"); // old page
            alert(old_active.text());
            $("#main-content").load("view/game.php", function () {
                old_active.removeClass("active"); // de-active old anchor
                $(".nav-link[href='#game']").parent(this).addClass("active"); // active new anchor


            });
        });

    });



</script>

