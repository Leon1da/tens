<div class="row m-0">
    <div class="jumbotron">
       <div class="row" id="zero">
           <h1 class="display-4">Benvenuto su Ten's</h1>
       </div>

        <div class="row" id="first"><h2>Ti piace la musica e ami le sfide ?</h2></div>
        <div class="row" id="second"><h2> Hai bisogno di un passatempo ? </h2></div>
        <div class="row" id="third"><h2> Ten's e` quello che fa per te. </h2></div>


    </div>

</div>

<div class="row justify-content-center m-0">
<button type="button" class="btn btn-primary" id="home-play-btn">Gioca</button></a>
</div>
<script>
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
            alert(old_active.text());
            $("#main-content").load("view/game.php", function () {
                old_active.removeClass("active"); // de-active old anchor
                $(".nav-link[href='#game']").parent(this).addClass("active"); // active new anchor


            });
        });

    });



</script>

