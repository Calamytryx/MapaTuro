<!-- Register Form -->
<div class="regforms-container" id="regforms-container">
    <div class="regform-wrapper d-flex align-items-center justify-content-center">
        <div class="close-button" id="close-button">
            <i class="fa-solid fa-xmark" onclick="closeRegform()"></i>
        </div>
        <div class="registration-form" id="registration-form">
            <h1 class="text-center p-3">Register</h1>
            <form class="row px-lg-5 p-3 g-3" action="includes/register.inc.php" method="post">
                <div class="col-md-4">
                    <label for="register-fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="register-fname" name="register-fname" placeholder="First Name">
                </div>
                <div class="col-md-4">
                    <label for="register-lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="register-lname" name="register-lname" placeholder="Last Name">
                </div>
                <div class="col-md-4">
                    <label for="register-username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="register-username" name="register-username" placeholder="Username">
                </div>
                <div class="col-md-4">
                    <label for="register-email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="register-email" name="register-email" placeholder="Email Address">
                </div>
                <div class="col-md-4">
                    <label for="register-gender" class="form-label">Gender</label>
                    <select id="register-gender" class="form-select">
                        <option selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="register-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="register-password" name="register-password" placeholder="Password">
                </div>
                <div class="col-12">
                    <label for="register-profile" class="form-label">User Profile</label>
                    <input class="form-control" type="file" id="register-profile" name="register-profile">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            I agree to Terms & Conditions
                        </label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Login Form -->
<div class="logforms-container" id="logforms-container">
    <div class="logform-wrapper d-flex align-items-center justify-content-center">
        <div class="close-button" id="close-button">
            <i class="fa-solid fa-xmark" onclick="closeRegform()"></i>
        </div>
        <div class="login-form" id="login-form">
            <h1 class="text-center p-3">Log In</h1>
            <form class="row px-lg-5 p-3 g-3">
                <div class="col-md-12">
                    <label for="login-email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="login-email" placeholder="Email Address">
                </div>
                <div class="col-md-12">
                    <label for="login-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="Password">
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- About Us -->
<div class="aboutus-container" id="aboutus-container">
    <div class="aboutus-wrapper d-flex align-items-center justify-content-center">
        <div class="close-button" id="close-button">
            <i class="fa-solid fa-xmark" onclick="closeRegform()"></i>
        </div>
        <div class="aboutus" id="aboutus">
            <h1>This is MAPATURO</h1>
        </div>
    </div>
</div>

<script>
    function closeRegform() {
        const regform = document.getElementById("regforms-container");
        const logform = document.getElementById("logforms-container");
        const about = document.getElementById("aboutus-container");
        regform.style.display = "none";
        logform.style.display = "none";
        about.style.display = "none";
    }
</script>