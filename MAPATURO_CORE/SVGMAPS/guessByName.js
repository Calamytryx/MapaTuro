/*var provinces = [
    "Ilocos Norte",
    "Ilocos Sur",
    "La Union",
    "Pangasinan",
    "Isabela",
    "Quirino",
    "Nueva Vizcaya",
    "Cagayan",
    "Batanes",
    "Rizal",
    "Quezon",
    "Laguna",
    "Batangas",
    "Cavite",
    "Ifugao",
    "Kalinga",
    "Mountain Province",
    "Apayao",
    "Abra",
    "Benguet",
    "Aurora",
    "Nueva Ecija",
    "Tarlac",
    "Bulacan",
    "Bataan",
    "Zambales",
    "Pampanga",
    "Sorsogon",
    "Albay",
    "Camarines Norte",
    "Camarines Sur",
    "Catanduanes",
    "Masbate",
    "Romblon",
    "Oriental Mindoro",
    "Occidental Mindoro",
    "Marinduque",
    "Palawan",
    "Metro Manila"
]*/

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function()
{
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event)
{
    if (event.target == modal)
    {
        modal.style.display = "none";
    }
}

let svg = document.getElementById("Luzon");
let paths = svg.querySelectorAll('path');
let titles = svg.querySelectorAll('title');
let provinceNames = [];
let rightAnswers = 0;
let wrongAnswers = 0;
let currentItem = 1;
let maxTryCount = 3;
let currentTryCount = 0;

let retryBtn = document.getElementById("retry");
retryBtn.addEventListener('click', () => startNewGame());

paths.forEach(path =>
{
    var provinceName = path.getAttribute('data-name');
    provinceNames.push(provinceName);
    
    path.addEventListener('click', () => selectProvince(provinceName));
});


titles.forEach(title =>
{
    title.innerHTML = '';
});


function selectProvince(provinceName)
{
    if(provinceNames[currentItem-1] == provinceName)
    {
        rightAnswers++;
        currentTryCount = 0;
        currentItem++;
        updateVariables();
    }
    else
    {
        currentTryCount++;
    }

    if(currentTryCount >= maxTryCount)
    {
        wrongAnswers++;
        currentTryCount = 0;
        currentItem++;
        updateVariables();
    }

    if(currentItem >= provinceNames.length)
    {
        document.getElementById("score").innerHTML = rightAnswers;
        document.getElementById("items").innerHTML = provinceNames.length;
        modal.style.display = "block";
    }
}


function shuffleArray(array)
{
    for (var i = array.length - 1; i > 0; i--)
    {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}


function updateVariables()
{
    document.getElementById("province").innerHTML = provinceNames[currentItem-1];
    document.getElementById("right-answer-count").innerHTML = rightAnswers;
    document.getElementById("wrong-answer-count").innerHTML = wrongAnswers;
    document.getElementById("items-count").innerHTML = "Item " + currentItem + " of " + provinceNames.length;
}


function resetVariables()
{
    rightAnswers = 0;
    wrongAnswers = 0;
    currentItem = 1;
    currentTryCount = 0;
}

function startNewGame()
{
    modal.style.display = "none";
    resetVariables();
    shuffleArray(provinceNames);
    updateVariables();
}

startNewGame();