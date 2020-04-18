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
    $.get("./model/token.php",function (token,status) {
        console.log(status);
        console.log(token);
        api.setAccessToken(token);
        loadsongs(playlistsIds.pop());
        document.getElementById("gioca_btn").disabled = false;
    });
    playlistsIds = getPlaylistIds();

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
        while((songs_objs.length < 10 || wrong_songs_objs.length < 30 ) && suc.items.length !== 0){
            let track = suc.items.splice(Math.floor(Math.random()*suc.items.length),1).pop().track; //Rimuove una canzone casuale dall'array di canzoni;
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
            //document.getElementById("choose"+i).innerText = "Nome: " + onPlay.name + "\nArtista: " + onPlay.artist;
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
    onPlay.player.play();
}

/*
* TODO
* */
function stopPlay(id) {
    onPlay.player.pause();
    onPlay = null;
}
