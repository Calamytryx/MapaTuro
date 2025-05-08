<script>
  const choicesButtons = document.getElementById('choices-buttons');
  let scopeNamesCopy = [];

  // creating onclick events for each path
  <?php if ($scopeChoice === "regions"): ?>
    gTags.forEach(gTag => {
      let scopeName = gTag.getAttribute('id');
      scopeNamesCopy.push(scopeName);
      gTag.style.pointerEvents = 'none';
    });
  <?php else: ?>
    paths.forEach(path => {
      let scopeName = path.getAttribute('id');
      scopeNamesCopy.push(scopeName);
      path.style.pointerEvents = 'none';
    });
  <?php endif; ?>
  remainingScopeNames = Array.from(scopeNames);

  function nextQuestion() {
    currentItem++;
    resetState();
  }

  function selectChoice(e) {
    playsoundfromPool(click);  //play audio
    const scope = document.querySelector(
      '[id="' + scopeNames[currentItem - 1] + '"]'
    )
    const button = e.target;
    // Replace dashes with spaces in the displayed scope name
    let formattedScopeName;
    if(scopeNames[currentItem - 1] == "Tawi-Tawi") formattedScopeName = scopeNames[currentItem - 1];
    else formattedScopeName = scopeNames[currentItem - 1].replace(/-/g, " ");

    if (button.innerHTML == formattedScopeName) {
      removeFromRemainingScope(scopeNames[currentItem - 1])
      addGuessToMetrics(scopeNames[currentItem - 1], 'map', true, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
      playsoundfromPool(correct);  //play audio
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
        removeFromRemainingScope(scopeNames[currentItem - 1]);
        addGuessToMetrics(scopeNames[currentItem - 1], 'map', false, currentTryCount, stopTimer(), new Date(Date.now()).toLocaleString());
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
    let hyphenedScope = scopeNames[currentItem - 1];
    let scope = document.querySelector(
      '[id="' + hyphenedScope + '"]'
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
    array.push(scopeNames[currentItem - 1]);
    scopeNamesCopy.splice(
      scopeNamesCopy.indexOf(scopeNames[currentItem - 1]),
      1
    );
    for (let i = 0; i < choicesCount - 1; i++) {
      let j = Math.floor(Math.random() * scopeNamesCopy.length);
      array.push(scopeNamesCopy[j]);
      scopeNamesCopy.splice(j, 1);
    }
    shuffleArray(array);
    array.forEach(name => {
      const button = document.createElement('button');
      button.innerHTML = name.replace(/-/g, ' ');
      button.classList.add('choice-button');
      // adds an indicator to the correct answer for easier searching later
      if (name == scopeNames[currentItem - 1]) {
        button.id = 'correct';
      }
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
    currentItem = 1;
    currentTryCount = 0;
    <?php if ($scopeChoice === "regions"): ?>
      gTags.forEach(gTag => {
        gTag.classList = [];
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
    highlightScope();
    // generate new choices
    while (choicesButtons.firstChild) {
      choicesButtons.removeChild(choicesButtons.firstChild);
    }
    generateChoices();
  }

  function startNewGame() {
    document.getElementById('question').innerHTML = "What is the name of the highlighted province?";
    document.getElementById('location').innerHTML = mapChoicePick;
    document.getElementById('score-count').innerHTML = score;
    document.getElementById('item-count').innerHTML = scopeNames.length;
    document.getElementById('icount').innerHTML = scopeNames.length;
    closeModal('compliment_modal');
    resetGame();
    startTimer();
  }
  
</script>