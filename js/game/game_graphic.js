const FADE_TIME = 100; //Tempo in ms per l'effetto "cambio punteggio mostrato"

/*
* Inserisce i titoli delle categorie nel selettore.
* Se impostato un localstorage lo apre in automatico sull'ultima categoria selezionata
*/
function g_initCategories() {
    $(function () {
        let html = '';
        categories.forEach(function (category) {
            if(category.nome !== "Normale")
                html += '<option>'+category.nome+'</option>';
        });

        let category_selector = $("#selettore_categoria");
        let lastSelected = localStorage.getItem("lastSelected");

        category_selector.html(html);
        if(lastSelected != null && getCategory(lastSelected) != null)
            category_selector.val(lastSelected);
    });
}

/*
* Aggiunge le funzioni callback ai vari pulsanti
*/
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
        localStorage.setItem("lastSelected",category_selector.val());
        selectCategory(getCategory(category_selector.val()));
    });

    $("#ricomincia_finale_btn").on("click", () => {
        $("#modal_finale").modal("hide");
        $("#gioca_btn").trigger("click");
    });

}

/*
* Imposta il pulsante gioca su "gioca" e lo rende cliccabile
*/
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

/*
* imposta il pulsante gioca su "caricamento"
*/
function g_notReady() {
    $(function () {
        $("#gioca_btn")
            .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Caricamento')
            .attr("disabled",true);
    });
}

/*
* Chiamata all'avvio del gioco imposta il pulsante gioca su "esci"
*/
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

/*
* Reset della grafica a causa del click su "esci" o su "rigioca"
*/
function g_stop() {
    $(function () {
        g_setGameProgressBar(0);
        $("#punteggio_valore").text(0);
        $("#istruzioni-tab").tab('show');
        $("#normale_btn").trigger("click");
    })
}

/*
* Imposta i pulsanti di scelta
*/
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

/*
* Gestisce le animazioni e i dati visualizzati nella zona punteggio
* Parametri:
*   score = punteggio intermedio
*   timeScore = bonus tempo
*/
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

/*
* Mostra il riquadro finale con il punteggio finale
*/
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

/*
* Mostra un messaggio contenente un feedback sul salvataggio della partita
* Parametri:
*   response = è la risposta dal web server, può essere null se è una chiamata interna e la risposta non è ancora arrivata
*/
function g_saveStats(response = null) {
    $(function () {
        $("#notifiche_titolo").text("Salvataggio");
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
            case "old":
                notifiche.html('Salvataggio partita precedente riuscito');
                break;
            default:
                notifiche.html('Errore salvataggio');
        }
        setTimeout(() => {$(".my-toast").toast('hide');},10000);
    })
}

/*
* Mostra un messaggio che notifica all utente eventuali errori
*/
function g_notification(msg) {
    $(function () {
        let toast = $(".my-toast");
        $("#notifiche").text(msg);
        $("#notifiche_titolo").text("Errore");
        toast.toast('show');
        setTimeout(() => {toast.toast('hide')},5000);
    })
}


/*
* Imposta la progress bar della partita sul valore progress
* Parametri:
*   Progress = progresso da 1 a 10
*/
function g_setGameProgressBar(progress) {
    let percent = (progress * 10) + "%";
    $(function () {
        $("#progesso_gioco").width(percent);
    })
}

/*
* Imposta la progress bar del round all 100% e la riduce progressivamente
*/
function g_startRoundProgressBar() {
    $(function () {
        $("#progresso_round")
            .stop(true,true)
            .width("100%")
            .animate({width: "0%"},PLAY_DURATION*1000);
    })
}

/*
* Imposta la progress bar del round durante l'attesa dell'autoplay
*/
function g_startAutoplayProgressBar() {
    $(function () {
        $("#progresso_round")
            .stop(true,false)
            .delay(AUTOPLAY_DURATION*400)
            .animate({width: "0%"},AUTOPLAY_DURATION*400) //Scende da dove rimasta fino alla fine in 1/4 del tempo di autoplay
            .animate({width: "100%"},AUTOPLAY_DURATION*200); //Sale fino al 100% nel tempo rimanente
    })
}