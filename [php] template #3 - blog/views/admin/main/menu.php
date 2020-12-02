<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <span class="login100-form-title p-b-32">
                Control Panel
            </span>

            <div class="flex-sb-m flex-w">
                <a class="login100-form btn btn-dark" href="/admin/article/addpage">Add article</a>
                <div><br><hr></div>
                <a class="login100-form btn btn-dark" href="/admin/article/confirmcomments">Confirm comments</a>
            </div>
            <br>
            <div  class="flex-sb-m flex-w">
                <a class="btn btn-dark" href="/admin/main/menu/?logout=0">Back</a>
                <a class="btn btn-dark" href="/admin/main/menu/?logout=1">Logout</a>
            </div>
            <div><br>
                <hr>
                <form method="post" action="/admin/main/changepass">
                    <h5>Password</h5>
                    <input type="text" class="login100-form  form-control btn-light" name="password" placeholder="Enter new password...">
                    <br>
                    <?php if(isset($_GET['ch-pas-success']) && $_GET['ch-pas-success'] == 1): ?>
                        <div class="alert alert-success" role="alert">
                            Password successfully changed!
                        </div>
                    <?php elseif(isset($_GET['ch-pas-success']) && $_GET['ch-pas-success'] == 0): ?>
                        <div class="alert alert-danger" role="alert">
                            The password has not been changed. <br>
                            - The password must be at least 8 characters long. <br>
                            - At least 1 capital letter. <br>
                            - At least 1 uppercase letter. <br>
                            - At least 1 digit.
                        </div>
                    <?php endif;?>
                    <input type="submit" class="login100-form btn btn-dark" value="Save new password">
                </form>

            </div>
        </div>
    </div>
</div>

