
function firstLoad() {
    $.get("./model/token.php",function (token,status) {
        console.log(status);
        api.setAccessToken(token);
        load();

    });
}

/*
* Caricamento dati:
* 1 - TODO Richiesta al webserver di un token Spotify necessario per accedere ai servizi API Spotify
* 2 - TODO richiesta al webserver una lista di ids
* 3 - Carica i file Audio
*/
function load() {
    //loadByPlaylist(getPlaylist());
    prova();
    document.getElementById("gioca_btn").disabled = false;
    initStats(levels.NORMAL,10,0);

}

function getPlaylist() {
    return normalMode();
}

function loadTracks(items) {
    console.log("items");
    console.log(items);
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
        console.log(songs_objs.length,wrong_songs_objs.length);
    }
}

/*
* Richiede i dati necessari ai server Spotify:
* 1 - Richiede la playlist id
* 2 - TODO Carica random la playlist (alcune canzoni vengono riprodotte ed altre vengono usate solo per mostrare il nome)
*/
function loadByPlaylist(playlistId){
    songs_objs = [];
    wrong_songs_objs = [];
    api.getPlaylistTracks(playlistId,function (err,suc) {
        if(err){
            console.log("error getting playlist");
            return;
        }
        if(suc.items.length < 40){
            console.log("Playlist troppo corta: " + suc.items.length);
            return;
        }
        console.log(suc);
        loadTracks(suc.items);
    });
}

/*
* Imposta i pulsanti e inizia la riproduzione
 */
function play() {

    if(onPlay != null || !ended()){
        return;
    }
    onPlay = songs_objs.pop();
    correct = Math.floor(Math.random() * 4); //Scelta del pulsante random

    g_setButtons();
    g_updateTotalScore();
    onPlay.player.currentTime = onPlay.player.duration - PLAY_DURATION < 0 ? 0 : onPlay.player.duration - PLAY_DURATION;
    console.log(onPlay.player.currentTime);
    onPlay.player.play();
}

/*
* TODO
* */
function stopPlay(id) {
    onPlay.player.pause();
    let timeLeft = onPlay.player.duration - onPlay.player.currentTime;
    let result = updateStats(id===correct,timeLeft);
    g_updateScore(result.score,result.timeBonus);
    onPlay = null;
    ended();
}


function ended() {
    if(songs_objs.length > 0)
        return true;
    sendStats();
    g_endGame();
}

function prova() {
    api.searchTracks("artist:salmo",{limit:50},function (err,suc) {
        console.log(suc);
        loadTracks(suc.tracks.items);
    });
}
