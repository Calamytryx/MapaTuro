<nav class="navbar navbar-expand-lg px-md-5">
    <div class="container-fluid">
        <div class="logo">
            <a class="navbar-brand"><img src="../../Asset/Images/logo.png" alt="Logo"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
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
                <li class="nav-item px-2 mx-3 ">
                    <a class="nav-link" href="Register/register-page.php">SIGN IN</a>
                </li>
                <li class="nav-item px-2 mx-3 ">
                    <a class="nav-link" href="Register/login-page.php">LOG IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function changeLanguage(languageCode) {
        var languageText = (languageCode === 'EN') ? 'EN' : 'FIL';
        document.getElementById('selected-language').textContent = languageText;
    }
</script>