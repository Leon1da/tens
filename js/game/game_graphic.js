function g_initCategories() {
    $(function () {
        $.get("view/load/category.php",function (data,status) {
            if(status !== "success"){
                console.log("Errore caricamento categorie");
                return;
            }
            let selector = $("#selettore_modalita");
            selector.html(data);
            selector.on("change",function () {
                selectMode(selector.val());
            });
        });
    });
}

function g_ready() {
    $(function () {
        let btn = $("#gioca_btn");
        btn.text("Gioca");
        btn.on("click",start);
        btn.attr("disabled",false);
    });
}

function g_notReady() {
    $(function () {
        let btn = $("#gioca_btn");
        btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Caricamento')
        btn.attr("disabled",true);
    });
}

function g_start() {
    //TODO
}

function g_setButtons() {
    $(function () {
        for(let i = 0;i<4;i++){
            let song;
            if(i === correct)
                song = onPlay;
            else
                song = wrong_songs_objs.pop();
            if(song != null) {
                $("#titolo"+i).text(song.name);
                $("#artista"+i).text(song.artist);
                $("#cover"+i).attr("src",song.image);
            }
        }
    });
}


function g_updateTotalScore() {
    $(function () {
        $("#totScore").text(statsData.score);
    });
}

function g_updateScore(score,timeScore) {
    $(function () {
       $("#deltaScore").text(score);
       $("#timeScore").text(timeScore);
    });
}
//TODO
function g_endGame(){

}

