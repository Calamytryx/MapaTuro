<h1>THE PHILIPPINES</h1>
<div class="dropdown-buttons" id="dropdown-list">
    <div class="collapse-wrapper">
        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample"><i
                class="fa-solid fa-caret-down"></i>&nbsp;&nbsp;Choose Regions
            of the
            Map</button>
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
            <button class="button">PLAY</button>
        </div>
        <div class="learn-mode p-2">
            <button class="button">Learn More</button>
        </div>
        <div class="leaderboards p-2">
            <button class="button">Leaderboard</button>
        </div>
    </div>
</div>

<script>
    function learnMode() {
        const regionMap = document.getElementById('svg-map-region');
        const muniMap = document.getElementById('svg-map-muni');
        const dropdown = document.getElementById('dropdown-list');

        regionMap.style.display = "none";
        muniMap.style.display = "block";
        dropdown.style.display = "none";
    }
</script>