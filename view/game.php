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

<!-- Notifiche -->
<div class="toast my-toast" role="alert" data-autohide="false" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="mr-auto">Salvataggio</strong>
        <small class="text-muted">Ora</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body" id="notifiche">
        <div class="spinner-border spinner-border-sm text-dark" role="status"></div>
        Salvataggio in corso...
    </div>
</div>


<!-- Barra progresso partita -->
<div class="row vw-100 m-0" >
    <div class="col-12 p-0">
        <div class="progress rounded-0">
            <div class="progress-bar" id="progesso_gioco" role="progressbar" style="width: 0%"></div>
        </div>
    </div>
</div>

<!-- Finestra -->
<div class="row my-3 mx-0 justify-content-center" style="min-height: 85vh; max-width: 100vw">
    <div class="col-12 col-md-10">
        <div class="row justify-content-center m-0" style="height: 90% ; width: 100%">
            <!-- Menu tabs -->
            <div class="row invisible" style="height: 0%; width: 100%">
                <div class="col-12">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="istruzioni-tab" href="#istruzioni-cont" data-toggle="pill" role="tab" aria-controls="nav-istruzioni" aria-selected="true">Istruzioni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="partita-tab" href="#partita-cont" data-toggle="pill" role="tab" aria-controls="nav-partita" aria-selected="false">Partita</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- contenuto tabs -->
            <div class="row justify-content-center m-0 mt-md-5" style="height: 100%; width: 100%">
                <div class="col-12">
                    <div class="tab-content">
                        <!-- Istruzioni e impostazioni -->
                        <div class="tab-pane fade show active" id="istruzioni-cont" role="tabpanel">

                            <div class="row justify-content-center h-75 mb-3">
                                <div class="col-12">
                                    <h2 class="text-center">Benvenuto</h2>
                                </div>
                                <div class="col-12">
                                    <p class="text-center">Il chicken tikka masala, comunemente noto in italiano come pollo al curry, è un tipo di curry indiano[2] o britannico,[1] nel quale pezzi cotti in padella di carne di pollo, simili al pollo tikka, vengono serviti assieme a una delicata e cremosa salsa speziata di colore arancione a base di pomodoro, panna e curry.

                                        Le origini del pollo tikka masala sono attualmente oggetto di disputa. La più antica rivendicazione è quella legata agli imperatori dell'Impero Moghul come primi creatori del piatto, tuttavia altre rivendicazioni indicano come luogo di nascita del piatto Glasgow, città della Scozia.[3]

                                        Varie indagini hanno rivelato che il chicken tikka masala è uno dei più popolari piatti serviti nei ristoranti britannici, dove viene chiamato "Britain's true national dish", ovvero il "vero piatto nazionale britannico"</p>
                                </div>
                            </div>


                            <div class="row justify-content-center h-75">
                                <div class="col-12">
                                    <h2 class="text-center">Playlist</h2>
                                </div>
                                <div class="col-10 col-sm-6 col-md-3">
                                    <select class="form-control" id="selettore_modalita"></select>
                                    <p>Tranquillo è provvisorio</p>
                                </div>
                            </div>

                        </div>


                        <!-- Partita -->
                        <div class="tab-pane fade" id="partita-cont" role="tabpanel">
                            <!-- Punteggio -->
                            <div class="row justify-content-center h-25">
                                <div class="col">
                                    <div class="row justify-content-center mb-4">
                                        <div class="col-12 mb-4">
                                            <h2 class="text-center" id="punteggio_testo">Totale</h2>
                                            <h1 class="text-center" id="punteggio_valore">0</h1>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress" style="height: 1px;">
                                                <div class="progress-bar progress-custom" id="progresso_round" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Scelte -->
                            <div class="row justify-content-center h-75">
                                <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Pulsante gioca -->
        <div class="row justify-content-center m-0" style="height: 10%; width: 100%">
            <div class="col-10 col-sm-6 col-md-3 pt-1 align-self-end">
                <button class="btn btn-primary btn-block rounded-pill" type="button" id="gioca_btn" disabled>
                </button>
            </div>
        </div>
    </div>

</div>
<script>
    firstLoad();
</script>
</body>
</html>