<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>
                <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'failed'): ?>
                    <div class="alert alert-danger" role="alert">
                        Username or Password were entered incorrectly. <br>
                        Try again...
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif;?>
                <span class="txt1 p-b-11">
						Username
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                    <input class="input100" type="text" name="username" required>
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12"  data-validate = "Password is required">
                    <input class="input100" type="password" name="password" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

