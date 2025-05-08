<script>
  // disabling tooltip for all provinces when hovered
  titles.forEach(title => title.innerHTML = '');

  function initialize() {
    //localStorage.clear();
    let firstGame = localStorage.getItem('firstGame') ? JSON.parse(localStorage.getItem('firstGame')) : true;
    if (firstGame) {
      document.querySelectorAll('#Philippines path').forEach((path, index) => {
          provinceBoxes[0].push([path.id, 0]);
      });
      // DON'T DELETE - FOR TESTING
      // Provinces:
      // for (let i = 0; i < 3; i++) {
      //   provinceBoxes[0].push([document.querySelectorAll('#Philippines path')[i].id, 0]);
      // }
      // Regions:
      // for (let i = 0; i < 3; i++) {
      //   regionBoxes[0].push([document.querySelectorAll('#Philippines > g > g')[i].id, 0]);
      // }
      // localStorage.setItem('province_box_0', JSON.stringify(provinceBoxes[0]));
      document.querySelectorAll('#Philippines > g > g').forEach((path, index) => {
          regionBoxes[0].push([path.id, 0]);
      });
      localStorage.setItem('province_box_0', JSON.stringify(provinceBoxes[0]));
      localStorage.setItem('region_box_0', JSON.stringify(regionBoxes[0]));
      localStorage.setItem('firstGame', JSON.stringify(firstGame = false));
    }
    clearBoxes();
    fillScopeNames();
    choicesCount = scopeNames.length >= 4 ? 4 : scopeNames.length;
    resetMap();
    startNewGame();
  }

  function clearBoxes() {
    for (let i = 0; i < 5; i++) {
      regionBoxes[i] = [];
      provinceBoxes[i] = [];
    }
  }

  function getLocalBoxes() {
    <?php if ($scopeChoice === "regions"): ?>
      for (let i = 0; i < 5; i++) {
        let parsedBox = getParsedLocal('region_box_' + i) || [];
        regionBoxes[i] = parsedBox;
      }

      for (let i = 0; i < 5; i++) {
        shuffleArray(regionBoxes[i]);
      }
    <?php else: ?>
      for (let i = 0; i < 5; i++) {
        let parsedBox = getParsedLocal('province_box_' + i) || [];
        provinceBoxes[i] = parsedBox;
      }
      
      for (let i = 0; i < 5; i++) {
        shuffleArray(provinceBoxes[i]);
      }
    <?php endif; ?>
  }

  function moveScopeToNextBox(scopeName, currBox, nextBox, boxScope) {
    if (currBox == nextBox) return;
    let currBoxContents = getParsedLocal(boxScope + "_box_" + currBox);
    let scopeIndex = currBoxContents.findIndex(item => item[0] === scopeName);
    if (scopeIndex !== -1) {
        currBoxContents.splice(scopeIndex, 1);
    }

    let nextBoxContents = getParsedLocal(boxScope + "_box_" + nextBox);
    nextBoxContents.push([scopeName, nextBox]);
    localStorage.setItem(boxScope + "_box_" + currBox, JSON.stringify(currBoxContents));
    localStorage.setItem(boxScope + "_box_" + nextBox, JSON.stringify(nextBoxContents));
  }

  function getParsedLocal(localName) {
    let storedLocal = localStorage.getItem(localName);
    return storedLocal ? JSON.parse(storedLocal) : [];
  }

  function sortScopeNameToLocalBox(scopeName, isCorrect) {
    let boxScope;
    <?php if ($scopeChoice === "regions"): ?>
      currBox = regionBoxes.findIndex(box => box.some(item => item[0] === scopeName));
      boxScope = "region";
    <?php else: ?>
      currBox = provinceBoxes.findIndex(box => box.some(item => item[0] === scopeName));
      boxScope = "province";
    <?php endif; ?>
    let nextBox = 0;

    switch (currBox) {
      case 0:
        nextBox = isCorrect ? 3 : 2;
        break;
      case 1:
        nextBox = isCorrect ? 3 : 1;
        break;
      case 2:
        nextBox = isCorrect ? 3 : 1;
        break;
      case 3:
        nextBox = isCorrect ? 4 : 2;
        break;
      case 4:
        nextBox = isCorrect ? 4 : 2;
        break;
      default:
        nextBox = 0;
    }
    
    moveScopeToNextBox(scopeName, currBox, nextBox, boxScope);
  }

  function addToLocalGuesses(guessItem) {
      let parsedGuesses = getParsedLocal('guesses');
      parsedGuesses.push(guessItem);
      let updatedSerializedGuesses = JSON.stringify(parsedGuesses);
      localStorage.setItem('guesses', updatedSerializedGuesses);
  }

  function addGuessToMetrics(scopeName, gameType, isCorrect, tryCount, timeTaken, dateTime) {
    sortScopeNameToLocalBox(scopeName, isCorrect);
  }

  function startTimer() {
    startTime = new Date();
  }

  function stopTimer() {
    // Get the current time
    let currentTime = new Date() - startTime;
    // Calculate hours, minutes, seconds, and milliseconds
    hour = Math.floor(currentTime / (60 * 60 * 1000));
    minute = Math.floor((currentTime % (60 * 60 * 1000)) / (60 * 1000));
    second = Math.floor((currentTime % (60 * 1000)) / 1000);
    count = currentTime % 1000;
    // Format values with leading zeros if needed
    hrString = hour < 10 ? '0' + hour : hour;
    minString = minute < 10 ? '0' + minute : minute;
    secString = second < 10 ? '0' + second : second;
    countString = count < 10 ? '00' + count : count < 100 ? '0' + count : count;
    // Update accurate time for result
    finalTime = `${hrString}:${minString}:${secString}:${countString}`;
    return finalTime;
  }

  // Array of province names to iterate in a random order for every game
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      let j = Math.floor(Math.random() * (i + 1));
      let temp = array[i];
      array[i] = array[j];
      array[j] = temp;
    }
  }

  function fillScopeNames() {
    <?php if ($scopeChoice === "regions"): ?>
      gTags.forEach(gTag => {
        let scopeName = gTag.getAttribute('id');
        for (let i = 0; i < 5; i++) {
          let parsedBox = getParsedLocal('region_box_' + i) || [];
          parsedBox.forEach(item => {
            if(item[0] === scopeName) {
              regionBoxes[item[1]].push(item);
            }
          });
        }
      });
      for (let i = 0; i < 5; i++) {
        shuffleArray(regionBoxes[i]);
      }
      scopeNames = [].concat(...regionBoxes.map(box => box.map(item => item[0])));
    <?php else: ?>
      paths.forEach(path => {
        let scopeName = path.getAttribute('id');
        for (let i = 0; i < 5; i++) {
          let parsedBox = getParsedLocal('province_box_' + i) || [];
          parsedBox.forEach(item => {
            if(item[0] === scopeName) {
              provinceBoxes[item[1]].push(item);
            }
          });
        }
      });
      for (let i = 0; i < 5; i++) {
        shuffleArray(provinceBoxes[i]);
      }
      scopeNames = [].concat(...provinceBoxes.map(box => box.map(item => item[0])));
    <?php endif; ?>
  }

  function setMapEnabled(isEnabled) {
    <?php if ($scopeChoice === "regions"): ?>
      remainingScopeNames.forEach(scopeName => {
        const gArray = Array.from(gTags);
        const gIndex = gArray.findIndex(g => g.id === scopeName);
        if (gIndex !== -1) { // Ensure gIndex is valid
          gTags[gIndex].style.pointerEvents = isEnabled ? 'auto' : 'none';
        } else {
          console.log(`Element with id ${scopeName} not found.`);
        }
      });
    <?php else: ?>
      remainingScopeNames.forEach(scopeName => {
        const pathArray = Array.from(paths);
        const pathIndex = pathArray.findIndex(path => path.id === scopeName);
        if (pathIndex !== -1) { // Ensure pathIndex is valid
          paths[pathIndex].style.pointerEvents = isEnabled ? 'auto' : 'none';
        } else {
          console.log(`Element with id ${scopeName} not found.`);
        }
      });
    <?php endif; ?>
  }

  function removeFromRemainingScope(scopeName) {
    const index = remainingScopeNames.indexOf(scopeName);
    if (index > -1) { // only splice array when item is found
      remainingScopeNames.splice(index, 1); // 2nd parameter means remove one item only
    }
  }

  function resetMap() {
    <?php if ($scopeChoice === "regions"): ?>
      gTags.forEach(gTag => {
        gTag.classList = [];
        gTag.style.pointerEvents = 'auto';
      });
    <?php else: ?>
      paths.forEach(path => {
        path.classList = [];
        path.style.pointerEvents = 'auto';
      });
    <?php endif; ?>
  }

  function spawnRedX(event) {
    // Check if the event is undefined, and if so, create a default event object
    event = event || window.event || { clientX: 0, clientY: 0 };

    // Get cursor coordinates
    let x = event.clientX || 0; // Default to 0 if not provided
    let y = event.clientY || 0;

    // Create an image element
    let redX = new Image();

    // Set the source and handle the onload event
    redX.onload = function () {
      redX.style.position = 'absolute';
      redX.style.left = x - (redX.width / 2) + 'px';
      redX.style.top = y - (redX.height / 2) + 'px';

      // Append the image to the map container
      gameContainer.appendChild(redX);

      // Add the reference to the array
      redXImages.push(redX);

      // Set a timeout to remove the image after a few seconds
      setTimeout(function () {
        // Apply fade-out animation
        fadeOut(redX, fadeDuration, function () {
          redX.remove();
          // Remove the reference from the array
          redXImages.splice(redXImages.indexOf(redX), 1);
        });
      }, spawnDuration); // Adjust the duration as needed
    };

    // Set the image source
    redX.src = '../Asset/Images/small-red-x-2.png'; // Replace with your image path
  }

  // Function to clear all red X images
  function clearRedXImages() {
    redXImages.forEach(function (redX) {
      // Apply fade-out animation before removing
      fadeOut(redX, fadeDuration, function () {
        redX.remove();
      });
    });
    // Clear the array
    redXImages = [];
  }

  // Function to animate fade-in
  function fadeIn(element, spawnDuration) {
    element.style.transition = 'opacity ' + spawnDuration + 'ms';
    requestAnimationFrame(function () {
      element.style.opacity = 1;
    });
  }

  // Function to animate fade-out
  function fadeOut(element, spawnDuration, callback) {
    element.style.transition = 'opacity ' + spawnDuration + 'ms';
    element.style.opacity = 0;
    setTimeout(callback, spawnDuration);
  }

  function endGame(gameType) {
    showCompliment("finish");
  }
  const fitPathIntoView = (path) => {
    if(path == "Philippines"){
      return
    }
    const pathquery = svg.querySelector('#' + path);
    const pathBoundingBox = pathquery.getBBox();
    const padding = 300; // Adjust the padding value as needed
    
    // Calculate the aspect ratio of the container and the path
    const containerAspectRatio = containerMap.clientWidth / containerMap.clientHeight;
    const pathAspectRatio = pathBoundingBox.width / pathBoundingBox.height;

    // Calculate the viewBox dimensions based on the aspect ratio
    let viewBoxWidth, viewBoxHeight;
    if (containerAspectRatio > pathAspectRatio) {
        // Container is wider, so fit the height of the path to the container height
        viewBoxHeight = pathBoundingBox.height + 2 * padding;
        viewBoxWidth = viewBoxHeight * containerAspectRatio;
    } else {
        // Container is taller, so fit the width of the path to the container width
        viewBoxWidth = pathBoundingBox.width + 2 * padding;
        viewBoxHeight = viewBoxWidth / containerAspectRatio;
    }

    // Calculate the viewBox position to center the path
    const viewBoxX = pathBoundingBox.x - (viewBoxWidth - pathBoundingBox.width) / 2;
    const viewBoxY = pathBoundingBox.y - (viewBoxHeight - pathBoundingBox.height) / 2;

    // Set the new viewBox for the SVG
    svg.setAttribute('viewBox', `${viewBoxX} ${viewBoxY} ${viewBoxWidth} ${viewBoxHeight}`);
};
</script>