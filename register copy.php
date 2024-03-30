<!DOCTYPE html>
<html lang="en">
    <?php
        include "inc/head.inc.php";
    ?>
    <body>
        <?php
            include "inc/nav.inc.php";
        ?>
        <main class="login-container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 px-5">
                    <h1 class="text-center mt-4 mb-4">REGISTER</h1>
                    <form action="process_login.php" method="post">
                        <div class="mb-3">
                            <input required maxlength="45" type="text" id="fname" name="fname" class="form-control"
                            placeholder="Enter first name">
                        </div>
                        <div class="mb-3">
                            <input required maxlength="45" type="text" id="lname" name="lname" class="form-control"
                            placeholder="Enter last name">
                        </div>
                        <div class="mb-3">
                            <input required maxlength="45" type="email" id="email" name="email" class="form-control"
                            placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <input required type="password" id="password" name="password" class="form-control"
                            placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <input required type="password" id="pwd_confirm" name="pwd_confirm" class="form-control"
                            placeholder="Confirm password">
                        </div>
                        <div class="mb-3 form-check">
                            <input required type="checkbox" name="agree" id="agree" class="form-check-input">
                            <label class="form-check-label" for="agree">
                                Agree to terms and conditions.
                            </label>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger w-100">REGISTER</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0">Have an existing account?</p>
                            <a href="login.php" class="btn btn-outline-dark">Login</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-none d-lg-block p-0">
                    <img class="login-pic img-fluid rounded-end" src="/images/login_glasskin.jpg" alt="glass skin photo">
                </div>
            </div>
        </main>
        <?php
            include "inc/footer.inc.php";
        ?>
    </body>
</html>