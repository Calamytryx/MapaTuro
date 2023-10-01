<div class="text-center" id="remote-buttons">
    <h1>MAPATURO</h1>
    <div class="floating-buttons mx-5">
        <div class="play-mode p-2">
            <button onclick="playMode()" class="w-100 p-1">Play Map</button>
        </div>
        <div class="learn-mode p-2">
            <button onclick="learnMode()" class="w-100 p-1">Learn Map</button>
        </div>
    </div>
</div>

<section class="game-modes-hidden" id="game-modes-modal">
    <div class="container-fluid h-100 d-flex" id="game-modes-choices">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row gx-5 text-center">
                <div class="col-12 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="Pictures/guessbyname.jpg" class="card-img-top" alt="Guess By Name">
                        <div class="card-body">
                            <h5 class="card-title">Guess by Name</h5>
                            <p class="card-text">Guess the map using names!</p>
                            <button onclick="guessByName()" class="w-50 p-1">Play</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 accordion-header col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="Pictures/guessbyshape.jpg" class="card-img-top" alt="Guess By Shape">
                        <div class="card-body">
                            <h5 class="card-title">Guess by Map</h5>
                            <p class="card-text">Guess the name using maps!</p>
                            <button onclick="guessByMap()" class="w-50 p-1">Play</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="close-btn text-end m-2" id="close-button-game-modes">
            <span><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
</section>

<section class="container-fluid border" id="map">
    <div class="container d-flex align-items-center justify-content-center border mx-auto">
        <div class="row map-wrapper border">
            <div class="col-12">
                <?php include("phi-svg.php"); ?>
            </div>
        </div>
    </div>
</section>

<script>
    // Hide and Display Account Container
    function playMode() {
        var gameModesModal = document.getElementById("game-modes-modal");
        if (gameModesModal.classList.contains("game-modes-hidden")) {
            gameModesModal.classList.remove("game-modes-hidden");
            gameModesModal.classList.add("game-modes-visible");
        } else {
            gameModesModal.classList.remove("game-modes-visible");
            gameModesModal.classList.add("game-modes-hidden");
        }
    }

    // Close Button Function
    var closeButton = document.getElementById("close-button-game-modes");
    closeButton.addEventListener("click", hideGameModeModal);

    function hideGameModeModal() {
        var gameModesModal = document.getElementById("game-modes-modal");
        gameModesModal.classList.remove("game-modes-visible");
        gameModesModal.classList.add("game-modes-hidden");
    }

</script>