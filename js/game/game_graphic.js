function g_ready() {
    $(function () {
        $("#gioca_btn").attr("disabled",false);
    });
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

function g_play() {
    $(function () {
        if(onPlay == null)
            return;
        $("#gioca_btn").attr("disabled",true);

        onPlay.player.addEventListener("pause",() => {
            $("#gioca_btn").attr("disabled",false);

        })
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

function g_endGame(){
    $(function () {
        $("#endGame").text("Fine");
        $("#gioca_btn").attr("disabled",true);
    })

}

