const api = new SpotifyWebApi(); //API

var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong

var onPlay; //canzone in riproduzione
var correct; //indice della risposta corretta
var autoTimer;

const PLAY_DURATION = 10; //durata della riproduzione in secondi


function firstLoad() {
    g_notReady();
    g_initCategories();

    $.get("./model/token.php",function (token,status) {
        console.log(status);
        api.setAccessToken(token);
        selectMode("Normale");
    });
}


function selectMode(mode) {
    g_notReady();
    switch (mode) {
        case "Normale" :
            normalMode();
            break;
        default:
            genreMode(mode);
    }
}

function loadTracks(items) {
    songs_objs = [];
    wrong_songs_objs = [];
    while((songs_objs.length < 10 || wrong_songs_objs.length < 30 ) && items.length !== 0){
        let track = items.splice(Math.floor(Math.random()*items.length),1).pop(); //Rimuove una canzone casuale dall'array di canzoni
        if(track.track != null) //alcuni risultati vengono restituiti dentro items altri dentro items.track
            track = track.track;
        if(track != null){
            let name = track.name;
            let artist = track.artists[0].name;
            let image = track.album.images[0].url;


            //Se la canzone è riproducibile la carica e verrà usata come canzone da indovinare
            //Altrimenti viene usata solo per avere delle scelte sbagliate
            if(track.preview_url != null && songs_objs.length < 10){
                let url = track.preview_url;
                console.log("Trovato: "+ name);
                songs_objs.push(new Song(url,name,artist,image));
            } else {
                console.log("Trovato wrong: "+ name);
                wrong_songs_objs.push(new WrongSong(name,artist,image));
            }
        }
    }
    if(songs_objs.length < 10 || wrong_songs_objs.length < 30){
        alert("Numero insufficiente di canzoni :(");
        return;
    }
    g_ready();
}

function start() {
    play();
}


/*
* Imposta i pulsanti e inizia la riproduzione
 */
function play() {
    if(isPlaying())
        return;

    onPlay = songs_objs.pop();
    correct = Math.floor(Math.random() * 4); //Scelta del pulsante random

    autoplay();
    g_setButtons();
    g_updateTotalScore();

    onPlay.player.currentTime = onPlay.player.duration - PLAY_DURATION < 0 ? 0 : onPlay.player.duration - PLAY_DURATION;
    console.log(onPlay.player.currentTime);
    onPlay.player.play();
}


function autoplay() {
    if(onPlay == null)
        return;
    console.log("qui");
    onPlay.player.addEventListener("pause",() => {
        autoTimer = setTimeout(play,2000);
        console.log("tigger");
    })
}

/*
* TODO
* */
function stopPlay(id) {
    if(!isPlaying())
        return;
    onPlay.player.pause();
    let timeLeft = onPlay.player.duration - onPlay.player.currentTime;
    let result = updateStats(id===correct,timeLeft);
    g_updateScore(result.score,result.timeBonus);
    ended();
}


function ended() {
    if(!isEnded())
        return;
    sendStats();
    g_updateTotalScore();
    g_endGame();

}

function isPlaying() {
    return onPlay != null && !onPlay.player.paused;
}

function isEnded() {
    return songs_objs.length <= 0;
}