const api = new SpotifyWebApi(); //API

var songs_objs; //Array contenente oggetti song
var wrong_songs_objs; //oggetti wrongSong

var onPlay; //canzone in riproduzione
var correct; //indice della risposta corretta

const PLAY_DURATION = 10; //durata della riproduzione in secondi



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
