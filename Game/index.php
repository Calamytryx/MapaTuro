<?php
require_once ('../Database/pdo.php');
if ($_POST['mapChoice'] !== null) {
  // Retrieve submitted values from the form
  $mapChoice = trim($_POST['mapChoice']);
  $scopeChoice = $_POST['scopeChoice'];
  $typeChoice = $_POST['typeChoice'];
  $modeChoice = $_POST['modeChoice'];

  echo "<div class='scope-pick' id='$scopeChoice'></div>";
  echo "<div class='mapChoice' id='$mapChoice'></div>";
  // Assuming $mapChoice is the ID of the SVG element
} else {
  header('location: ..');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MapaTuro -|- Game</title>
  <link rel="stylesheet" href="../_Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="CSS/game.css">
  <link rel="stylesheet" href="CSS/guessbyname.css">
  <link rel="stylesheet" href="CSS/guessbymap.css">
</head>

<body>
  <?php include ('../GameModals/compliment.php'); ?>

  <div class="maplist container" id="maplist_modal">
    <div class="maplist-wrapper">
      <button class="btn close-button" onclick="closeModal('maplist_modal')"><i class="fa-solid fa-xmark"></i></button>
      <div class="map_list">
        <!-- Region Iteration -->
        <?php if ($scopeChoice === 'regions'): ?>
          <div class="region-list">
            <h1>Regions</h1>
            <div class="region-iterate">
              <?php
              if (isset($mapChoice)) {
                if ($mapChoice === 'Philippines') {
                  // If $mapChoice is 'Philippines', iterate all regions
                  $query = $pdo->query("SELECT * FROM regions");
                  $regions = $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                  // Check if $mapChoice belongs to the 'islands' table
                  $query = $pdo->prepare("SELECT * FROM islands WHERE name = ?");
                  $query->execute([$mapChoice]);
                  $island = $query->fetch(PDO::FETCH_ASSOC);

                  if ($island) {
                    // Get the island ID
                    $islandID = $island['id'];

                    // Use the island ID to query regions
                    $query = $pdo->prepare("SELECT * FROM regions WHERE island_id = ?");
                    $query->execute([$islandID]);
                    $regions = $query->fetchAll(PDO::FETCH_ASSOC);
                  }
                }
              }

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
                echo '<a href="#" onclick="selectScopeSelfPick(\'' . $regionName . '\')">' . $regionName . '</a>';
                echo '<hr>';
              }
              ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Province Iteration -->
        <?php if ($scopeChoice === 'provinces'): ?>
          <div class="province-list">
            <h1>Provinces</h1>
            <div class="province-iterate">
              <?php
              if ($mapChoice) {
                if ($mapChoice === 'Philippines') {
                  // If $mapChoice is 'Philippines', iterate all provinces
                  $query = $pdo->query("SELECT * FROM provinces");
                  $provinces = $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                  // Check if $mapChoice belongs to the 'regions' table
                  $query = $pdo->prepare("SELECT * FROM regions WHERE name = ?");
                  $query->execute([$mapChoice]);
                  $region = $query->fetch(PDO::FETCH_ASSOC);

                  if ($region) {
                    // Get the ID from the 'regions' table
                    $regionID = $region['id'];

                    // Use the ID to query provinces
                    $query = $pdo->prepare("SELECT * FROM provinces WHERE region_id = ?");
                    $query->execute([$regionID]);
                    $provinces = $query->fetchAll(PDO::FETCH_ASSOC);
                  } else {
                    // If $mapChoice doesn't belong to 'regions'
                    // Check if it belongs to 'islands' table
                    $query = $pdo->prepare("SELECT * FROM islands WHERE name = ?");
                    $query->execute([$mapChoice]);
                    $island = $query->fetch(PDO::FETCH_ASSOC);

                    if ($island) {
                      // Get the island ID
                      $islandID = $island['id'];

                      // Use the island ID to query regions
                      $query = $pdo->prepare("SELECT id FROM regions WHERE island_id = ?");
                      $query->execute([$islandID]);
                      $regionIDs = $query->fetchAll(PDO::FETCH_COLUMN);

                      if ($regionIDs) {
                        $provinces = []; // Initialize an empty array to store provinces
            
                        // Iterate through each region ID and query corresponding provinces
                        foreach ($regionIDs as $regionID) {
                          // Use the region ID to query provinces
                          $query = $pdo->prepare("SELECT * FROM provinces WHERE region_id = ?");
                          $query->execute([$regionID]);
                          $provinces = array_merge($provinces, $query->fetchAll(PDO::FETCH_ASSOC)); // Merge results into provinces array
                        }
                      } else {
                        // If no regions found for the island, set provinces to an empty array
                        $provinces = [];
                      }
                    }

                  }
                }
              }

              // Sort provinces alphabetically by name
              usort($provinces, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
              });

              // Iterate through provinces
              foreach ($provinces as $province) {
                $provinceName = $province['name'];

                // Check if the province name is "Tawi-Tawi"
                if ($provinceName !== "Tawi-Tawi") {
                  // Replace dashes with spaces
                  $provinceName = str_replace('-', ' ', $provinceName);
                }

                // Output the province name as an anchor tag
                echo '<a href="#" onclick="selectScopeSelfPick(\'' . $provinceName . '\')">' . $provinceName . '</a>';
                echo '<hr>';
              }
              ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="game-container">
    <button class="btn back-button" onclick="navigateTo('../')"><i class="fa-solid fa-circle-chevron-left"></i></button>
    <div class="main-content">
      <div id="question-col">
        <!-- Name -->
        <?php if ($typeChoice === 'name'): ?>
          <div id="question">Click on
            <?php if ($modeChoice !== 'self-pick'): ?><br><span id="scope"></span>
            <?php endif; ?>
          </div>
          <?php if ($modeChoice === 'self-pick'): ?>
            <button class="btn selectmap" onclick="selectSelfPick()" id="scope">Select</button>
          <?php endif; ?>
        <?php else: ?>
          <!-- Map -->
          <div id="prompt"></div>
          <div id="question"></div>
          <div id="choices-buttons"></div>
        <?php endif; ?>
      </div>
      <div id="game-panel">
        <div id="location"></div>
        <div id="score">Score: <span id="score-count">0</span></div>
        <div id="items"><span id="current-item-count">0</span> of <span id="item-count">0</span></div>
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
      <div class="main-map">
        <?php include ('../Map/svg-map.php'); ?>
      </div>
    </div>
  </div>

  <script src="../_Bootstrap/jquery/jquery.min.js"></script>
  <script src="../_Bootstrap/popper/popper.min.js"></script>
  <script src="../_Bootstrap/js/bootstrap.min.js"></script>
  <script src="../Script/mapnavi.js"></script>
  <script src="../Script/script.js"></script>
  <script src="../Script/confetti.js"></script>

  <?php
  $relativePath = '../';
  require ("audio.php");
  require ("gameVariables.php");

  if ($typeChoice === 'name'):
    if ($modeChoice === 'self-pick'):
      require ("guessByName-self-pick.js.php");
    else:
      require ("guessByName.js.php");
    endif;
  else:
    if ($modeChoice === 'self-pick'):
      require ("guessByMap-self-pick.js.php");
    else:
      require ("guessByMap.js.php");
    endif;
  endif;

  require ("gameFunctions.php");
  
  echo "<script>";
  echo "let mapquery = '$mapChoice';";
  echo "mapquery = mapquery.replace(/\\s+/g, '-');";
  echo "fitPathIntoView(mapquery);";
  echo "</script>";
  ?>

  <script>
    initialize();
  </script>
</body>

</html>