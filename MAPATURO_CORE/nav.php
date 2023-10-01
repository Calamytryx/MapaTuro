<header>
    <nav class="navbar navbar-expand-lg px-lg-5 p-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="Pictures/nav_logo_color.png" alt="MAPATURO Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Language: <span id="selectedLanguage">English</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="changeLanguage('English')">English</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeLanguage('Filipino')">Filipino</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" onclick="toggleAccountsModal()">
                            <i class="fa-regular fa-circle-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<section class="accounts-hidden" id="accounts-modal">
    <div class="container-fluid" id="accounts">
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: #F5F5F5">
            <div class="close-btn text-end m-2" id="close-button-accounts">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Sign Up at<br />
                        <span class="text-primary">MAPATURO</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Create an account today to learn more about the geography and wonders of the Philippines.
                        Collect points and compete with other users with different game modes and game plays.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1" class="form-control" />
                                            <label class="form-label" for="form3Example1">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example2" class="form-control" />
                                            <label class="form-label" for="form3Example2">Last name</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                        checked />
                                    <label class="form-check-label" for="form2Example33">
                                        Remember Me
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>
                                </div>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>or sign up with:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<script>
    // Change Language Function
    function changeLanguage(language) {
        document.getElementById("selectedLanguage").textContent = language;
    }

    // Hide and Display Account Container
    function toggleAccountsModal() {
        var accountsModal = document.getElementById("accounts-modal");
        if (accountsModal.classList.contains("accounts-hidden")) {
            accountsModal.classList.remove("accounts-hidden");
            accountsModal.classList.add("accounts-visible");
        } else {
            accountsModal.classList.remove("accounts-visible");
            accountsModal.classList.add("accounts-hidden");
        }
    }

    // Close Button Function
    var closeButton = document.getElementById("close-button-accounts");
    closeButton.addEventListener("click", hideAccountsModal);

    function hideAccountsModal() {
        var accountsModal = document.getElementById("accounts-modal");
        accountsModal.classList.remove("accounts-visible");
        accountsModal.classList.add("accounts-hidden");
    }
</script>