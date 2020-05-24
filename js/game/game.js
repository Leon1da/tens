const api = new Spotify_api(); //API

var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong
var categories = []; //Array di categorie
var playlists; //array di playlist

var onPlay; //canzone in riproduzione
var correct; //indice della risposta corretta
var autoTimer; //timer per l'autoplay

const PLAY_DURATION = 10; //durata della riproduzione in secondi
const AUTOPLAY_DURATION = 3; //in secondi


/*
* Inizia il primo caricamento del gioco, viene chiamata solo all'apertura della pagina gioca
*/
function firstLoad() {
    s_localstore_check();
    g_notReady();
    g_initSelectors();
    getAccessToken();
    getCategories();

}

/*
*  Richiede un access token al webserver per poter fare le richieste ai CDN di Spotify e avvia il caricamento automatico
*/
function getAccessToken() {
    $.get("./model/token.php",function (token,status) {
        if(status !== "success"){
            console.warn("Errore caricamento Token" + status);
            g_notification("Errore caricamento. Ricarica la pagina");
            return;
        }
        api.setAccessToken(token);
        autoload();
    });
}

/*
*  Richiede al webserver i generi musicali e chiama l'update grafico
*/
function getCategories() {
    $.get("model/getCategories.php",function (data,status) {
        if(status !== "success"){
            console.warn("Errore caricamento categorie");
            g_notification("Errore caricamento. Ricarica la pagina");
            return;
        }
        categories = data;
        g_initCategories();
    },"json");
}

/*
* Carica appena possibile la modalità di default
*/
function autoload(i = 30) {
    let category = getCategory("Normale");
    if(i === 0){
        console.warn("Errore autoload");
        g_notification("Errore caricamento. Ricarica la pagina");
        return;
    }
    if(category == null){
        setTimeout(autoload,500,--i);
        return;
    }

    selectCategory(category);
}


/*
* Imposta grafica e statistiche per la categoria di gioco selezionata, richiede al webserver le playlist della categoria selezionata
* Parametri: category = categoria selezionata dal giocatore
*/
function selectCategory(category) {
    g_notReady();
    s_init(category);
    $.get("model/getPlaylists.php",{genre:category.nome},getPlaylistsCallback,"json");
}


/*
* Salva le playlists ricevute dal webserver e chiama il caricamento
*/
function getPlaylistsCallback(playlists_result,status) {
    if(status !== "success"){
        console.log("Errore Caricamento Playlists");
        g_notification("Errore caricamento. Ricarica la pagina");
        return;
    }
    playlists = playlists_result;
    loadRandomPlaylist();
}


/*
* Carica una playlist random, può essere ricorsiva
*/
function loadRandomPlaylist() {
    function loadPlaylistCallback(res,status){
        if(status !== "success"){
            console.warn("Errore caricamento Playlist da Spotify\n Risultato: " + res);
            loadRandomPlaylist();
            return;
        }
        if(res.items.length < 40){
            console.warn("Playlist troppo corta: " + res.items.length);
            loadRandomPlaylist();
            return;
        }
        loadTracks(res.items);
    }

    let playlist = getRandomPlaylist();
    if(playlist == null){
        console.error("Nessuna playlist utilizzabile");
        g_notification("Caricamento playlist non riuscito, riprova o cambia modalità");
        return;
    }
    api.getPlaylistTracks(playlist,loadPlaylistCallback);
}



/*
* Carica le canzoni negli array globali
* Parametri: items = json contentente un vettore di tracks
*/
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
                songs_objs.push(new Song(url,name,artist,image));
            } else {
                wrong_songs_objs.push(new WrongSong(name,artist,image));
            }
        }
    }
    if(songs_objs.length < 10 || wrong_songs_objs.length < 30){
        console.warn("Errore numero di canzoni\n corrette: " + songs_objs.length + "\nErrate: " + wrong_songs_objs.length);
        loadRandomPlaylist();
        return;
    }
    g_ready();
}

/*
* Avviata al click su gioca, inizia la partita
*/
function startGame() {
    play();
    g_start();
}

/*
* Avviata al click su esci o riavvia, pulisce l'autoplay e la grafica
*/
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
* Inizia la riproduzione, autoplay e grafica
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

    onPlay.player.currentTime = onPlay.player.duration - PLAY_DURATION < 0 ? 0 : onPlay.player.duration - PLAY_DURATION; //Permette di impostare la durata su PLAY_DURATION
    onPlay.player.play();
}

/*
* Prepara l'autoplay
*/
function setAutoplay() {
     if(onPlay == null)
        return;
    onPlay.player.addEventListener("pause",startTimerCallback);
}

/*
* Imposta l'autoplay quando finisce la riproduzione
*/
function startTimerCallback() {
    if(isEnded())
        ended();
    g_startAutoplayProgressBar();
    autoTimer = setTimeout(play,AUTOPLAY_DURATION*1000);
}

/*
* Viene attivata dal click su di una canzone: interrompe la riproduzione
*/
function stopPlay(id) {
    if(!isPlaying())
        return;
    onPlay.player.pause();
    let timeLeft = onPlay.player.duration - onPlay.player.currentTime;
    let result = s_update(id===correct,timeLeft);
    g_updateScore(result.score,result.timeBonus);
    g_updateButtons(correct,id);
}

/*
* Viene chiamata alla fine della partita: invia il punteggio e aggiorna la grafica
*/
function ended() {
    if(!isEnded())
        return;
    s_send();
    g_saveStats();
    g_endGame();

}



/*
* UTILS
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

function getRandomPlaylist() {
    return playlists.splice(Math.floor(Math.random()*playlists.length),1).pop();
}