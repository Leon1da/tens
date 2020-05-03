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
<div class="row my-3 justify-content-center" style="height: 85vh">
    <div class="col-10">
        <div class="row justify-content-center " style="height: 90% ; width: 100%">
            <!-- Menu tabs -->
            <div class="row" style="height: 10%; width: 100%">
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
            <div class="row justify-content-center" style="height: 90%; width: 100%">
                <div class="col-12">
                    <div class="tab-content">
                        <!-- Istruzioni e impostazioni -->
                        <div class="tab-pane fade show active" id="istruzioni-cont" role="tabpanel">
                            Sint sit mollit irure quis est nostrud cillum consequat Lorem esse do quis dolor esse fugiat sunt do. Eu ex commodo veniam Lorem aliquip laborum occaecat qui Lorem esse mollit dolore anim cupidatat. Deserunt officia id Lorem nostrud aute id commodo elit eiusmod enim irure amet eiusmod qui reprehenderit nostrud tempor. Fugiat ipsum excepteur in aliqua non et quis aliquip ad irure in labore cillum elit enim. Consequat aliquip incididunt ipsum et minim laborum laborum laborum et cillum labore. Deserunt adipisicing cillum id nulla minim nostrud labore eiusmod et amet. Laboris consequat consequat commodo non ut non aliquip reprehenderit nulla anim occaecat. Sunt sit ullamco reprehenderit irure ea ullamco Lorem aute nostrud magna.
                        </div>


                        <!-- Partita -->
                        <div class="tab-pane fade" id="partita-cont" role="tabpanel">
                            <!-- Punteggio -->
                            <div class="row justify-content-center h-25">
                                <div class="col">
                                    <div class="row justify-content-center h-75 mb-4">
                                        <div class="col-12">
                                            <h2 class="text-center" id="punteggio_testo">Totale</h2>
                                            <h1 class="text-center" id="punteggio_valore">0</h1>
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





        <!-- Bar e pulsante gioca -->
        <div class="row justify-content-center" style="height: 10%; width: 100%">
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
<script>
    firstLoad();
</script>
</body>
</html>