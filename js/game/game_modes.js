
function normalMode() {
    initStats(new Level(levels.NORMAL));
    let playlistsIds = ["37i9dQZEVXbIQnj7RRhdSX"];
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

function artistMode() {
    $(function () {
        let query = "artist:"+$("#artista").val();
        api.searchTracks(query,{limit:50},function (err,suc) {
            console.log(suc);
            loadTracks(suc.tracks.items);
        });
    });
}

function genreMode() {
    $(function () {
        let query = "genre:"+$("#genere").val();
        api.searchTracks(query,{limit:50},function (err,suc) {
            console.log(suc);
            loadTracks(suc.tracks.items);
        });
    });
}

function playlistMode(){
    $(function () {
        let query = "playlist:"+$("#playlist").val();
        api.searchPlaylists(query,{limit:50},function (err,suc) {
            console.log(suc);
            loadTracks(suc.tracks.items);
        });
    });
}

function provaMode() {
    $(function () {
        let query = "artist:"+$("#prova").val();
        api.searchArtists(query,{limit:50},function (err,suc) {
            console.log(suc);
            //loadTracks(suc.tracks.items);
        });
    });
}


