<nav class="navbar navbar-expand-lg px-lg-3 px-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="Pictures/nav_logo_color.png" alt="Logo"></a>
        <ul class="navbar-nav">
            <li class="nav-item mx-2 px-2">
                <a class="nav-link p-2" aria-disabled="true">ABOUT US</a>
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2 px-2 dropdown">
                    <a class="nav-link p-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        LANGUAGE <span id="selected-language">EN</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('EN')">ENGLISH</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('FIL')">FILIPINO</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-2 px-2">
                    <a class="nav-link p-2" aria-disabled="true">SIGN IN</a>
                </li>
                <li class="nav-item mx-2 px-2">
                    <a class="nav-link p-2" aria-disabled="true">LOG IN</a>
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