<div class="compliment container" id="compliment_modal">
    <div class="compliment-wrapper">
        <button class="btn close-button" onclick="confettiStop()" id='close-button'><i class="fa-solid fa-xmark"></i></button>
        <div class="compliment-content">
            <img src="../Asset/Images/Mascot/boy.png" alt="" id="boy">

            <i class="fa-solid fa-star" id="star"></i>
            <i class="fa-regular fa-circle-check" id="check"></i>
            <i class="fa-regular fa-circle-xmark" id="cross"></i>

            <div class="">
                <h1 id="compliment">Awesome!</h1>
                <p id="compliment-text">You already have <span id="scount"></span> correct answers</p>
                <p id="finish-text">You have <span id="fcount"></span> out of <span id="icount"></span> correct answers</p>
            </div>

            <button class="btn btn-primary" onclick="confettiStop()" id="button-compliment">Keep it up!</button>
            <div class="result-button-choices" id="result-button-choices">
                <button class="btn btn-primary" onclick="navigateTo('../')" id="quit">Quit</button>
                <button class="btn btn-primary" onclick="window.location.reload();" id="retry">Retry</button>
            </div>

            <img src="../Asset/Images/Mascot/boygo.png" alt="" id="boygo">
            <img src="../Asset/Images/Mascot/boytuwa.png" alt="" id="boytuwa">
            <img src="../Asset/Images/Mascot/boymagnify.png" alt="" id="boymagnify">
            <img src="../Asset/Images/Mascot/boysad.png" alt="" id="boysad">
            
        </div>
    </div>
</div>