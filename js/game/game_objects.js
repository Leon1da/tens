

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

const levels = {
    NORMAL: {category: 'Normale', multiplier: 1000},
    GENRE: {category: 'Genere', multiplier: 500},
    CUSTOM: {category: 'custom', multiplier: 100}
}

function Level(level,category = '') {
    this.category = level.category === 'Normale' ? 'Normale' : category;
    this.multiplier = level.multiplier;
}