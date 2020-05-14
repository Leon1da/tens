<div class="row m-0">
    <div class="col-12 statistics-up">
        <div class="row align-items-center">
            <div class="offset-md-1 col-md-7">
                   <h1 id="text-up"> Scala le classifiche per diventare il Campione ! </h1>
                   <h3 id="text-down">  Gioca con le playlist piu` in voga del momento o il genere che preferisci
                   <br>
                       e mostra agli altri di che pasta sei fatto.</h3>

            </div>
            <div class="col-md-2" id="categories">

            </div>
        </div>

    </div>

    <div class="offset-md-1 col-md-9 statistics-down">
        <h4> Classifica Globale </h4>
        <div id="rank"></div>

    </div>

</div>

<script>
    $(document).ready(function () {
        $("#categories").load("view/elements/getCategoriesOptionPane.php");

        $("#rank").load("view/elements/GetRankingTable.php");
    })
</script>




<!--                    Sfida te stesso e scala le classifiche. <br>-->
<!---->
<!--                    Sei il Guro del Rock, del Pop o della musica Country ? <br>-->
<!--                    O semplicemente non esiste un amante della musica piu` completo di te ? <br>-->
<!--                    Scegli quale classifica scalare, <br>-->
<!--                    o gioca con le Playlist piu` in voga del momento e mostra agli altri di che pasta sei fatto.-->
