<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gioca | Ten's</title>
    <script src="./js/game/spotify_api.js" type="text/javascript"></script>
    <script src="./js/game/game.js" type="text/javascript"></script>
    <script src="./js/game/game_objects.js" type="text/javascript"></script>
    <script src="./js/game/game_stats.js" type="text/javascript"></script>
    <script src="./js/game/game_graphic.js" type="text/javascript"></script>
</head>
<body>

<!-- Notifiche -->
<div class="toast my-toast hide" role="alert" data-autohide="false" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="mr-auto" id="notifiche_titolo">Salvataggio</strong>
        <small class="text-muted">Ora</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body" id="notifiche"></div>
</div>

<!-- Finale -->
<div class="modal fade" id="modal_finale" tabindex="-1" role="dialog" aria-labelledby="finale" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titolo_finale">Partita conclusa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mb-md-3">
                    <h3 class="text-center">Punteggio<br>
                        <span class="text-center h1" id="punteggio_finale">0</span>
                    </h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <h4 class="text-center">Corrette<br>
                            <span class="text-center h2" id="corrette_finale">0</span>
                        </h4>
                    </div>
                    <div class="col-12 col-md-4">
                        <h4 class="text-center">Errate<br>
                            <span class="text-center h2" id="errate_finale">0</span>
                        </h4>
                    </div>
                    <div class="col-12 col-md-4">
                        <h4 class="text-center">Mancate<br>
                            <span class="text-center h2" id="mancate_finale">0</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="ricomincia_finale_btn">Rigioca</button>
            </div>
        </div>
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

                            <!-- Istruzioni -->
                            <div class="row justify-content-center h-75 mb-3 mb-md-5">
                                <div class="col-12 mb-3">
                                    <h2 class="text-center">Benvenuto</h2>
                                </div>
                                <div class="col-12">
                                    <p class="m-0">
                                        <b>Tens</b> è un gioco di velocità, destrezza e un pizzico di fortuna. <br>
                                        Indossa le cuffie o alza lo stereo al massimo, avrai solo <em>dieci</em> secondi per riconoscere il brano e solo <em>dieci</em> turni per fare il punteggio migliore. <small class="text-muted">Si chiama Tens ricordi?</small> <br>
                                        Riuscirai a battere tutti? <br><br>
                                        Modalità di gioco:
                                    </p>
                                    <ul>
                                        <li>Hits: Le grandi hits del presente e del passato, è la modalità di gioco standard che ti permette di raggiungere punteggi altissimi!</li>
                                        <li>Genere: Gioca con il tuo genere preferito e fai capire agli altri che sei il migliore.</li>
                                    </ul>
                                    <p>
                                        Seleziona gioca per iniziare subito o cambia la modalità di gioco. <br>
                                        Buona fortuna!
                                    </p>

                                </div>
                            </div>

                            <!-- Impostazioni -->
                            <div class="row justify-content-center h-25">
                                <div class="col-12 mb-3">
                                    <h2 class="text-center">Modalità di gioco</h2>
                                </div>
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3">
                                    <div class="btn-group btn-group-lg btn-block btn-group-toggle mb-3" role="group" aria-label="scelta modalità" data-toggle="buttons">
                                        <label class="btn btn-primary my-rounded-pill-left active">
                                            <input type="radio" name="normale" id="normale_btn" checked> Hits
                                        </label>
                                        <label class="btn btn-primary my-rounded-pill-right">
                                            <input type="radio" name="options" id="categoria_btn" data-toggle="collapse" data-target="#selettore_categoria_collapse"> Genere
                                        </label>
                                    </div>
                                    <div class="collapse input-group" id="selettore_categoria_collapse">
                                        <select class="custom-select custom-select-lg my-rounded-pill-left my-rounded-pill-right" id="selettore_categoria"></select>
                                    </div>
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
                                        <div class="col-sm-6 my-1 mb-sm-3">
                                            <div class="media rounded shadow-lg p-2 bg-light">
                                                <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover0" src="./resources/Transparent.png" alt="Cover">
                                                <div class="media-body align-self-center">
                                                    <h5 class="text-dark" id="titolo0"></h5>
                                                    <p class="text-dark" id="artista0"></p>
                                                    <a class="stretched-link" onclick="stopPlay(0)" href="#progesso_gioco" disabled></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 my-1 mb-sm-3">
                                            <div class="media rounded shadow-lg p-2 bg-light">
                                                <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover1" src="./resources/Transparent.png" alt="Cover">
                                                <div class="media-body align-self-center">
                                                    <h5 class="text-dark" id="titolo1"></h5>
                                                    <p class="text-dark" id="artista1"></p>
                                                    <a class="stretched-link" onclick="stopPlay(1)" href="#progesso_gioco"></a>
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
                                                    <a class="stretched-link" onclick="stopPlay(2)" href="#progesso_gioco"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 my-1">
                                            <div class="media rounded shadow p-2 bg-light">
                                                <img class="align-self-center mr-3 h-25 w-25 rounded" id="cover3" src="./resources/Transparent.png" alt="Cover">
                                                <div class="media-body align-self-center">
                                                    <h5 class="text-dark" id="titolo3"></h5>
                                                    <p class="text-dark" id="artista3"></p>
                                                    <a class="stretched-link" onclick="stopPlay(3)" href="#progesso_gioco"></a>
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
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 pt-1 align-self-end">
                <button class="btn btn-primary btn-lg btn-block rounded-pill" type="button" id="gioca_btn" disabled>
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