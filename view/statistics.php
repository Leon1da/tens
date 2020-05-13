<div class="offset-md-2 col-md-8">
    <div class="row">


            <div class="col-12">
                <br>
                <p class="lead">
                    Sfida te stesso e scala le classifiche. <br>

                    Sei il Guro del Rock, del Pop o della musica Country ? <br>
                    O semplicemente non esiste un amante della musica piu` completo di te ? <br>
                    Scegli quale classifica scalare, <br>
                    o gioca con le Playlist piu` in voga del momento e mostra agli altri di che pasta sei fatto.
                </p>

            </div>
    </div>



    <div class="row" id="categories">
    </div>

    <div class="row" id="rank">
    </div>




</div>

<script>
    $(document).ready(function () {
        $("#categories").load("view/elements/getCategoriesOptionPane.php");

        $("#rank").load("view/elements/GetRankingTable.php");
    })
</script>
