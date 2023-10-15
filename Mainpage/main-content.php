<main class="container-fluid">
    <section class="" id="welcome-section">
        <div class="welcome-container ">
            <div class="welcome-wrapper  d-flex align-items-center justify-content-center">
                <div class="container ">
                    <h1>Welcome to MAPATURO</h1>
                    <p>An Interactive Map Game of The Philippines</p>
                    <a href="#main-section"><button class="btn btn-primary">Let's Start</button></a>
                </div>
            </div>
        </div>
    </section>
    <section class=" mt-3" id="main-section">
        <div class="main-content ">
            <div class="main-content-wrapper  d-flex align-items-center justify-content-center">
                <div class="row container  d-flex align-items-center justify-content-center">
                    <div class="col-md-5 col-12  text-center px-5">
                        <h1><span id="interactive-region">The Philippines</span></h1>
                        <div class="main-buttons px-5">
                            <div class="play-button my-3">
                                <button class="btn py-4 w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#play-modes" aria-expanded="false" aria-controls="play-modes">
                                    PLAY
                                </button>
                                <div class="collapse my-2" id="play-modes">
                                    <div class="play-modes px-4">
                                        <div class="guessbyname-button my-2">
                                            <a href="GameButtons/Guessbyname/guessbyname.php"><button
                                                    class="btn w-100">Guess By Name</button></a>
                                        </div>
                                        <div class="guessbymap-button my-2">
                                            <a href="GameButtons/Guessbymap/guessbymap.php"><button
                                                    class="btn w-100">Guess By Map</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="learnmore-button my-3">
                                <a href="GameButtons/Learnmore/learnmode.php"><button class="btn w-100">Learn More</button></a>
                            </div>
                            <div class="leaderboard-button my-3">
                                <a href="GameButtons/Leaderboards/leaderboard.php"><button class="btn w-100">Leaderboards</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12 ">
                        <div class="svg-map-wrapper d-flex align-items-center justify-content-center overflow-hidden">
                            <?php include("Asset/Map/svg-map.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" mt-3" id="about-mapaturo-section">
        <div class="about-mapaturo ">
            <div class="about-mapaturo-wrapper  d-flex align-items-center justify-content-center">
                <div class="about-content">
                    <h1>MAPATURO</h1>
                    <p>MAPATURO is adkaksdjaksjdjkasdjkaksd</p>
                </div>
            </div>
        </div>
    </section>
    <section class=" mt-3" id="about-creator-section">
        <div class="about-creator ">
            <div class="about-creator-wrapper  d-flex align-items-center justify-content-center">
                <div class="row container ">
                    <div class="col-md-5 col-12 ">
                        <div class="id-info-column bg-light px-5 p-3 h-100 text-center overflow-hidden">
                            <div class="renzo-id-details h-100" id="renzo-id-details">
                                <img src="Asset/Images/guessbyname.jpg" alt="" class="my-2">
                                <h5 class="my-2">Renzo Viñas</h5>
                                <p class="my-2">Project Leader</p>
                            </div>
                            <div class="earl-id-details h-100" id="earl-id-details">
                                <img src="Asset/Images/guessbyname.jpg" alt="" class="my-2">
                                <h5 class="my-2">Earl Stephen Tacda</h5>
                                <p class="my-2">Programmer 1</p>
                            </div>
                            <div class="winston-id-details h-100" id="winston-id-details">
                                <img src="Asset/Images/guessbyname.jpg" alt="" class="my-2">
                                <h5 class="my-2">Winston Agustin</h5>
                                <p class="my-2">Programmer 2</p>
                            </div>
                            <div class="linus-id-details h-100" id="linus-id-details">
                                <img src="Asset/Images/guessbyname.jpg" alt="" class="my-2">
                                <h5 class="my-2">Linus Sambile</h5>
                                <p class="my-2">Documentation</p>
                            </div>
                            <div class="gerche-id-details h-100" id="gerche-id-details">
                                <img src="Asset/Images/guessbyname.jpg" alt="" class="my-2">
                                <h5 class="my-2">Gerche Jay Balaan</h5>
                                <p class="my-2">Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12 ">
                        <div class="svg-map-wrapper d-flex align-items-center justify-content-center overflow-hidden overflow-hidden">
                            <div class="renzo-pin btn">
                                <a onclick="renzo()">
                                    <div class="pin">
                                    </div>
                                </a>
                            </div>
                            <div class="earl-pin btn">
                                <a onclick="earl()">
                                    <div class="pin">
                                    </div>
                                </a>
                            </div>
                            <div class="winston-pin btn">
                                <a onclick="winston()">
                                    <div class="pin">
                                    </div>
                                </a>
                            </div>
                            <div class="linus-pin btn">
                                <a onclick="linus()">
                                    <div class="pin">
                                    </div>
                                </a>
                            </div>
                            <div class="gerche-pin btn">
                                <a onclick="gerche()">
                                    <div class="pin">
                                    </div>
                                </a>
                            </div>
                            <?php include("Asset/Map/cavite.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const renzoinfo = document.getElementById("renzo-id-details");
    const earlinfo = document.getElementById("earl-id-details");
    const winstoninfo = document.getElementById("winston-id-details");
    const linusinfo =document.getElementById("linus-id-details");
    const gercheinfo =document.getElementById("gerche-id-details");

    function renzo() {
        renzoinfo.style.display = "block";
        earlinfo.style.display = "none";
        winstoninfo.style.display = "none";
        linusinfo.style.display = "none";
        gercheinfo.style.display = "none";
    }

    function earl() {
        renzoinfo.style.display = "none";
        earlinfo.style.display = "block";
        winstoninfo.style.display = "none";
        linusinfo.style.display = "none";
        gercheinfo.style.display = "none";
    }

    function winston() {
        renzoinfo.style.display = "none";
        earlinfo.style.display = "none";
        winstoninfo.style.display = "block";
        linusinfo.style.display = "none";
        gercheinfo.style.display = "none";
    }

    function linus() {
        renzoinfo.style.display = "none";
        earlinfo.style.display = "none";
        winstoninfo.style.display = "none";
        linusinfo.style.display = "block";
        gercheinfo.style.display = "none";
    }

    function gerche() {
        renzoinfo.style.display = "none";
        earlinfo.style.display = "none";
        winstoninfo.style.display = "none";
        linusinfo.style.display = "none";
        gercheinfo.style.display = "block";
    }
</script>