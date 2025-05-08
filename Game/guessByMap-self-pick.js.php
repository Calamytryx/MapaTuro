<script>
  const choicesButtons = document.getElementById('choices-buttons');
  let scopeNamesCopy = [];
  let currentSelectedScope;

  // creating onclick events for each path
  <?php if ($scopeChoice === "regions"): ?>
    gTags.forEach(gTag => {
      let scopeName = gTag.getAttribute('id');
      scopeNamesCopy.push(scopeName);
      gTag.addEventListener('click', function() {
        selectScope(scopeName);
      });
    });
  <?php else: ?>
    paths.forEach(path => {
      let scopeName = path.getAttribute('id');
      scopeNamesCopy.push(scopeName);
      path.addEventListener('click', function() {
        selectScope(scopeName);
      });
    });
  <?php endif; ?>
  remainingScopeNames = Array.from(scopeNamesCopy);

  function nextQuestion() {
    currentItem++;
    document.getElementById('prompt').innerHTML = "Click on a location on the map";
    document.getElementById('question').innerHTML = "";
    resetState();
  }

  function selectScope(scopeName) {
    resetState();
    if(currentSelectedScope != null) {
      const scope = document.querySelector(
        '[id="' + currentSelectedScope + '"]'
      )
      <?php if ($scopeChoice === "regions"): ?>
        // Loop through each child element of the <g> tag
        scope.childNodes.forEach(child => {
          // Check if the child is a <path> element
          if (child.tagName === 'path') {
            child.classList.remove('highlighted');
          }
      });
      <?php else: ?>
        scope.classList.remove('highlighted');
      <?php endif; ?>
    }

    setMapEnabled(false);

    currentSelectedScope = scopeName;
    document.getElementById('prompt').innerHTML = "";
    document.getElementById('question').innerHTML = "What is the name of the highlighted province?";
    highlightScope();
    generateChoices();
    startTimer();
  }

  function selectChoice(e) {
    playsoundfromPool(click);  //play audio
    const scope = document.querySelector(
      '[id="' + currentSelectedScope + '"]'
    )
    const button = e.target;
    // Replace dashes with spaces in the displayed scope name
    let formattedScopeName;
    if(currentSelectedScope == "Tawi-Tawi") formattedScopeName = currentSelectedScope;
    else formattedScopeName = currentSelectedScope.replace(/-/g, " ");

    if (button.innerHTML == formattedScopeName) {
      removeFromRemainingScope(currentSelectedScope);
      addGuessToMetrics(currentSelectedScope, 'map', true, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
      playsoundfromPool(correct);  //play audio
      scope.style.pointerEvents = 'none';
      button.classList.add('correct-answer');
      // gives different classes used in css depending on number of tries
      <?php if ($scopeChoice === "regions"): ?>
        // Loop through each child element of the <g> tag
        scope.childNodes.forEach(child => {
          // Check if the child is a <path> element
          if (child.tagName === 'path') {
            child.classList.remove('highlighted');
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
        scope.classList.remove('highlighted');
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
      score++;
      // Display results modal if all items have been answered, ending the quiz
      if (currentItem >= scopeNames.length) {
        document.getElementById('fcount').innerHTML = score;
        document.getElementById('current-item-count').innerHTML = scopeNames.length;
        endGame('map');
      }
      else {
        setMapEnabled(true);
        showCompliment("success");
        nextQuestion();
      }
      currentTryCount = 0;
    }
    else {
      button.classList.add('wrong-answer');
      currentTryCount++;
      
      // After a number of incorrect guesses, color the correct answer and wrong scope
      if (currentTryCount >= maxTryCount) {
        removeFromRemainingScope(currentSelectedScope);
        addGuessToMetrics(currentSelectedScope, 'map', false, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
        playsoundfromPool(fail);  //play audio
        const correctChoice = document.getElementById('correct');
        correctChoice.classList.add('correct-answer');
        correctChoice.style.pointerEvents = 'none';
        correctChoice.removeAttribute('onclick');
        <?php if ($scopeChoice === "regions"): ?>
          // Loop through each child element of the <g> tag
          scope.childNodes.forEach(child => {
            // Check if the child is a <path> element
            if (child.tagName === 'path') {
              child.classList.remove('highlighted');
              child.classList.add('fourth-guess');
            }
          });
        <?php else: ?>
          scope.classList.remove('highlighted');
          scope.classList.add('fourth-guess');
        <?php endif; ?>
        currentTryCount = 0;
        setMapEnabled(true);
        showCompliment("failed");
        nextQuestion();
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
      document.getElementById('current-item-count').innerHTML = scopeNames.length;
      document.querySelectorAll('.choice-button').forEach(button => {
        button.style.pointerEvents = "none";
      });
      endGame('map');
    }
    else {
      updateLabels();
    }
    // Disable choice button
    button.style.pointerEvents = 'none';
    button.removeAttribute('onclick');
  }

  function highlightScope() {
    let scope = document.querySelector(
      '[id="' + currentSelectedScope + '"]'
      );
    <?php if ($scopeChoice === "regions"): ?>
      // Loop through each child element of the <g> tag
      scope.childNodes.forEach(child => {
        // Check if the child is a <path> element
        if (child.tagName === 'path') {
          child.classList.add('highlighted');
        }
      });
    <?php else: ?>
    scope.classList.add('highlighted');
    <?php endif; ?>
  }

  // Place the correct scope name and 3 random incorrect ones to choices
  function generateChoices() {
    const array = [];
    array.push(currentSelectedScope);
    const indexToRemove = scopeNamesCopy.indexOf(currentSelectedScope);
    if (indexToRemove !== -1) {
      scopeNamesCopy.splice(indexToRemove, 1);
    }
    else alert ("Missing scope!");
    for (let i = 0; i < choicesCount - 1; i++) {
      let j = Math.floor(Math.random() * scopeNamesCopy.length);
      array.push(scopeNamesCopy[j]);
      scopeNamesCopy.splice(j, 1);
    }
    shuffleArray(array);
    array.forEach(name => {
      const button = document.createElement('button');
      // adds an indicator to the correct answer for easier searching later
      if (name == currentSelectedScope) {
        button.id = 'correct';
      }
      button.innerHTML = name.replace(/-/g, ' ');
      button.classList.add('choice-button');
      choicesButtons.appendChild(button);
      button.addEventListener('click', selectChoice);
      scopeNamesCopy.push(name);
    })
  }

  function updateLabels() {
    document.getElementById('scount').innerHTML = score;
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('current-item-count').innerHTML = currentItem;
  }

  function resetGame() {
    score = 0;
    currentTryCount = 0;
    <?php if ($scopeChoice === "regions"): ?>
      gTags.forEach(gTag => {
        gTags.classList = [];
      });
    <?php else: ?>
      paths.forEach(path => {
        path.classList = [];
      });
    <?php endif; ?>
    resetState();
  }

  //Called to reset state of quiz panel after each question
  function resetState() {
    // svg.setAttribute('viewBox', defaultViewBox);

    updateLabels();
    // generate new choices
    while (choicesButtons.firstChild) {
      choicesButtons.removeChild(choicesButtons.firstChild);
    }
  }

  function startNewGame() {
    document.getElementById('prompt').innerHTML = "Click on a location on the map";
    document.getElementById('location').innerHTML = mapChoicePick;
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('item-count').innerHTML = scopeNames.length;
    document.getElementById('icount').innerHTML = scopeNames.length;
    closeModal('compliment_modal');
    resetGame();
  }
  
</script>