const gameModal = document.getElementById("game_modal");
const mapList = document.getElementById("maplist_modal");
const btnInLabel = document.getElementById('btnlbl-in');
const btnOutLabel = document.getElementById('btnlbl-out');
const btnResetLabel = document.getElementById('btnlbl-reset');

function navigateTo(url) {
  window.location.href = url;
}

function toggleVolume() {
  var volumeHighIcon = document.getElementById('volume-high');
  var volumeOffIcon = document.getElementById('volume-off');
  confetti();

  if (volumeHighIcon.style.display !== 'none') {
    volumeHighIcon.style.display = 'none';
    volumeOffIcon.style.display = 'inline-block';
  } else {
    volumeHighIcon.style.display = 'inline-block';
    volumeOffIcon.style.display = 'none';
  }
}

function play() {
  gameModal.style.display = "grid";

  const scopeProvinces = document.querySelector('#scope-provinces');
  const typeMap = document.querySelector('#type-name');
  const modeAdaptive = document.querySelector('#mode-adaptive');
  
  scopeProvinces.classList.add('selected');
  typeMap.classList.add('selected');
  modeAdaptive.classList.add('selected');

  document.getElementById('scopeChoice').value = 'provinces';
  document.getElementById('typeChoice').value = 'name';
  document.getElementById('modeChoice').value = 'adaptive';
}

function select() {
  mapList.style.display = "grid";
  resetModalChoices();
}

function resetModalChoices() {
  // Check if scopeChoice exists
  if (document.getElementById('scopeChoice')) {
    // Execute the function as before
    document.getElementById('scopeChoice').value = '';
    document.getElementById('typeChoice').value = '';
    document.getElementById('modeChoice').value = '';
    document.getElementById('mapChoice').value = '';

    let gameModal = document.getElementById('game_modal');
    let selectedButtons = gameModal.querySelectorAll('.selected');
    selectedButtons.forEach(function (button) {
      button.classList.remove('selected');
    });

    const scopeProvinces = document.querySelector('#scope-provinces');
    const typeMap = document.querySelector('#type-name');
    const modeAdaptive = document.querySelector('#mode-adaptive');
    
    if (scopeProvinces) scopeProvinces.classList.add('selected');
    if (typeMap) typeMap.classList.add('selected');
    if (modeAdaptive) modeAdaptive.classList.add('selected');
  }
  // If scopeChoice doesn't exist, do nothing (suppress the function)
}


function closeModal(id) {
  let modal = document.getElementById(id);
  modal.style.display = "none";

  if (id === "game_modal") {
    let selectedButtons = modal.querySelectorAll('.selected');
    selectedButtons.forEach(function (button) {
      button.classList.remove('selected');
    });

    let mapChoice = document.getElementById('mapChoice');
    let scopeChoice = document.getElementById('scopeChoice');
    let typeChoice = document.getElementById('typeChoice');
    let modeChoice = document.getElementById('modeChoice');

    if (mapChoice) mapChoice.value = '';
    if (scopeChoice) scopeChoice.value = '';
    if (typeChoice) typeChoice.value = '';
    if (modeChoice) modeChoice.value = '';
  } else if (id === 'maplist_modal') {
    var formInput = document.getElementById('form-input');
    if (formInput) {
      formInput.value = '';
    }

    var form = document.getElementById('form');
    if (form) {
      form.removeEventListener('submit', handleFormSubmit);
    }
  }
}

function updateSelectMap(selectedValue) {
  const formattedSelectedValue = selectedValue.replace(/\s+/g, '-');
  const correspondingElement = document.getElementById(formattedSelectedValue);
  
  // Check if scopeChoice exists
  if (document.getElementById('scopeChoice')) {
    // Execute the function as before
    listChecker(correspondingElement);

    var form = document.getElementById('form');
    var formInput = document.getElementById('form-input');
    formInput.value = selectedValue;

    form.addEventListener('submit', handleFormSubmit);
    form.submit();
  } else {
    // Modify the function for Learn Mode
    // For Learn Mode, you may only need to submit the selected value to fetch data
    var formInput = document.getElementById('form-input');
    formInput.value = selectedValue;

    var form = document.getElementById('form');
    form.addEventListener('submit', handleFormSubmit);
    form.submit();
  }
}


function handleFormSubmit(event) {
  event.preventDefault();

  var form = event.target;
  var formData = new FormData(form);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log('AJAX request successful:', xhr.responseText);
      closeModal('maplist_modal');
    } else {
      console.error('AJAX request failed. Error code:', xhr.status);
    }
  };

  xhr.send(formData);

  form.removeEventListener('submit', handleFormSubmit);
}

