$(document).ready(function() {
    // rendo la modal del profilo draggable
    $("#profile-modal").draggable();

    // home page first load
    $("#main-content").load("view/home.php");

    // chiudo modal profilo se viene clickata la [X]
    $("#close-profile-modal").click(function () {
        $("#profile-modal").addClass("hide-my-profile-modal");
    });

    // al click sul logo manda sulla home page
    $("#logo").click(function () {
        $("#main-content").load("view/home.php");
    })


    // carica la classifica ogni volta che viene selezionata una nuova categoria
    $(document).on('change','select', function() {
        var category = $("#category option:selected").text(); //selected category
        var query_option = $("#category-query-option option:selected").val(); //selected option
        // non riesco a capire per quale motivo il testo dell'option selezionato
        // e` <nome_catogoria>Scegli, quindi faccio un substring per rimuovere
        // la parte inutile
        // alert(category);
        var request = $.ajax({
            type: "POST",
            url: "view/elements/GetRankingTable.php",
            data: {category: category, option: query_option},
            dataType: "html"
        });
        request.done( function (response) {
            // alert(response);
            //visualizzo risultato
            $("#rank").html(response);

        });
    });

});
