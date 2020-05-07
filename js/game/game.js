const api = new SpotifyWebApi(); //API

var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong
var categories = [];

var onPlay; //canzone in riproduzione
var correct; //indice della risposta corretta
var autoTimer;

const PLAY_DURATION = 10; //durata della riproduzione in secondi
const AUTOPLAY_DURATION = 3; //in secondi

function firstLoad() {
    g_notReady();
    getCategories();

    $.get("./model/token.php",function (token,status) {
        if(status !== "success"){
            console.log("Errore caricamento Token" + status);
            return;
        }
        api.setAccessToken(token);
        autoload();
    });
}

function getCategories() {
    $.get("model/getCategories.php",function (data,status) {
        if(status !== "success"){
            console.log("Errore caricamento categorie");
            return;
        }
        categories = data;
        g_initCategories();
    },"json");
}

function selectCategory(category) {
    g_notReady();
    initStats(category);
    $.get("model/getPlaylist.php",{genre:category.nome},getPlaylistCallback,"json");
}


function autoload() {
    let category = getCategory("Normale");
    if(category == null){
        setTimeout(autoload,500);
        return;
    }
    selectCategory(category);
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

function startGame() {
    console.log("startgame");
    play();
    g_start();
}

function stopGame() {
    if(isPlaying()){
        onPlay.player.pause();
        onPlay.player.removeEventListener("pause",startTimerCallback);
    } else
        clearTimeout(autoTimer);
    onPlay = null;
    g_stop();
}


/*
* Imposta i pulsanti e inizia la riproduzione
 */
function play() {
    if(isPlaying() || isEnded())
        return;

    onPlay = songs_objs.pop();
    correct = Math.floor(Math.random() * 4); //Scelta del pulsante random

    setAutoplay();
    g_setGameProgressBar(10-songs_objs.length);
    g_startRoundProgressBar();
    g_setButtons();

    onPlay.player.currentTime = onPlay.player.duration - PLAY_DURATION < 0 ? 0 : onPlay.player.duration - PLAY_DURATION;
    console.log(onPlay.player.currentTime);
    onPlay.player.play();
}


function setAutoplay() {
    if(onPlay == null || songs_objs.length < 1)
        return;
    console.log("qui");
    onPlay.player.addEventListener("pause",startTimerCallback);
}

function startTimerCallback() {
    g_startAutoplayProgressBar();
    autoTimer = setTimeout(play,AUTOPLAY_DURATION*1000);
    console.log("trigger");
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
    g_endGame();

}

function getPlaylistCallback(playlists,status) {
    if(status !== "success"){
        console.log("Errore Caricamento Playlists");
        return;
    }
    console.log(playlists);
    let playlist = playlists.splice(Math.floor(Math.random()*playlists.length),1).pop();
    api.getPlaylistTracks(playlist,loadPlaylistCallback);
}

function loadPlaylistCallback(err,suc){
    if(err){
        console.log("Errore caricamento Playlist da Spotify");
        return;
    }
    if(suc.items.length < 40){
        console.log("Playlist troppo corta: " + suc.items.length);
        return;
    }
    loadTracks(suc.items);
}


/*
* UTILS
*
*/

function isPlaying() {
    return onPlay != null && !onPlay.player.paused;
}

function isEnded() {
    return songs_objs.length <= 0;
}

function getCategory(name) {
    return categories.find( (category) => {
        return category.nome === name
    })
}