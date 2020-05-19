<div class="row m-0">
    <div class="col-12">
        <div class="m-5" style="height: 25vh;">
                <div class="row justify-content-center" id="d-0"> Scala le classifiche per diventare il Campione ! </div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-1"> Gioca con le playlist piu in voga</div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-2"> Scegli il genere che preferisci </div>
                <div class="row justify-content-center secondary-text-statistics"  id="d-3"> Mostra di che pasta sei fatto! </div>
        </div>

        <div class="m-5" style="">
<!--            offset-lg-5 col-lg-2 offset-md-2 col-md-2 offset-sm-1 col-sm-10 col-xs-12-->
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-3 m-1" id="categories"></div>
                <div class="col-12 col-sm-12 col-md-3 m-1" id="category-query">
                    <select class="custom-select custom-select-lg my-rounded-pill-left my-rounded-pill-right" id="category-query-option">';
                        <option value="1">Migliore Partita</option>';
                        <option value="0" selected>Tutte le partite</option>';
                    </select>

                </div>
            </div>


        </div>

        <div class="m-5" style="">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-6" id="rank"></div>
            </div>
        </div>

<!--        <div class="m-5" style="">-->
<!--            <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10 col-12" id="rank"></div>-->
<!--        </div>-->
    </div>
</div>

<script>

    $("#category-query").hide();
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
                            if (window.matchMedia("(max-width: 576px)").matches) {
                                $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                                // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                                $("#d-3").animate({'margin-top': '-=4.8rem'}, 500);
                            }else if(window.matchMedia("(max-width: 768px)").matches){

                            }else if(window.matchMedia("(min-width: 992px)").matches){

                                $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                                // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                                $("#d-3").animate({'margin-top': '-=6.8rem'}, 500);


                            }else if(window.matchMedia("(min-width: 1200px)").matches){
                                $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                                // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                                $("#d-3").animate({'margin-top': '-=6.8rem'}, 500);
                            }

                        },1500);

                        $("#rank").fadeIn(1000);
                        $("#categories").fadeIn(1000);
                        $("#category-query").fadeIn(1000);

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
