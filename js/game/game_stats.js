var statsData;
let bonus; //risposte corrette di seguito

const timeMultiplier = 100; //Moltiplicatore del punteggio del tempo

function initStats(level,total = 10) {
    bonus = 1;
    statsData = {
        category: level.category,
        multiplier: level.multiplier,
        score: 0,
        correct: 0,
        wrong: 0,
        missed: 0,
        total: total,
    }
}

function updateStats(correct,remainingTime) {
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

    console.log("aaa"+score);
    return {score: score,timeBonus:timeBonus};
}

function sendStats() {
    statsData.missed = statsData.total - statsData.correct - statsData.wrong;
    $.ajax({
        url: './model/update_stats.php',
        type: 'POST',
        data: statsData,
    });
}
