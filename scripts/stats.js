var statsData;
let bonus; //risposte corrette di seguito

const timeMultiplier = 100; //Moltiplicatore del punteggio del tempo
var levels = {
    HARD: 5000,
    NORMAL: 1000,
    EASY: 500,
    CUSTOM: 100
}


function initStats(level,total = 10) {
    bonus = 1;
    statsData = {
        level: level,
        score: 0,
        correct: 0,
        wrong: 0,
        total: total,
    }
}

function updateStats(correct,remainingTime) {
    if(!correct){
        bonus = 1;
        statsData.wrong++;
        return {score: 0,timeBonus: 0};
    }

    let score = statsData.level * bonus;
    let timeBonus = Math.round(remainingTime*timeMultiplier);

    statsData.score += score+timeBonus;
    statsData.correct++;
    bonus++;

    console.log("aaa"+score);
    return {score: score,timeBonus:timeBonus};
}

function sendStats() {

}
