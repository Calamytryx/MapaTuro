<?php include_once ('Database/pdo.php');
if (isset($_POST['selectedValue'])) {
  $selectedValue = $_POST['selectedValue'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MapaTuro</title>

  <link rel="stylesheet" href="_Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <form action="index.php" method="POST" id="form">
    <input type="hidden" id="form-input" name="selectedValue" value="">
  </form>

  <div class="modal-choice container" id="game_modal">
    <div class="modal-wrapper">
      <button class="btn close-button" onclick="closeModal('game_modal')"><i class="fa-solid fa-xmark"></i></button>
      <div class="scope">
        Scope
        <div class="scope-choices">
          <button class="btn" onclick="modeSelected(this)" value="regions" id="scope-regions">Regions</button>
          <button class="btn" onclick="modeSelected(this)" value="provinces" id="scope-provinces">Provinces</button>
        </div>
      </div>
      <div class="type">
        Type
        <div class="type-choices">
          <button class="btn" onclick="modeSelected(this)" value="name" id="type-name">Name</button>
          <button class="btn" onclick="modeSelected(this)" value="map" id="type-map">Map</button>
        </div>
      </div>
      <div class="mode">
        Mode
        <div class="mode-choices">
          <button class="btn" onclick="modeSelected(this)" value="self-pick" id="mode-self">Self Pick</button>
          <button class="btn" onclick="modeSelected(this)" value="adaptive" id="mode-adaptive">Adaptive</button>
        </div>
      </div>
      <button class="btn start" onclick="startGame()"><i class="fa-solid fa-circle-chevron-right"></i></button>

      <input type="hidden" id="mapChoice" name="mapChoice" value="">
      <input type="hidden" id="scopeChoice" name="scopeChoice" value="">
      <input type="hidden" id="typeChoice" name="typeChoice" value="">
      <input type="hidden" id="modeChoice" name="modeChoice" value="">
    </div>
  </div>

  <div class="maplist container" id="maplist_modal">
    <div class="maplist-wrapper">
      <button class="btn close-button" onclick="closeModal('maplist_modal')"><i class="fa-solid fa-xmark"></i></button>
      <div class="map_list">
        <!-- Main Island Iteration -->
        <div class="main-island-list">
          <h1>Main Islands</h1>
          <div class="main-island-iterate">
            <?php
            $query = $pdo->query("SELECT * FROM islands");
            $islands = $query->fetchAll(PDO::FETCH_ASSOC);

            // Get the index of the row with the highest ID
            $lastIndex = count($islands) - 1;

            // Remove the row with the highest ID from the array
            $lastIsland = array_splice($islands, $lastIndex, 1);

            // Prepend the row with the highest ID to the beginning of the array
            array_unshift($islands, $lastIsland[0]);

            foreach ($islands as $island) {
              $name = $island['name'];
              echo '<a href="#" onclick="updateSelectMap(\'' . $name . '\')">' . $name . '</a>';
            }
            ?>

          </div>
        </div>

        <!-- Region Iteration -->
        <div class="region-list">
          <h1>Regions</h1>
          <div class="region-iterate">
            <?php
            $query = $pdo->query("SELECT * FROM regions");
            $regions = $query->fetchAll(PDO::FETCH_ASSOC);

            // Custom sorting function
            usort($regions, function ($a, $b) {
              // Function to extract numeric part from region id
              $getNumericPart = function ($id) {
                preg_match('/^(\d+)([A-Z]*)$/', $id, $matches);
                return isset ($matches[1]) ? intval($matches[1]) : null;
              };

              // Function to extract alphabetic part from region id
              $getAlphabeticPart = function ($id) {
                preg_match('/^(\d+)([A-Z]*)$/', $id, $matches);
                return isset ($matches[2]) ? $matches[2] : null;
              };

              // Extract numeric and alphabetic parts from region IDs
              $numericA = $getNumericPart($a['id']);
              $numericB = $getNumericPart($b['id']);
              $alphabeticA = $getAlphabeticPart($a['id']);
              $alphabeticB = $getAlphabeticPart($b['id']);

              // Compare numeric parts first
              if ($numericA !== null && $numericB !== null) {
                if ($numericA != $numericB) {
                  return $numericA - $numericB;
                }
                // If numeric parts are equal, compare alphabetic parts
                return strcmp($alphabeticA, $alphabeticB);
              } elseif ($numericA !== null) {
                // $a has numeric part, $b does not
                return -1;
              } elseif ($numericB !== null) {
                // $b has numeric part, $a does not
                return 1;
              } else {
                // Neither $a nor $b have numeric parts, compare as strings
                return strcmp($a['id'], $b['id']);
              }
            });

            foreach ($regions as $region) {
              // Extract the region name
              $regionName = $region['name'];

              // Apply regex and string manipulation
              $regionName = preg_replace('/(Region-)?(I{1,3}|[IVX]+)-([A-Z])/', '$1$2 $3', $regionName);
              $regionName = str_replace('-', ' ', $regionName);

              // Output the formatted region name as an anchor tag
              echo '<a href="#" onclick="updateSelectMap(\'' . $regionName . '\')">' . $regionName . '</a>';
            }
            ?>
          </div>
        </div>

        <!-- Province Iteration -->
        <div class="province-list">
          <h1>Provinces</h1>
          <div class="province-iterate">
            <?php
            $query = $pdo->query("SELECT * FROM provinces");
            $provinces = $query->fetchAll(PDO::FETCH_ASSOC);

            usort($provinces, function ($a, $b) {
              return strcmp($a['name'], $b['name']);
            });

            foreach ($provinces as $province) {
              $provinceName = $province['name'];
              $provinceName = str_replace('-', ' ', $provinceName);
              echo '<a href="#" onclick="updateSelectMap(\'' . $provinceName . '\')">' . $provinceName . '</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-container">
    <?php include ('navigation.php'); ?>
    <div class="main-content">
      <div class="main-buttons">
        <p class="select-label">Select Location</p>
        <button class="btn selectmap" onclick="select()">
          <?php echo isset($_POST['selectedValue']) ? $_POST['selectedValue'] : "Philippines"; ?>
        </button>

        <button class="btn play" onclick="play()" id="play-button">Play</button>
        <button class="btn learnmode" onclick="navigateTo('Learn/')" id="learn-button">Learn Mode</button>
      </div>
      <div class="map-buttons">
        <div class="button-group">
          <button class="btn map-btn" onclick="mapNavigationSelected('zoom-in')" onmouseover="promptLabel(this)"
            onmouseout="removeLabel()" id="btn-in"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
          <div class="btnLabel" id="btnlbl-in">Zoom In</div>
        </div>
        <div class="button-group">
          <button class="btn map-btn" onclick="mapNavigationSelected('zoom-out')" onmouseover="promptLabel(this)"
            onmouseout="removeLabel()" id="btn-out"><i class="fa-solid fa-magnifying-glass-minus"></i></button>
          <div class="btnLabel" id="btnlbl-out">Zoom Out</div>
        </div>
        <div class="button-group">
          <button class="btn map-btn" onclick="mapNavigationSelected('reset')" onmouseover="promptLabel(this)"
            onmouseout="removeLabel()" id="btn-reset"><i class="fa-solid fa-square-minus"></i></button>
          <div class="btnLabel" id="btnlbl-reset">Reset</div>
        </div>
      </div>
      <div class="main-map map-hover">
        <?php include ('Map/svg-map.php'); ?>
      </div>
    </div>
  </div>

  <script src="_Bootstrap/jquery/jquery.min.js"></script>
  <script src="_Bootstrap/popper/popper.min.js"></script>
  <script src="_Bootstrap/js/bootstrap.min.js"></script>
  <script src="Script/script.js"></script>
  <script src="Script/mapnavi.js"></script>
  <script src="Script/fitmap.js"></script>
  <script src="Script/confetti.js"></script>
  <!-- <script>
  window.onload = function() {
    var isChromium = window.chrome;
    var isNonChromium = !isChromium;

    if (isNonChromium) {
      var message = document.createElement('div');
      message.textContent = "Please use a different browser. This website is optimized for Chromium-based browsers.";
      message.style.backgroundColor = "#ff0000";
      message.style.color = "#ffffff";
      message.style.padding = "10px";
      message.style.fontFamily = "Arial, sans-serif";
      message.style.fontSize = "40px";
      message.style.textAlign = "center";
      message.style.position = "fixed";
      message.style.top = "0";
      message.style.left = "0";
      message.style.width = "100%";
      message.style.height = "100%";
      message.style.zIndex = "9999999";
      document.body.appendChild(message);
    }
  };
  </script> -->

  <?php
  if (isset($_POST['selectedValue'])) {
    echo '<script>setTimeout(function() { highlight("' . $_POST['selectedValue'] . '"); }, 0.1);</script>';
  }

  $pdo = null;
  ?>
</body>

</html>