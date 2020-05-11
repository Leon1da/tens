

class Spotify_api {
    constructor(token = null) {
        this._token = token;
        this._base_url = 'https://api.spotify.com/v1';
    }

    _sendRequest(url,callback){
        $.ajax({
            type : 'GET',
            url : url,
            headers : {
                'Authorization' : 'Bearer ' + this._token
            },
            success : callback,
            error : (xhr,status,error) => console.error("Errore chiamata ajax api: " + status + "\n" + error),
            dataType : "json",
        });
    }


    setAccessToken(token){
        this._token = token;
    }

    getPlaylistTracks(playlistId,callback){
        let url = this._base_url + "/playlists/" + playlistId + "/tracks";
        this._sendRequest(url,callback);
    }

}