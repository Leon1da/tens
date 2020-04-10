const api = new SpotifyWebApi(); //API
var trackIds = Array(); //Array contentente gli id delle canzoni
var songs_objs = Array();
var onPlay;



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
}

//Carica le canzoni in memoria: richiede ai server spotify l'url della canzone e crea un oggetto audio per poterla riprodurre
function loadsongs() {
    api.getTracks(trackIds,function (err,suc) {
        if(err) {
            console.log("error getting tracks");
            return;
        }
        //in suc viene restituito il JSON contentente una array di Tracks
        console.log(suc);
        console.log(suc.tracks.length);
        for(let i = 0; i<suc.tracks.length;i++){
            if(suc.tracks[i] != null && suc.tracks[i].preview_url != null){
                let url = suc.tracks[i].preview_url;
                let name = suc.tracks[i].name;
                let artist = suc.tracks[i].artists[0].name;
                console.log("Trovato: "+ name);
                songs_objs.push(new Song(url,name,artist));
            }
        }

    });
}
function Song(url,name,artist) {
    this.name = name;
    this.artist = artist;
    this.song = document.createElement("audio");
    this.song.src = url;
    this.song.setAttribute("preload","true");

}

function play() {
    onPlay = songs_objs.pop();
    onPlay.song.play();
}

/*
* Side-effect: richiede ed aggiorna gli ids
*/
function getTrackIds() {
    track = {name: "auto blu", artist: "shiva", id: "2chEq24EHjyw9Zjmwq0hlS"};
    track2 = {name: "boh", artist: "carlo", id: "3Nc7IorgrSffzaQrQWVw4L"};
    trackIds = ["2chEq24EHjyw9Zjmwq0hlS","3Nc7IorgrSffzaQrQWVw4L","6HDdOPc6FWpMfjC8ebzdRC0","3nwH3HTFzpnRV5SqM9um3r","1Xm2e1vDwOMeJJioWuG1s7","4D2snxPPfeYhKeZnGlYioU"];

}

/*
* Side-effect: richiede un token
*/
function getToken() {
    let token = "BQCnRfBd3ZVOZgZ5UVnvRrNqpJ4LWAbPg3UzhiUgELULzAe1FolfdE_Fm678pA2aN6MEcFhSpzN54bn_7Kc";
    api.setAccessToken(token);
}