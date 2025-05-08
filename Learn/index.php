<?php
include_once ("..\Database\pdo.php");

if (isset($_POST['selectedValue'])) {
  $selectedValue = $_POST['selectedValue'];
  $tableName = '';

  // Check if selected value exists in the 'name' column of each table
  $tables = ['islands', 'regions', 'provinces'];
  foreach ($tables as $table) {
    $result = fetchData($pdo, $table, 'name', $selectedValue);
    if ($result) {
      $tableName = $table;
      break; // Stop loop if value is found in any table
    }
  }

  // Set appropriate $_POST variable based on where the value is found
  if ($tableName === 'provinces') {
    $_POST['province'] = $selectedValue;
  } elseif ($tableName === 'regions') {
    $_POST['region'] = $selectedValue;
  } elseif ($tableName === 'islands') {
    $_POST['island'] = $selectedValue;
  }

  // Fetch data based on the selected table
  if ($tableName === 'provinces') {
    $provinceData = $result;
    $infoData = fetchData($pdo, 'information', 'province_id', $provinceData[0]['id']);
    $geoData = fetchData($pdo, 'geography', 'province_id', $provinceData[0]['id']);
    $popData = fetchData($pdo, 'population', 'province_id', $provinceData[0]['id']);
    $foodData = fetchData($pdo, 'foods', 'province_id', $provinceData[0]['id']);
    $triviaData = fetchData($pdo, 'trivia', 'province_id', $provinceData[0]['id']);
  } elseif ($tableName === 'regions') {
    $regionData = $result;
    $infoData = fetchData($pdo, 'information', 'region_id', $regionData[0]['id']);
    $geoData = fetchData($pdo, 'geography', 'region_id', $regionData[0]['id']);
    $popData = fetchData($pdo, 'population', 'region_id', $regionData[0]['id']);
    $foodData = fetchData($pdo, 'foods', 'province_id', $regionData[0]['id']);
    $triviaData = fetchData($pdo, 'trivia', 'region_id', $regionData[0]['id']);
  } elseif ($tableName === 'islands') {
    $islandData = $result;
    $infoData = fetchData($pdo, 'information', 'island_id', $islandData[0]['id']);
    $geoData = fetchData($pdo, 'geography', 'island_id', $islandData[0]['id']);
    $popData = fetchData($pdo, 'population', 'island_id', $islandData[0]['id']);
    $foodData = fetchData($pdo, 'foods', 'island_id', $islandData[0]['id']);
    $triviaData = fetchData($pdo, 'trivia', 'island_id', $islandData[0]['id']);
  }
}
function fetchData($pdo, $tableName, $conditionColumn, $conditionValue)
{
  $query = "SELECT * FROM $tableName WHERE $conditionColumn = :value";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':value', $conditionValue);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MapaTuro -|- Learn</title>

  <link rel="stylesheet" href="../_Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <form action="index.php" method="POST" id="form">
    <input type="hidden" id="form-input" name="selectedValue" value="">
  </form>

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

  <div class="learn-container">
    <div class="main-content">
      <button class="btn back-button" onclick="navigateTo('../')"><i
          class="fa-solid fa-circle-chevron-left"></i></button>

      <div class="main-accordion">
        <button class="btn selectmap" onclick="select()">
          <?php echo isset($_POST['selectedValue']) ? $_POST['selectedValue'] : "Select"; ?>
        </button>

        <div class="accordion" id="accordionExample">
          <?php
          // Fetch data for each accordion section and populate them
          $sections = array('Information', 'Geography', 'Population', 'Food', 'Trivia');
          if(isset($_POST['selectedValue'])){
          $image = str_replace(' ', '_', $selectedValue);
        
          foreach ($sections as $section) {
            echo '<div class="accordion-item">';
            echo '<h2 class="accordion-header">';
            echo '<button class="accordion-button" type="button" data-bs-toggle="collapse"';
            echo 'data-bs-target="#collapse' . $section . '" aria-expanded="true" aria-controls="collapse' . $section . '">';
            echo $section;
            echo '</button>';
            echo '</h2>';
            echo '<div id="collapse' . $section . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
            echo '<div class="accordion-body">';
            echo '<ul>';
            // Display fetched data here
            switch ($section) {
              case 'Information':
                echo "<div class='accordion-image'>";
                echo "<img src='../Asset/Images/Learn/$image.jpg' alt=''>";
                echo "</div>";
                // Display information data
                if (isset($_POST['selectedValue'])) {
                  foreach ($infoData as $info) {
                    echo '<li>' . $info['information'] . '</li>';
                  }
                } else {
                  echo '<li>No Location is Selected</li>';
                }
                break;
              case 'Geography':
                // Display geography data
                if (isset($_POST['selectedValue'])) {
                  foreach ($geoData as $geo) {
                    echo '<li>' . $geo['geography_info'] . '</li>';
                  }
                } else {
                  echo '<li>No Location is Selected</li>';
                }
                break;
              case 'Population':
                // Display population data
                if (isset($_POST['selectedValue'])) {
                  foreach ($popData as $pop) {
                    echo '<li>' . $pop['population_count'] . '</li>';
                  }
                } else {
                  echo '<li>No Location is Selected</li>';
                }
                break;
              case 'Food':
                // Display food data
                if (isset($_POST['selectedValue'])) {
                  foreach ($foodData as $food) {
                    echo '<li>' . $food['food_name'] . '</li>';
                  }
                } else {
                  echo '<li>No Location is Selected</li>';
                }
                break;
              case 'Trivia':
                // Display trivia data
                if (isset($_POST['selectedValue'])) {
                  foreach ($triviaData as $trivia) {
                    echo '<li>' . $trivia['trivia_info'] . '</li>';
                  }
                } else {
                  echo '<li>No Location is Selected</li>';
                }
                break;
              default:
                echo '<li>No Location is Selected</li>';
                break;
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
          ?>
        </div>

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
        <?php include ('../Map/svg-map.php'); ?>
      </div>
    </div>
  </div>

  <script src="../_Bootstrap/js/bootstrap.min.js"></script>
  <script src="../Script/script.js"></script>
  <script src="../Script/mapnavi.js"></script>
  <script src="../Script/fitmap.js"></script>

  <?php
  if (isset($_POST['selectedValue'])) {
    echo '<script>setTimeout(function() { highlight("' . $_POST['selectedValue'] . '"); }, 0.1);</script>';
  }

  $pdo = null;
  ?>
</body>

</html>