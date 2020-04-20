
function g_setButtons() {
    $(function () {
        for(let i = 0;i<4;i++){
            if(i === correct){
                document.getElementById("titolo" + i).innerText = onPlay.name;
                document.getElementById("artista"+i).innerText = onPlay.artist;
                document.getElementById("cover"+i).src = onPlay.image;
            } else {
                let song = wrong_songs_objs.pop();
                if(song != null) {
                    document.getElementById("titolo"+i).innerText = song.name;
                    document.getElementById("artista"+i).innerText = song.artist;
                    document.getElementById("cover"+i).src = song.image;
                }
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

function g_endGame(){
    $(function () {
        $("#endGame").text("Fine");
        $("#gioca_btn").attr("disabled",true);
    })

}