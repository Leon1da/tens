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
    <!-- Play e info -->
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <div class="d-flex justify-content-center">
            <button class="btn btn-outline-dark border-0 rounded-circle shadow-lg" id="gioca_btn" type="button" onclick="play()" disabled>
                <svg class="bi bi-play" width="100%" height="100%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 010 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" clip-rule="evenodd"/>
                </svg>
            </button>
            </div>
        </div>
        <div class="col-6 border">
            Qui andranno le istruzioni e roba durante la riproduzione
        </div>
    </div>


    <!-- Zona risposte -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow-lg p-2 bg-light">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover0" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-dark" id="titolo0"></h5>
                            <p class="text-dark" id="artista0"></p>
                            <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow-lg p-2 bg-dark">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover1" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-light" id="titolo1"></h5>
                            <p class="text-light" id="artista1"></p>
                            <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow-lg p-2 bg-light">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover2" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-dark" id="titolo2"></h5>
                            <p class="text-dark" id="artista2"></p>
                            <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow p-2 bg-dark">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover3" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-light" id="titolo3"></h5>
                            <p class="text-light" id="artista3"></p>
                            <a class="stretched-link" onclick="stopPlay(0)" href="#"></a>
                        </div>
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