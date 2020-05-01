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
        $("#gioca_btn")
            .text("Gioca")
            .one("click",startGame)
            .attr("disabled",false)
            .removeClass("btn-danger")
            .addClass("btn-primary");
    });
}

function g_notReady() {
    $(function () {
        $("#gioca_btn")
            .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Caricamento')
            .attr("disabled",true);
    });
}

function g_start() {
    $(function () {
        $("#gioca_btn")
            .text("Annulla")
            .one("click",stopGame)
            .attr("disabled",false)
            .removeClass("btn-primary")
            .addClass("btn-danger");
    });
}

function g_stop() {
    $(function () {
        //TODO pulire btns
        g_setGameProgressBar(0);
        selectMode($("#selettore_modalita").val());
    })
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



function g_setGameProgressBar(progress) {
    let percent = (progress * 10) + "%";
    $(function () {
        $("#progesso_gioco").width(percent);
    })
}

function g_startRoundProgressBar() {
    $(function () {
        $("#progresso_round")
            .stop(true,true)
            .width("100%")
            .animate({width: "0%"},PLAY_DURATION*1000);
    })
}

function g_startAutoplayProgressBar() {
    $(function () {
        $("#progresso_round")
            .stop(true,false)
            .animate({width: "0%"},AUTOPLAY_DURATION*250) //Scende da dove rimasta fino alla fine in 1/4 del tempo di autoplay
            .animate({width: "100%"},AUTOPLAY_DURATION*750); //Sale fino al 100% nel tempo rimanente
    })
}