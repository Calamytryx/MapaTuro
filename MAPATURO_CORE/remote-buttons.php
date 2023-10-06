<h1>THE PHILIPPINES</h1>
<div class="dropdown-buttons" id="dropdown-list">
    <div class="collapse-wrapper">
        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample" id="dropdown-button"><i
                class="fa-solid fa-caret-down"></i>&nbsp;&nbsp;Choose Regions of the Map</button>
        <div class="row mt-2 mx-5">
            <div class="col mx-5">
                <div class="collapse region-wrapper mx-2" id="collapseExample">
                    <div class="region-list">
                        <?php include("region-list.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-button mx-5">
    <div class="pt-2">
        <div class="play-mode p-2">
            <div class="banner">
                <a href="#" class='butn butn__new play' onclick="playMode()"><span>PLAY</span></a>
            </div>
        </div>
        <div class="learn-mode p-2">
            <div class="banner">
                <a href="#" class='butn butn__new learn' onclick="learnMode()"><span>Learn More</span></a>
            </div>
        </div>
        <div class="leaderboards p-2">
            <div class="banner">
                <a href="#" class='butn butn__new leaderboard'><span>Leaderboards</span></a>
            </div>
        </div>
    </div>
</div>

<script>
    function playMode() {
        const regionMap = document.getElementById('svg-map-region');
        const muniMap = document.getElementById('svg-map-muni');
        const dropdown = document.getElementById('dropdown-list');
        const dropbutton =document.getElementById('dropdown-button');

        regionMap.style.display = "block";
        muniMap.style.display = "none";
        dropdown.style.display = "block";
        dropbutton.style.backgroundColor = "#04AA6D";
        dropbutton.style.border = "4px solid #3e8e41";
    }

    function learnMode() {
        const regionMap = document.getElementById('svg-map-region');
        const muniMap = document.getElementById('svg-map-muni');
        const dropdown = document.getElementById('dropdown-list');
        const dropbutton =document.getElementById('dropdown-button');

        regionMap.style.display = "none";
        muniMap.style.display = "block";
        dropbutton.style.backgroundColor = "#6539de";
        dropbutton.style.border = "4px solid #4b29a7";
    }


</script>