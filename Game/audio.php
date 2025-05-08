<script>
    const poolSize = 10;
    const relativePath = '<?php echo $relativePath ?>';
    const click = createAudioPool(relativePath + 'Asset/Audio/click-button.mp3', poolSize);
    const correct = createAudioPool(relativePath + 'Asset/Audio/correct-answer.mp3', poolSize);
    const wrong = createAudioPool(relativePath + 'Asset/Audio/wrong-answer.mp3', poolSize);
    const fail = createAudioPool(relativePath + 'Asset/Audio/question-fail.mp3', poolSize);
    const complete = createAudioPool(relativePath + 'Asset/Audio/game-complete.mp3', poolSize);

    // Function to create a pool of Audio instances for a given sound
    function createAudioPool(src, poolSize) {
        const pool = [];
        for (let i = 0; i < poolSize; i++) {
            pool.push(new Audio(src));
        }
        return pool;
    }
    // Function to play a sound from the pool
    function playsoundfromPool(pool) {
        const availableSound = pool.find(sound => sound.paused || sound.ended);
        if (availableSound) {
            availableSound.play();
        }
        else {
            // If all instances are in use, create a new one and play it
            const newSound = new Audio(pool[0].src);
            newSound.play();
        }
    }

    // Initialize the volume state based on the stored value in localStorage
    let isVolumeOn = localStorage.getItem("isVolumeOn") === "true";
    // updateVolume();

    // function toggleVolume() {
    //     // Toggle the volume state
    //     isVolumeOn = !isVolumeOn;
        
    //     if(isVolumeOn) {
    //         // Play sample sound when turning audio on
    //         playsoundfromPool(correct);
    //     }

    //     updateVolume();
    // }

    // function updateVolume() {
    //     // Store the volume state in localStorage
    //     localStorage.setItem("isVolumeOn", isVolumeOn);

    //     // Get all audio pools and update their volumes
    //     const allPools = [click, correct, wrong, fail, complete];

    //     allPools.forEach((pool) => {
    //         pool.forEach((audio) => {
    //             audio.volume = isVolumeOn ? 1.0 : 0.0;
    //         });
    //     });

    //     // Update the volume icon based on the current state
    //     const volumeIcon = document.getElementById("volume-icon");
    //     if (volumeIcon != null) {
    //         volumeIcon.className = isVolumeOn ? "fa-solid fa-volume-high" : "fa-solid fa-volume-off";
    //     }

    //     const volumeButton = document.getElementById("volume-button");
    //     if (volumeButton != null) {
    //         volumeButton.className = isVolumeOn ? "btn volume-high-button" : "btn volume-off-button";
    //     }
    // }
</script>