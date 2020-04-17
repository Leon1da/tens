<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gioca | Myousic</title>
    <script src="./scripts/spotify-web-api.js" type="text/javascript" ></script>
    <script src="./scripts/game.js" type="text/javascript"></script>
    <script src="./scripts/objects.js" type="text/javascript"></script>
    <script src="./scripts/utils.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" onclick="play()" role="button">Gioca</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="align-self-center mr-3 h-25 w-25" id="cover0" src="https://i.scdn.co/image/ab67616d0000b27334874e17c6825f69edcefef5" >
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo0">Titolo canzone</h5>
                    <p id="artista0">Artistaaaaa fsajfsdihfbdsihishdbi</p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-3">
            <div class="media border" onclick="">
                <img class="align-self-center mr-3 h-25 w-25" id="cover1" src="https://i.scdn.co/image/ab67616d0000b27334874e17c6825f69edcefef5" >
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo1">Titolo canzone</h5>
                    <p id="artista1">Album affsa</p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="mr-3 h-25 w-25" id="cover2" src="https://i.scdn.co/image/ab67616d0000b27334874e17c6825f69edcefef5" >
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo2">Titolo canzone</h5>
                    <p id="artista2">Album affsa</p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="mr-3 h-25 w-25" id="cover3" src="https://i.scdn.co/image/ab67616d0000b27334874e17c6825f69edcefef5" >
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo3">Titolo canzone</h5>
                    <p id="artista3">Album affsa</p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    load();
</script>
</body>
</html>