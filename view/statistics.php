<div class="row m-0">
    <div class="col-12">
        <div class="row statistics-up">
<!--             offset-md-1 col-md-7-->
            <div class="col-xs-12 col-sm-12 offset-md-1 col-md-7">
                <div class="row" id="d-0"> Scala le classifiche per diventare il Campione ! </div>
                <div class="row secondary-text-statistics"  id="d-1">Gioca con le playlist piu in voga </div>
                <div class="row secondary-text-statistics"  id="d-2">Scegli il genere che preferisci </div>
                <div class="row secondary-text-statistics"  id="d-3">Mostra di che pasta sei fatto! </div>
            </div>
<!--col-md-2-->
            <div class="col-xs-12 col-sm-12 col-md-2" id="categories"></div>

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



            $("#d-0").animate({'margin-left': '+=100vw'}, 500);
            setTimeout(function () {
                $("#d-1").animate({'margin-left': '+=105vw'}, 1000);
                setTimeout(function () {
                    $("#d-2").animate({'margin-left': '+=105vw'}, 1000);
                    setTimeout(function () {
                        $("#d-3").animate({'margin-left': '+=105vw'}, 1000);
                        setTimeout(function () {
                            $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                            // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                            $("#d-3").animate({'margin-top': '-=6.9rem'}, 500);
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
