<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gioca | Myousic</title>
    <script src="./js/game/spotify-web-api.js" type="text/javascript" ></script>
    <script src="./js/game/game.js" type="text/javascript"></script>
    <script src="./js/game/game_objects.js" type="text/javascript"></script>
    <script src="./js/game/game_modes.js" type="text/javascript"></script>
    <script src="./js/game/game_stats.js" type="text/javascript"></script>
    <script src="./js/game/game_graphic.js" type="text/javascript"></script>
    <!-- TODO remove -->
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<!-- Progresso partita -->
<div class="row">
    <div class="col-12 p-0">
        <div class="progress rounded-0">
            <div class="progress-bar" id="progesso_gioco" role="progressbar" style="width: 0%"></div>
        </div>
    </div>
</div>

<!-- Play e info -->
<div class="row justify-content-center mt-3 mb-4" style="height: 16rem">
    <div class="col-10">
        <div class="row align-items-center rounded shadow-lg mx-auto h-100">
            <!-- struttura tabs -->
            <div class="col-3">
                <div class="nav flex-column nav-pills" role="tablist" id="menu">
                    <a class="nav-link active" id="istruzioni-tab" href="#istruzioni-cont" data-toggle="pill" role="tab">Istruzioni</a>
                    <a class="nav-link" id="impostazioni-tab" href="#impostazioni-cont" data-toggle="pill" role="tab">Impostazioni</a>
                    <a class="nav-link disabled" id="partita-tab" href="#partita-cont" data-toggle="pill" role="tab">Partita</a>
                </div>
            </div>
            <!-- Contenuto -->
            <div class="col-9 h-100 p-3">
                <div class="tab-content h-75 pt-2">
                    <div class="tab-pane fade show active" id="istruzioni-cont" role="tabpanel">
                        Qui andranno le istruzioni carine e coccolose <br> <br> <br><br> <br> <br> Anche qui
                    </div>

                    <!-- Tab impostazioni -->
                    <div class="tab-pane fade h-100" id="impostazioni-cont" role="tabpanel">
                        <div class="row justify-content-center h-75">
                            <div class="col-12">
                                <h2 class="text-center">Modalità</h2>
                            </div>
                            <div class="col-10 col-sm-6 col-md-3">
                                <select class="form-control" id="selettore_modalita"></select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="partita-cont" role="tabpanel">Punteggi ecc</div>
                </div>
                <!-- zona pulsante e bar -->
                <div class="row justify-content-center h-25">
                    <div class="col-12">
                        <div class="progress" style="height: 1px;">
                            <div class="progress-bar progress-custom" id="progresso_round" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-10 col-sm-6 col-md-3 align-self-end">
                        <button class="btn btn-primary btn-block" type="button" id="gioca_btn" disabled>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Zona risposte -->
    <div class="row justify-content-center h-50">
        <div class="col-10">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow-lg p-2 bg-light">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover0" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-dark" id="titolo0"></h5>
                            <p class="text-dark" id="artista0"></p>
                            <a class="stretched-link" onclick="stopPlay(0)" href="#" disabled></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow-lg p-2 bg-light">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover1" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-dark" id="titolo1"></h5>
                            <p class="text-dark" id="artista1"></p>
                            <a class="stretched-link" onclick="stopPlay(1)" href="#"></a>
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
                            <a class="stretched-link" onclick="stopPlay(2)" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-1">
                    <div class="media rounded shadow p-2 bg-light">
                        <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover3" src="./resources/Transparent.png" alt="Cover">
                        <div class="media-body align-self-center">
                            <h5 class="text-dark" id="titolo3"></h5>
                            <p class="text-dark" id="artista3"></p>
                            <a class="stretched-link" onclick="stopPlay(3)" href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    firstLoad();
</script>
</body>
</html>