const api = new SpotifyWebApi(); //API
var trackIds = []; //Array contentente gli id delle canzoni
var trackWrongIds = []; //Array contenente
var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong
var onPlay;

var correct; //index of correct btn



/*
*  Caricamento dati:
*  1 - Richiesta al webserver per un token Spotify necessario all'accesso ai servizi Spotify
*  2 - Richiesta al webserver degli id delle canzoni
*  3 - Carica i file audio
*/
function load() {
    getToken();
    getTrackIds();
    loadsongs();
    loadWrongSongs();
}

//Carica le canzoni in memoria: richiede ai server spotify l'url della canzone e crea un oggetto audio per poterla riprodurre
function loadsongs() {
    songs_objs = [];
    api.getTracks(trackIds,function (err,suc) {
        if(err) {
            console.log("error getting tracks");
            return;
        }
        //in suc viene restituito il JSON contentente una array di Tracks
        console.log(suc);
        console.log(suc.tracks.length);
        for(let i = 0; i<suc.tracks.length;i++){

            /*
            * Il risultato e/o l'url di preview potrebbero essere null
            * Richiede 20 track al database e ne ottiene 10 riproducibili
            * Se non riesce a trovarne 10 riproducibili ricomincia
            */

            if(suc.tracks[i] != null && suc.tracks[i].preview_url != null && songs_objs.length < 10){
                let url = suc.tracks[i].preview_url;
                let name = suc.tracks[i].name;
                let artist = suc.tracks[i].artists[0].name;
                let image = suc.tracks[i].album.images[0].url;
                console.log("Trovato: "+ name);
                songs_objs.push(new Song(url,name,artist,image));
            }
        }

        if( songs_objs.length < 10 )
            loadsongs();

    });
}

/*
* Carica un wrong_songs_objs con gli oggetti Wrong_songs
*/
function loadWrongSongs() {
    wrong_songs_objs = [];
    api.getTracks(trackWrongIds,function (err,suc) {
        if(err){
            console.log("Errore caricamento canzoni sbagliate");
            return;
        }
        for(let i = 0; i<suc.tracks.length;i++){

            if(suc.tracks[i] != null && wrong_songs_objs.length < 30){
                let name = suc.tracks[i].name;
                let artist = suc.tracks[i].artists[0].name;
                let image = suc.tracks[i].album.images[0].url;
                console.log("Trovato wrong: "+ name);
                wrong_songs_objs.push(new WrongSong(name,artist,image));
            }
        }
    });
}

/*
* Song obj:
* name = nome canzone
* artist = nome artista
* player = oggetto audio per la riproduzione
* image = url della cover
*/
function Song(url,name,artist,image) {
    this.name = name;
    this.artist = artist;
    this.image = image;
    this.player = document.createElement("audio");
    this.player.src = url;
    this.player.setAttribute("preload","true");

}

/*
* name = nome canzone
* artist = nome artista
* image = url della cover
*/
function WrongSong(name,artist,image) {
    this.name = name;
    this.artist = artist;
    this.image = image;
}

/*
* Imposta i pulsanti e inizia la riproduzione
 */
function play() {
    if(onPlay != null){
        return;
    }
    onPlay = songs_objs.pop();
    correct = Math.floor(Math.random() * 4); //Scelta del pulsante random
    for(let i = 0;i<4;i++){
        if(i == correct){
            document.getElementById("choose"+i).innerText = "Nome: " + onPlay.name + "\nArtista: " + onPlay.artist;
        } else {
            let song = wrong_songs_objs.pop();
            if(song != null)
                document.getElementById("choose"+i).innerText = "Nome: " + song.name + "\nArtista: " + song.artist;
        }
    }
    onPlay.player.play();
}

/*
*
* */
function stop(id) {
    onPlay.player.pause();
    if(id == correct)
        document.getElementById("result").innerText = "Bravo";
    else
        document.getElementById("result").innerText = ":( Il corretto era: \n" +
            "Nome: " + onPlay.name + "\nArtista: " + onPlay.artist;
    onPlay = null;
}

/*
* Side-effect: richiede ed aggiorna gli ids
*/
function getTrackIds() {
    track = {name: "auto blu", artist: "shiva", id: "2chEq24EHjyw9Zjmwq0hlS"};
    track2 = {name: "boh", artist: "carlo", id: "3Nc7IorgrSffzaQrQWVw4L"};
    trackIds = ["1DFD5Fotzgn6yYXkYsKiGs","1Oou7m2VuxCDSOdqsu07TU","2chEq24EHjyw9Zjmwq0hlS","3Nc7IorgrSffzaQrQWVw4L","6HDdOPc6FWpMfjC8ebzdRC0","3nwH3HTFzpnRV5SqM9um3r","1Xm2e1vDwOMeJJioWuG1s7","4D2snxPPfeYhKeZnGlYioU","5yfE6GXTuJaAlepKoE0wJE","5YxP1CkunbhUQVvctFOHa7","696DnlkuDOXcMAnKlTgXXK","5mn8bU8IjYqr8ZqTDmLtSO","5e50NiIlOc2YJIftHzoehd","2jkIbZ43eH3rM1yro2Ojzh","7aVX95NjONZszSeb8vJZF3"];
    trackWrongIds = ["0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","0NwuXciw6eQc4edjwSBnV3","6pDqB2dlzxB2i9Inu4h3wC","1TaSkLG2bXx84YuKmJvncw","1Oou7m2VuxCDSOdqsu07TU","16wAOAZ2OkqoIDN7TpChjR","05mrU7mN3c1822bpY58UBC0","1Gyzr8UQgUlpYsGxQC6Tcl","2VxeLyX666F8uXCJ0dZF8B","4Fs1sEg9Mwn6vykFD89xvc","0NwuXciw6eQc4edjwSBnV3","2TxDcppMX95JQv9WB5rtuB"];
}

/*
* Side-effect: richiede un token
*/
function getToken() {
    let token = "BQBxOoURP5YWanuicp4ueVASUCEQrIdOnl8XDapRcXbC9Bp8wVGh0NZIJTr4bQRwoag3xFR0bBWw3j2L_hM";
    api.setAccessToken(token);
}


function getPlaylistTracks() {

}