function listChecker(correspondingElement) {
  const mainIslandList = document.querySelector('.main-island-list');
  const regionList = document.querySelector('.region-list');
  const provinceList = document.querySelector('.province-list');

  if (mainIslandList && regionList && provinceList) {
    const correspondingElementId = correspondingElement.getAttribute('id').replace(/-/g, ' ').trim();
    const cleanedProvinceList = provinceList.innerHTML.replace(/<[^>]+>/g, '');
    const cleanedCorrespondingElementId = correspondingElementId.toLowerCase();
    const playButton = document.querySelector('.play');

    if (cleanedProvinceList.toLowerCase().includes(cleanedCorrespondingElementId)) {
      if (playButton) {
        playButton.disabled = true;
      }
    } else if (mainIslandList.innerHTML.toLowerCase().includes(cleanedCorrespondingElementId)) {
      resetModalChoices();
    } else if (regionList.innerHTML.toLowerCase().includes(cleanedCorrespondingElementId)) {
      if (cleanedCorrespondingElementId.includes('ncr')) {
        if (playButton) {
          playButton.disabled = true;
        }
      } else {
        const scopeRegions = document.querySelector('#scope-regions');
        if (scopeRegions) {
          scopeRegions.style.display = 'none';
        }
      }
    }
  }
}

function highlight(selectedValue) {
  console.log(selectedValue);
  const formattedSelectedValue = selectedValue.replace(/\s+/g, '-');
  const correspondingElement = document.getElementById(formattedSelectedValue);
  console.log("This is: ")
  console.log(correspondingElement)

  if (correspondingElement) {
    const paths = Array.from(svg.getElementsByTagName('path'));
    const groups = Array.from(svg.getElementsByTagName('g'));
    paths.forEach(path => {
      path.removeAttribute('style');
    });
    groups.forEach(group => {
      group.removeAttribute('style');
    });

    fitPathIntoView(correspondingElement);

    correspondingElement.style.fill = '#a424ff';
    correspondingElement.style.stroke = '#fff';

    isReset = false;

    const buttonText = selectedValue ? selectedValue : "Select";
    document.querySelector('.selectmap').textContent = buttonText;

    listChecker(correspondingElement);
  }
}

function modeSelected(button) {
  var buttons = button.parentElement.querySelectorAll('.btn');
  buttons.forEach(function (btn) {
    btn.classList.remove('selected');
  });

  button.classList.add('selected');
}

function promptLabel(value) {
  const buttonLabel = value.id;

  removeLabel();

  if (buttonLabel == 'btn-in') {
    btnInLabel.style.display = "block";
  } else if (buttonLabel == 'btn-out') {
    btnOutLabel.style.display = "block";
  } else {
    btnResetLabel.style.display = "block";
  }
}

function removeLabel() {
  btnInLabel.style.display = "none";
  btnOutLabel.style.display = "none";
  btnResetLabel.style.display = "none";
}

function analyticsSelected(button) {
  var buttons = button.parentElement.querySelectorAll('.btn');
  buttons.forEach(function (btn) {
    btn.classList.remove('selected');
  });

  button.classList.add('selected');
}

function startGame() {
  var mapChoice = document.querySelector('.selectmap').textContent;
  var scopeChoice = document.querySelector('.scope .selected').value;
  var typeChoice = document.querySelector('.type .selected').value;
  var modeChoice = document.querySelector('.mode .selected').value;

  var form = document.createElement('form');
  form.method = 'POST';
  form.action = 'Game/index.php';

  var mapInput = document.createElement('input');
  mapInput.type = 'hidden';
  mapInput.name = 'mapChoice';
  mapInput.value = mapChoice;
  form.appendChild(mapInput);

  var scopeInput = document.createElement('input');
  scopeInput.type = 'hidden';
  scopeInput.name = 'scopeChoice';
  scopeInput.value = scopeChoice;
  form.appendChild(scopeInput);

  var typeInput = document.createElement('input');
  typeInput.type = 'hidden';
  typeInput.name = 'typeChoice';
  typeInput.value = typeChoice;
  form.appendChild(typeInput);

  var modeInput = document.createElement('input');
  modeInput.type = 'hidden';
  modeInput.name = 'modeChoice';
  modeInput.value = modeChoice;
  form.appendChild(modeInput);

  document.body.appendChild(form);
  form.submit();
}
