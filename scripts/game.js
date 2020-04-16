const api = new SpotifyWebApi(); //API
var playlistsIds;
var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong

var onPlay; //canzone in riproduzione
var correct; //indice della risposta corretta


/*
* Caricamento dati:
* 1 - TODO Richiesta al webserver di un token Spotify necessario per accedere ai servizi API Spotify
* 2 - TODO richiesta al webserver una lista di ids
* 3 - Carica i file Audio
*/
function load() {
    api.setAccessToken(getToken());
    playlistsIds = getPlaylistIds();
    loadsongs(playlistsIds.pop());
}

/*
* Richiede i dati necessari ai server Spotify:
* 1 - Richiede la playlist id
* 2 - TODO Carica random la playlist (alcune canzoni vengono riprodotte ed altre vengono usate solo per mostrare il nome)
*/
function loadsongs(playlistId){
    songs_objs = [];
    wrong_songs_objs = [];
    api.getPlaylistTracks(playlistId,function (err,suc) {
        if(err){
            console.log("error getting playlist");
            return;
        }
        console.log(suc);
        let i = 0;
        while((songs_objs.length < 10 || wrong_songs_objs.length < 30 ) && i < 50){
            if(suc.items[i].track != null){
                let name = suc.items[i].track.name;
                let artist = suc.items[i].track.artists[0].name;
                let image = suc.items[i].track.album.images[0].url;


                //Se la canzone è riproducibile la carica e verrà usata come canzone da indovinare
                //Altrimenti viene usata solo per avere delle scelte sbagliate
                if(suc.items[i].track.preview_url != null && songs_objs.length < 10){
                    let url = suc.items[i].track.preview_url;
                    console.log("Trovato: "+ name);
                    songs_objs.push(new Song(url,name,artist,image));
                } else {
                    console.log("Trovato wrong: "+ name);
                    wrong_songs_objs.push(new WrongSong(name,artist,image));
                }
            }
            console.log(i);
            console.log(songs_objs.length,wrong_songs_objs.length);
            i++;
        }
    });
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
* TODO
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
