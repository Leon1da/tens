
function normalMode() {
    function getPlaylist(playlists,status) {
        if(status !== "success"){
            console.log("Errore Caricamento Playlists");
            return;
        }
        console.log(playlists);
        let playlist = playlists.splice(Math.floor(Math.random()*playlists.length),1).pop();
        api.getPlaylistTracks(playlist,loadPlaylist);
    }

    function loadPlaylist(err,suc){
        if(err){
            console.log("Errore caricamento Playlist da Spotify");
            return;
        }
        if(suc.items.length < 40){
            console.log("Playlist troppo corta: " + suc.items.length);
            return;
        }
        loadTracks(suc.items);
    }
    initStats(new Level(levels.NORMAL));
    $.get("model/getPlaylist.php",{genre:"Normale"},getPlaylist,"json");
}

function genreMode(genre) {
   //TODO
    console.log(genre);
}
