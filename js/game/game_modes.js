
function normalMode() {
    initStats(new Level(levels.NORMAL));
    let playlistsIds = ["37i9dQZEVXbIQnj7RRhdSX"]; //TODO getPlaylists
    let playlist = playlistsIds.splice(Math.floor(Math.random()*playlistsIds.length),1).pop();

    api.getPlaylistTracks(playlist,function (err,suc) {
        if(err){
            console.log("error getting playlist");
            return;
        }
        if(suc.items.length < 40){
            console.log("Playlist troppo corta: " + suc.items.length);
            return;
        }
        loadTracks(suc.items);
    });
}

function genreMode(genre) {
   //TODO
    console.log(genre);
}


function _getPlaylists(genre) {

}