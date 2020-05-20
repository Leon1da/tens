var statsData; //Punteggi della partita in corso

let bonus; //risposte corrette di seguito

const timeMultiplier = 100; //Moltiplicatore del punteggio del tempo

/*
* Inizializza i dati
*/
function s_init(category,total = 10) {
    bonus = 1;
    statsData = {
        category: category.nome,
        multiplier: category.moltiplicatore,
        score: 0,
        correct: 0,
        wrong: 0,
        missed: 0,
        victory: 0,
        total: total,
        start: Date.now()/1000,
        stop: 0,
        isOld: false,
    }
}

/*
* Aggiorna i dati e calcola i punteggi
*/
function s_update(correct,remainingTime) {
    if(!correct){
        bonus = 1;
        statsData.wrong++;
        return {score: 0,timeBonus: 0};
    }

    let score = statsData.multiplier * bonus;
    let timeBonus = Math.round(remainingTime*timeMultiplier);

    statsData.score += score+timeBonus;
    statsData.correct++;
    bonus++;

    return {score: score,timeBonus:timeBonus};
}

/*
* Invia al webserver i dati o li salva se non è stato effettuato il login
*/
function s_send() {
    statsData.missed = statsData.total - statsData.correct - statsData.wrong;
    statsData.victory = statsData.correct > 5 ? 1 : 0;
    statsData.stop = Date.now()/1000;
    $.ajax({
        url: './model/updateStats.php',
        type: 'POST',
        data: statsData,
        dataType : "text",
        success: response => {
            if(response === "login"){
                if(!statsData.isOld)
                    g_saveStats(response);
                statsData.isOld = true;
                s_localstore_add();
                return;
            }
            if(response === "done"){
                g_saveStats(statsData.isOld ? "old" : "done");
                s_localstore_remove();
            }
            },
    });
}

/*
* Aggiunge al localstorage il punteggio
*/
function s_localstore_add() {
    localStorage.setItem("oldStats",JSON.stringify(statsData));
}

/*
* Rimuove dal localstorage eventuali punteggi pregressi
*/
function s_localstore_remove() {
    localStorage.removeItem("oldStats");
}

/*
* Controlla se ci sono punteggi da salvare ed eventualmente li salva
*/
function s_localstore_check() {
    let data = localStorage.getItem("oldStats");
    if(data === null) return;
    statsData = JSON.parse(data);
    s_send();
}