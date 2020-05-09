const FADE_TIME = 100;

function g_initCategories() {
    $(function () {
        let html = '';
        categories.forEach(function (category) {
            if(category.nome !== "Normale")
                html += '<option>'+category.nome+'</option>';
        });

        $("#selettore_categoria").html(html);
    });
}

function g_initSelectors() {
    $("#normale_btn").on("click", () => {
        $("#selettore_categoria_collapse").collapse("hide");
        selectCategory(getCategory("Normale"));
    });

    let category_selector = $("#selettore_categoria");
    $("#categoria_btn").on("click", () => {
        selectCategory(getCategory(category_selector.val()));
    });
    category_selector.on("change",() => {
        selectCategory(getCategory(category_selector.val()));
    });

    $("#ricomincia_finale_btn").on("click", () => {
        $("#modal_finale").modal("hide");
        $("#gioca_btn").trigger("click");
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
        $('#partita-tab').tab('show');
        $("#gioca_btn")
            .text("Esci")
            .one("click",stopGame)
            .attr("disabled",false)
            .removeClass("btn-primary")
            .addClass("btn-danger");
    });
}

function g_stop() {
    $(function () {
        g_setGameProgressBar(0);
        $("#punteggio_valore").text(0);
        $("#istruzioni-tab").tab('show');
        $("#normale_btn").trigger("click");
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

function g_updateScore(score,timeScore) {
    $(function () {
        let text_obj = $("#punteggio_testo");
        let score_obj = $("#punteggio_valore");

        function animator(testo,punteggio,start){
            text_obj.fadeOut(FADE_TIME);
            score_obj.fadeOut(FADE_TIME,() => {
                text_obj.text(testo).fadeIn(FADE_TIME);
                score_obj.text(start).fadeIn(FADE_TIME);
                $({ num: score_obj.html() }).animate({ num: punteggio }, {
                    duration: (AUTOPLAY_DURATION*200)-(2*FADE_TIME),
                    easing: 'swing',
                    step: function () {
                        score_obj.html(Math.floor(this.num));
                    },
                    complete: function () {
                        score_obj.html(this.num);
                    }
                });
            });
        }

        let old_score = score_obj.text();
        animator(score === 0 ? "Risposta Errata" : "Risposta Esatta",score, 0);
        setTimeout(animator, (AUTOPLAY_DURATION*400)-FADE_TIME,"Bonus Tempo",timeScore, 0);
        setTimeout(animator, (AUTOPLAY_DURATION*800)-FADE_TIME,"Totale",statsData.score,old_score);

    });
}


function g_endGame(){
    $(function () {
        let title;
        if(statsData.victory === 1)
            title = "Complimenti";
        else
            title = "Puoi migliorare";
        $("#titolo_finale").text(title);
        $("#punteggio_finale").text(statsData.score);
        $("#corrette_finale").text(statsData.correct);
        $("#errate_finale").text(statsData.wrong);
        $("#mancate_finale").text(statsData.missed);

        $("#modal_finale").modal("show");

        $("#gioca_btn")
            .text("Rigioca")
            .one("click",stopGame)
            .attr("disabled",false)
            .removeClass("btn-danger")
            .addClass("btn-primary");
    })
}

function g_saveStats(response = null) {
    $(function () {
        $(".my-toast").toast('show');
        let notifiche = $("#notifiche");
        switch (response) {
            case null:
                notifiche.html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Salvataggio in corso...');
                return;
            case "done":
                notifiche.html('Salvataggio riuscito');
                break;
            case "login":
                notifiche.html('Effettua il login per salvare i risultati');
                break;
            default:
                notifiche.html('Errore salvataggio');
        }
        setTimeout(() => {$(".my-toast").toast('hide');},10000);
    })
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
            .delay(AUTOPLAY_DURATION*400)
            .animate({width: "0%"},AUTOPLAY_DURATION*400) //Scende da dove rimasta fino alla fine in 1/4 del tempo di autoplay
            .animate({width: "100%"},AUTOPLAY_DURATION*200); //Sale fino al 100% nel tempo rimanente
    })
}