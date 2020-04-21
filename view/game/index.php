<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--<link rel="stylesheet" href="../../css/style.css" >-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<!-- play -->
<div class="row w-100 h-100 justify-content-md-center align-items-center" style="position: fixed;">
    <div class="col-md-auto">
            <svg class="bi bi-play" id="play-btn" width="10em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <a>
                    <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 010 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" clip-rule="evenodd"/>
                </a>
            </svg>
    </div>
</div>

<div class="row w-100 h-100 justify-content-md-center align-items-center" id="game-content" style="position: fixed;">
    <!-- progress bar -->
    <div class="col-md-8" >
        <div class="progress" style="height: 20px;">
            <div class="progress-bar" id="progress-game" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="col-md-8" >
        <div class="progress" style="height: 20px;">
            <div class="progress-bar" id="progress-answer" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>


    <!-- quiz option -->
    <div>
        <div class="row">
            <div class="card mb-3 my-card" style="max-width: 540px; margin: 20px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 my-card" style="max-width: 540px; margin: 20px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="card mb-3 my-card" style="max-width: 540px; margin: 20px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 my-card" style="max-width: 540px; margin: 20px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<script>
    $(document).ready(function(){
        $("#game-content").hide();
        // intercetta il click sul bottone play
        $("#play-btn").click(function () {
            $("#play-btn").hide(); // nascondo il pulsante play
            $("#game-content").show();

            //play game
            startProgressbar();
            function startProgressbar() {
                var progress_game = 0;
                var progress_answer = 0;

                // timer answer
                var t_answer = window.setInterval(timerAnswer, 100);
                // timer game
                var extra = 700; // per allineare i due timer
                var t_game = window.setTimeout(timerGame, 10000 + extra);

                function sleep(milliseconds) {
                    const date = Date.now();
                    let currentDate = null;
                    do {
                        currentDate = Date.now();
                    } while (currentDate - date < milliseconds);
                }

                function timerAnswer() {
                    var style = "width: " + progress_answer + "%;";
                    $("#progress-answer").attr("style", style);

                    progress_answer++; // (+=1%)
                }

                function timerGame() {
                    progress_answer = 0;
                    progress_game+=10; // (+=10%)
                    window.clearInterval(t_answer);

                    var style = "width: " + progress_game + "%;";
                    $("#progress-game").attr("style", style);

                }
            }

        });

    });


</script>
