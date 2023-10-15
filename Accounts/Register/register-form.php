<div class="container-fluid register-modal" id="register-modal">
    <div class="register-modal-wrapper border d-flex align-items-center justify-content-center" id="register-modal-wrapper">
        <div class="close-button border">
            <a onclick="closeRegistrationModal()"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="register-form border container p-lg-5 p-md-3 p-1" id="registration-form">
            <h1>Sign Up Now</h1>
            <p>Fill up the form below to gain instant access</p>
            <form action="Includes/register.inc.php" method="post">
                <div class="row g-3 my-3">
                    <div class="col-md-6 col-12">
                        <label for="register-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="register-username" name="register-username"
                            placeholder="Username">
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="register-age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="register-age" name="register-age" placeholder="Age">
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="register-gender" class="form-label">Gender</label>
                        <select name="register-gender" id="register-gender" class="form-select">
                            <option selected >Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Others</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="register-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="register-email" name="register-email"
                            placeholder="Email Address">
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="register-password" class="form-label">Your Password</label>
                        <input type="password" class="form-control" id="register-password" name="register-password"
                            placeholder="Password">
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="register-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="register-password1" name="register-password1"
                            placeholder="Password">
                    </div>
                    <div class="col-12 py-3 text-center">
                        <p>By clicking on "Register" button, you confirm that you accept the <a href="">Terms of
                                Use</a>.</p>
                        <div class="register-container py-1">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <p>Already have an account? <a href="../Login/">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function closeRegistrationModal() {
    const regForm = document.getElementById('register-modal');
    regForm.style.display = "none";
    window.location.replace("../../");
}
</script>