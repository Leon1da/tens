

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
