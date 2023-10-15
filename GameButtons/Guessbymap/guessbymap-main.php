<div class="guessbymap-container" id="guessbymap-container">
    <div class="guessbymap-wrapper p-lg-3 p-md-2 p-1" id="guessbymap-wrapper">
        <div class="row g-3">
            <div class="col-12 col-md-3 d-md-flex align-items-center justify-content-center order-md-1 order-1">
                <div class="guessbymap-control-buttons-wrapper">
                    <?php include("../ControlButton/control-button.php"); ?>
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-3">
                <div class="guessbymap-main-wrapper text-center">
                    <div class="guessbymap-main-container p-md-3 p-1">
                        <div class="guessbymap-text">
                            <h1>Guess By Map</h1>
                            <h4>Luzon</h4>
                            <div class="row">
                                <div class="col-6">
                                    <p>Question 0/30</p>
                                </div>
                                <div class="col-6">
                                    <p>0:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="guessbymap-map px-lg-5 px-md-3 px-1">
                            <div class="container">
                                <?php include("../../Asset/Map/svg-map.php"); ?>
                            </div>
                        </div>
                        <div class="guessbymap-choices p-md-3 p-2">
                            <div class="row g-3 px-lg-5 px-md-3 px-1">
                                <div class="col-6">
                                    <button class="w-75">Choice A</button>
                                </div>
                                <div class="col-6">
                                    <button class="w-75">Choice B</button>
                                </div>
                                <div class="col-6">
                                    <button class="w-75">Choice C</button>
                                </div>
                                <div class="col-6">
                                    <button class="w-75">Choice D</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 d-md-flex align-items-center justify-content-center order-md-3 order-2">
                <div class="guessbymap-dropdown text-center px-5">
                    <button class="w-100 px-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#dropdown-region" aria-expanded="false" aria-controls="dropdown-region">
                        Choose Region
                    </button>
                    <div class="collapse my-2" id="dropdown-region">
                        <div class="region-scroll bg-light overflow-y-scroll">
                            <div class="region-item">
                                <a href="" onclick="Luzon()">Luzon</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">Visayas</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Mindanao</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Luzon()">NCR</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">CAR</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">BARMM</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 1</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Luzon()">Region 2</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">Region 3</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 4A</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 4B</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Luzon()">Region 5</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">Region 6</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 7</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Luzon()">Region 8</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">Region 9</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 10</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Luzon()">Region 11</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Visayas()">Region 12</a>
                            </div>
                            <div class="region-item">
                                <a href="" onclick="Mindanao()">Region 13</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>