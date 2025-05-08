<script>
  // Visual cue for wrong guesses
  let gameContainer = document.getElementsByClassName('game-container')[0];
  let currentSelectedScope;
  let scopePick = document.querySelector('.scope-pick');
  let scopeId = scopePick.id;

  if (scopeId === 'regions') {
    const innermostGroups = document.querySelectorAll('#Philippines > g > g');
    innermostGroups.forEach(innermostGroup => {
      let scopeName = innermostGroup.getAttribute('id');
      scopeNames.push(scopeName);
      // innermostGroup.style.pointerEvents = 'none';
      innermostGroup.addEventListener('click', function () {
        selectScope(scopeName);
      });
    });
  } else if (scopeId === 'provinces') {
    <?php if ($scopeChoice === "regions"): ?>
      gTags.forEach(gTag => {
        let scopeName = path.getAttribute('id');
        scopeNames.push(scopeName);
        // gTag.style.pointerEvents = 'none';
        gTag.addEventListener('click', function () {
          selectScope(scopeName);
        });
      });
    <?php else: ?>
      paths.forEach(path => {
        let scopeName = path.getAttribute('id');
        scopeNames.push(scopeName);
        // path.style.pointerEvents = 'none';
        path.addEventListener('click', function () {
          selectScope(scopeName);
        });
      });
    <?php endif; ?>
  }
  remainingScopeNames = Array.from(scopeNames);

  function selectSelfPick() {
    mapList.style.display = "grid";
  }

  function selectScopeSelfPick(selectedLocation) {
    let formattedScopeName;
    formattedScopeName = selectedLocation.replace(/\s+/g, "-");
    document.querySelector('#scope').textContent = selectedLocation;

    // if (scopeId === 'provinces') {
    //   paths.forEach(path => {
    //     path.style.pointerEvents = 'auto';
    //   });
    // } else if (scopeId === 'regions') {
    //   // Adjust pointer events for innermost groups
    //   document.querySelectorAll('.map > g > g > g').forEach(innerGroup => {
    //     innerGroup.style.pointerEvents = 'auto';
    //   });
    // }

    currentSelectedScope = formattedScopeName;

    closeModal('maplist_modal');

    // Disable the button
    document.getElementById('scope').disabled = true;

    //Enable Map
    setMapEnabled(true);

    // Hide the selected location from the map list
    document.querySelectorAll('.map_list a').forEach(anchor => {
      if (anchor.textContent.trim() === selectedLocation) {
        anchor.classList.add('d-none');
        // Find the <hr> element following the anchor and hide it
        const nextElement = anchor.nextElementSibling;
        if (nextElement && nextElement.tagName.toLowerCase() === 'hr') {
          nextElement.classList.add('d-none');
        }
      }
    });
  }


  // called when user clicks on a clickable path
  function selectScope(scopeName) {
    playsoundfromPool(click);  //play audio
    clearRedXImages();  //remove all spawned red x images if any
    let scope;
    // if the name in the question matches with the path clicked
    if (currentSelectedScope == scopeName) {
      removeFromRemainingScope(scopeName);
      addGuessToMetrics(currentSelectedScope, 'name', true, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
      playsoundfromPool(correct);  //play audio
      // gets the path in question
      scope = document.getElementById(scopeName);

      if (scope.tagName.toLowerCase() === 'g') {
        // If it's a group, iterate through all paths within the group
        const pathsInGroup = scope.querySelectorAll('path');
        pathsInGroup.forEach(path => {
          // Apply styling to each path within the group
          path.classList.add('selected-scope');

          // Logic for handling different classes based on the number of tries
          switch (currentTryCount) {
            case 0:
              path.classList.add('first-guess');
              break;
            case 1:
              path.classList.add('second-guess');
              break;
            case 2:
              path.classList.add('third-guess');
              break;
            default:
              break;
          }
        });
      } else {
        // If it's not a group, add styling directly to the element
        scope.classList.add('selected-scope');

        // Logic for handling different classes based on the number of tries
        switch (currentTryCount) {
          case 0:
            scope.classList.add('first-guess');
            break;
          case 1:
            scope.classList.add('second-guess');
            break;
          case 2:
            scope.classList.add('third-guess');
            break;
          default:
            break;
        }
      }

      // disable interaction on the clicked path after guessing right or after 3 incorrect guesses
      scope.style.pointerEvents = 'none';
      scope.removeAttribute('onclick');
      score++;
      currentTryCount = 0;
      currentItem++;
      document.getElementById('scope').disabled = false;
      updateLabels();
      setMapEnabled(false);
      showCompliment("success");
    }
    // If user guessed wrong
    else {
      spawnRedX();
      currentTryCount++;
      
      // After a number of incorrect guesses, disable and color the correct path
      if (currentTryCount >= maxTryCount) {
        removeFromRemainingScope(scopeName);
        addGuessToMetrics(currentSelectedScope, 'name', false, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
        playsoundfromPool(fail);  //play audio
        let scope = document.querySelector('[id="' + currentSelectedScope + '"]');
        scope.style.pointerEvents = 'none';
        scope.removeAttribute('onclick');
        if (scope.tagName.toLowerCase() === 'g') {
          // If it's a group, iterate through all paths within the group
          const pathsInGroup = scope.querySelectorAll('path');
          pathsInGroup.forEach(path => {
            // Apply styling to each path within the group
            path.classList.add('fourth-guess');
          });
        } else {
          // If it's not a group, add styling directly to the element
          scope.classList.add('fourth-guess');
        }
        currentTryCount = 0;
        currentItem++;
        document.getElementById('scope').disabled = false;
        updateLabels();
        setMapEnabled(false);
        playsoundfromPool(fail);
        showCompliment("failed");
      }
      else {
        playsoundfromPool(wrong);  //play audio
      }
    }

    // Display results modal if all items have been answered, ending the quiz
    if (currentItem >= scopeNames.length + 1) {
      playsoundfromPool(complete);
      document.getElementById('fcount').innerHTML = score;
      document.getElementById('score-count').innerHTML = score;
      document.getElementById('current-item-count').innerHTML = scopeNames.length
      setMapEnabled(false);
      document.querySelector('.selectmap').style.pointerEvents = "none";
      clearRedXImages();  //remove all spawned red x images if any
      endGame('name');
    }
    // Otherwise, just update necessary variables for the next question
    else {
      //updateLabels();
      startTimer();
    }
  }

  function updateLabels() {
    document.querySelector('#scope').textContent = "Select";
    document.getElementById('scount').innerHTML = score;
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('current-item-count').innerHTML = currentItem;
  }

  function resetVariables() {
    score = 0;
    currentItem = 1;
    currentTryCount = 0;
  }

  function startNewGame() {
    document.getElementById('location').innerHTML = mapChoicePick;
    if(scopeNames[currentItem - 1] == "Tawi-Tawi") formattedScopeName = scopeNames[currentItem - 1];
    else formattedScopeName = scopeNames[currentItem - 1].replace(/-/g, " ");
    document.getElementById('scope').innerHTML = formattedScopeName;
    document.getElementById('scount').innerHTML = score;
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('item-count').innerHTML = scopeNames.length;
    document.getElementById('icount').innerHTML = scopeNames.length;
    closeModal('compliment_modal');
    resetVariables();
    setMapEnabled(false);
    updateLabels();
  }

</script>