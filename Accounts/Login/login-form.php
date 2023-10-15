<div class="container-fluid login-modal" id="login-modal">
    <div class="login-modal-wrapper border d-flex align-items-center justify-content-center" id="login-modal-wrapper">
        <div class="close-button border">
            <a onclick="closeLoginModal()"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="login-form border container p-lg-5 p-md-3 p-1" id="registration-form">
            <h1>Login</h1>
            <p>Fill up the form below to gain instant access</p>
            <form action="includes/login.inc.php" method="post">
                <div class="row g-3 my-3">
                    <div class="col-12">
                        <label for="login-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login-username" name="login-username"
                            placeholder="Username">
                    </div>
                    <div class="col-12">
                        <label for="login-password" class="form-label">Your Password</label>
                        <input type="password" class="form-control" id="login-password" name="login-password"
                            placeholder="Password">
                    </div>
                    <div class="col-12 py-3 text-center">
                        <div class="login-container py-1">
                            <button type="submit" class="btn btn-primary">login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function closeLoginModal() {
    const regForm = document.getElementById('login-modal');
    regForm.style.display = "none";
    window.location.replace("../../");
}
</script>