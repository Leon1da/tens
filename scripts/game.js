const api = new SpotifyWebApi();
var songs_objs = Array();
var onPlay;

//caricamento token: richiesta al webserver che chiede un token ai server Spotify
function load() {
    let token = "BQAMSoVnlN43U_sDMY0McNpYKKh_u_IpU-OWxzq6FKipbJW1HcM1i5Fpr9UuN__CcKT1_ycoMRzBRwG-bbw";
    api.setAccessToken(token);
    trackids = ["2chEq24EHjyw9Zjmwq0hlS","7HwvPmK74MBRDhCIyMXReP"];
    loadsongs(trackids);
}

//Carica le canzoni in memoria: richiede ai server spotify l'url della canzone e crea un oggetto audio per poterla riprodurre
function loadsongs(trackids) {
    api.getTracks(trackids,function (err,suc) {
        if(err) {
            console.log("error getting track" + trackid);
            return;
        }
        //in suc viene restituito il JSON contentente una array di Tracks
        console.log(suc);
        console.log(suc.tracks.length);
        for(let i = 0; i<suc.tracks.length;i++){
            if(suc.tracks[i] != null){
                let url = suc.tracks[i].preview_url;
                console.log("Trovato: "+ url);
                songs_objs.push(new Song(url));
            }
        }

    });
}
function Song(url) {
    this.song = document.createElement("audio");
    this.song.src = url;
    this.song.setAttribute("preload","true");

}

function play() {
    onPlay = songs_objs.pop();
    onPlay.song.play();
}
