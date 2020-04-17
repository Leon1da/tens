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
            <button class="btn btn-primary" onclick="play()" role="button" id="gioca" disabled>Caricamento</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="align-self-center mr-3 h-25 w-25" id="cover0" src="./resources/white_square.png" alt="Cover">
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo0"></h5>
                    <p id="artista0"></p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-3">
            <div class="media border" onclick="">
                <img class="align-self-center mr-3 h-25 w-25" id="cover1" src="./resources/white_square.png" alt="Cover">
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo1"></h5>
                    <p id="artista1"></p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="mr-3 h-25 w-25" id="cover2" src="./resources/white_square.png" alt="Cover">
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo2"></h5>
                    <p id="artista2"></p>
                    <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-3">
            <div class="media border">
                <img class="mr-3 h-25 w-25" id="cover3" src="./resources/white_square.png" alt="Cover">
                <div class="media-body align-self-center">
                    <h5 class="" id="titolo3"></h5>
                    <p id="artista3"></p>
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