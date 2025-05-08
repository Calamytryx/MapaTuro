<script>
  <?php if ($scopeChoice === "regions"): ?>
    let selector;
    <?php if ($mapChoice === "Philippines"): ?>
      selector = "#Philippines > g > g";
    <?php else: ?>
      selector = "#<?php echo $mapChoice ?> > g";
    <?php endif; ?>
    const gTags = svg.querySelectorAll(selector);
  <?php else: ?>
    let formattedName = '<?php echo $mapChoice ?>'.replace(/ /g, '-');
    const paths = svg.querySelectorAll("#" + formattedName + " path");
  <?php endif; ?>
  const titles = svg.querySelectorAll('title');
  let scopeNames = [];
  let remainingScopeNames = [];
  let score = 0;
  let currentItem = 1;
  const maxTryCount = 3;
  let currentTryCount = 0;
  let startTime;
  let provinceBoxes = [[], [], [], [], []];
  let regionBoxes = [[], [], [], [], []];
  let guesses = [];
  let firstGame = true;
  let spawnDuration = 500;
  let fadeDuration = 250;
  let redXImages = []; // Array to store references to red X images
  let mapChoicePick = '<?php echo $mapChoice; ?>';
  let choicesCount

  class Guess {
    constructor(scopeName, gameType, isCorrect, tryCount, timeTaken, dateTime) {
      this.scopeName = scopeName;
      this.gameType = gameType;
      this.isCorrect = isCorrect;
      this.tryCount = tryCount;
      this.timeTaken = timeTaken;
      this.dateTime = dateTime;
    }
  }

</script>