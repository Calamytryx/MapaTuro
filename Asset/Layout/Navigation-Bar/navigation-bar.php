<?php
    session_start(); // Start the session

    // Check if $_SESSION['username'] is set
    if(isset($_SESSION['username'])) {
        $loggedIn = true;
    } else {
        $loggedIn = false;
    }
?>

<nav class="navbar navbar-expand-lg px-md-5">
    <div class="container-fluid">
        <div class="logo">
            <a class="navbar-brand"><img src="Asset/Images/logo.png" alt="Logo"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item px-2 mx-3 ">
                  <?php 
                  if(isset($_SESSION['username'])){
                  echo '<p class="nav-link">' . $_SESSION['username'] . '</p>'; 
                  }
                  ?>
                </li>
                <li class="nav-item px-2 mx-3 ">
                    <a class="nav-link" href="about-us-page.php">ABOUT US</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-2 mx-3 dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">LANGUAGE <span id="selected-language">EN</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('EN')">ENGLISH</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('FIL')">FILIPINO</a></li>
                    </ul>
                </li>
                <?php if (!$loggedIn) { ?>
                    <li class="nav-item px-2 mx-3 ">
                        <a class="nav-link" href="Accounts/Register">SIGN IN</a>
                    </li>
                    <li class="nav-item px-2 mx-3 ">
                        <a class="nav-link" href="Accounts/Login">LOG IN</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item px-2 mx-3 ">
                        <a class="nav-link" href="Accounts/Logout">LOG OUT</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
