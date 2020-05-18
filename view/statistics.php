<div class="row m-0">
    <div class="col-12">
        <div class="m-5" style="height: 30vh;">
                <div class="row justify-content-center" id="d-0"> <h1> Scala le classifiche per diventare il Campione !</h1> </div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-1"> <h2>Gioca con le playlist piu in voga</h2> </div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-2"> <h2>Scegli il genere che preferisci</h2> </div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-3"> <h2>Mostra di che pasta sei fatto!</h2> </div>
        </div>

        <div class="m-5" style="height: 10vh;">
            <div class="offset-lg-5 col-lg-2 offset-md-5 col-md-2 offset-sm-1 col-sm-10 col-xs-12" id="categories"></div>
        </div>

        <div class="m-5" style="height: 30vh;">
            <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10 col-xs-12" id="rank"></div>
        </div>
    </div>
</div>

<script>

    $("#categories").hide();
    $("#rank").hide();


    $(document).ready(function () {
        $("#categories").load("view/elements/getCategoriesOptionPane.php");
        $("#rank").load("view/elements/GetRankingTable.php");


            $("#d-0").animate({'margin-left': '+=150vw'}, 500);
            setTimeout(function () {
                $("#d-1").animate({'margin-left': '+=150vw'}, 1000);
                setTimeout(function () {
                    $("#d-2").animate({'margin-left': '+=150vw'}, 1000);
                    setTimeout(function () {
                        $("#d-3").animate({'margin-left': '+=150vw'}, 1000);
                        setTimeout(function () {
                            $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                            // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                            $("#d-3").animate({'margin-top': '-=8.6rem'}, 500);
                        },1500);

                        $("#rank").fadeIn(1000);
                        $("#categories").fadeIn(1000);

                    },300);
                },300);
            },300);



    });
</script>




<!--                    Sfida te stesso e scala le classifiche. <br>-->
<!---->
<!--                    Sei il Guro del Rock, del Pop o della musica Country ? <br>-->
<!--                    O semplicemente non esiste un amante della musica piu` completo di te ? <br>-->
<!--                    Scegli quale classifica scalare, <br>-->
<!--                    o gioca con le Playlist piu` in voga del momento e mostra agli altri di che pasta sei fatto.-->
