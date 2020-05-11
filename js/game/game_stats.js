var statsData;
var toSave = false;

let bonus; //risposte corrette di seguito

const timeMultiplier = 100; //Moltiplicatore del punteggio del tempo

function s_init(category,total = 10) {
    bonus = 1;
    toSave = false;
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
    }
}

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

function s_send() {
    toSave = true;
    statsData.missed = statsData.total - statsData.correct - statsData.wrong;
    statsData.victory = statsData.correct > 5 ? 1 : 0;
    statsData.stop = Date.now()/1000;
    $.ajax({
        url: './model/updateStats.php',
        type: 'POST',
        data: statsData,
        dataType : "text",
        success: data => {
            if(data === "done")
                toSave = false;
            g_saveStats(data);
            },
    });
}
