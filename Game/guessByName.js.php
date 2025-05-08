<script>
  // Visual cue for wrong guesses
  let gameContainer = document.getElementsByClassName('game-container')[0];

  // creating onclick events for each path
  <?php if ($scopeChoice === "regions"): ?>
    gTags.forEach(gTag => {
      let scopeName = gTag.getAttribute('id')
      gTag.addEventListener('click', () => selectScope(scopeName))
    });
  <?php else: ?>
    paths.forEach(path => {
      let scopeName = path.getAttribute('id')
      path.addEventListener('click', () => selectScope(scopeName))
    });
  <?php endif; ?>

  // called when user clicks on a clickable path
  function selectScope(scopeName) {
    playsoundfromPool(click);  //play audio
    clearRedXImages();  //remove all spawned red x images if any
    let scope;
    // if the name in the question matches with the path clicked
    if (scopeNames[currentItem - 1] == scopeName) {
      addGuessToMetrics(scopeNames[currentItem - 1], 'name', true, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
      playsoundfromPool(correct);  //play audio
      // gets the path in question
      scope = document.getElementById(scopeName);
      // gives different classes used in css depending on number of tries
      <?php if ($scopeChoice === "regions"): ?>
        // Loop through each child element of the <g> tag
        scope.childNodes.forEach(child => {
            // Check if the child is a <path> element
            if (child.tagName === 'path') {
                // Add classes based on the currentTryCount
                if (currentTryCount === 0) {
                    child.classList.add('first-guess');
                } else if (currentTryCount === 1) {
                    child.classList.add('second-guess');
                } else if (currentTryCount === 2) {
                    child.classList.add('third-guess');
                }
            }
        });
      <?php else: ?>
        if (currentTryCount == 0) {
          scope.classList.add('first-guess');
        }
        else if (currentTryCount == 1) {
          scope.classList.add('second-guess');
        }
        else if (currentTryCount == 2) {
          scope.classList.add('third-guess');
        }
      <?php endif; ?>

      // disable interaction on the clicked path after guessing right or after 3 incorrect guesses
      scope.style.pointerEvents = 'none';
      scope.removeAttribute('onclick');
      score++;
      currentTryCount = 0;
      currentItem++;
      showCompliment("success");
    }
    // If user guessed wrong
    else {
      spawnRedX();
      currentTryCount++;
      
      // After a number of incorrect guesses, disable and color the correct path
      if (currentTryCount >= maxTryCount) {
        addGuessToMetrics(scopeNames[currentItem - 1], 'name', false, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
        playsoundfromPool(fail);  //play audio
        let scope = document.querySelector('[id="' + scopeNames[currentItem - 1] + '"]');
        <?php if ($scopeChoice === "regions"): ?>
          // Loop through each child element of the <g> tag
          scope.childNodes.forEach(child => {
            // Check if the child is a <path> element
            if (child.tagName === 'path') {
              child.style.pointerEvents = 'none';
              child.removeAttribute('onclick');
              child.classList.add('fourth-guess');
            }
          });
        <?php else: ?>
          scope.style.pointerEvents = 'none';
          scope.removeAttribute('onclick');
          scope.classList.add('fourth-guess');
        <?php endif; ?>
        currentTryCount = 0;
        currentItem++;
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
      clearRedXImages();  //remove all spawned red x images if any
      endGame('name');
    }
    // Otherwise, just update necessary variables for the next question
    else {
      updateLabels();
    }
  }
  
  function updateLabels() {
    // Replace dashes with spaces in the displayed scope name
    let formattedScopeName;
    if(scopeNames[currentItem - 1] == "Tawi-Tawi") formattedScopeName = scopeNames[currentItem - 1];
    else formattedScopeName = scopeNames[currentItem - 1].replace(/-/g, " ");
    document.getElementById('scope').innerHTML = formattedScopeName;
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
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('item-count').innerHTML = scopeNames.length;
    document.getElementById('icount').innerHTML = scopeNames.length;
    closeModal('compliment_modal');
    resetVariables();
    updateLabels();
    startTimer();
  }

</script>