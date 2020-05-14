<div class="row m-0">
    <div class="col-12">
        <div class="row statistics-up">
            <div class="col-sm-12 offset-md-1 col-md-7">
                <div class="row" id="d-0">
                    <h1> Scala le classifiche per diventare il Campione ! </h1>
                </div>
                <div class="row"  id="d-1"> <h3>Gioca con le playlist piu in voga</h3> </div>
                <div class="row"  id="d-2"> <h3>Scegli il genere che preferisci </h3></div>
                <div class="row"  id="d-3"> <h3>Mostra di che pasta sei fatto! </h3></div>
            </div>

            <div class="col-sm-12 col-md-2" id="categories"></div>

        </div>

        <div class="row statistics-down">
            <div class="offset-md-1 col-md-9" id="rank"></div>
        </div>
    </div>
</div>

<script>

    $("#categories").hide();
    $("#rank").hide();


    $(document).ready(function () {
        $("#categories").load("view/elements/getCategoriesOptionPane.php");
        $("#rank").load("view/elements/GetRankingTable.php");


        setTimeout(function () {

            $("#d-0").animate({'margin-left': '+=100vw'}, 500);
            setTimeout(function () {
                $("#d-1").animate({'margin-left': '+=105vw'}, 1000);
                setTimeout(function () {
                    $("#d-2").animate({'margin-left': '+=105vw'}, 1000);
                    setTimeout(function () {
                        $("#d-3").animate({'margin-left': '+=105vw'}, 1000);
                        setTimeout(function () {
                            $("#d-1").animate({'margin-top': '+=4rem'}, 500);
                            // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                            $("#d-3").animate({'margin-top': '-=7.5rem'}, 500);
                        },1500);

                        setTimeout(function () {
                            $("#rank").fadeIn(2000);
                            $("#categories").fadeIn(2000);
                        },2000);

                    },750);

                },750);
            },0);
        },500);


    });
</script>




<!--                    Sfida te stesso e scala le classifiche. <br>-->
<!---->
<!--                    Sei il Guro del Rock, del Pop o della musica Country ? <br>-->
<!--                    O semplicemente non esiste un amante della musica piu` completo di te ? <br>-->
<!--                    Scegli quale classifica scalare, <br>-->
<!--                    o gioca con le Playlist piu` in voga del momento e mostra agli altri di che pasta sei fatto.-->
