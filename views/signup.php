<!--

A sign up page for entertainmentcenter.com

-->

        <form action="control.php?page=home" id="login" method="post" onsubmit="return validate(this);">
            <fieldset>
                <legend>Entertainment Center Sign Up</legend>
                <div>
                    <b>E-mail: </b> <input type="email" class="form-control" id="txtEmail" required>
                    <b>Username: </b> <input type="text" class="form-control" id="txtUsername" required>
                    <b>Password: </b> <input type="password" class="form-control" id="txtPassword">
                    <b>Confirm Password: </b> <input type="password" class="form-control" id="txtConfirm">
                </div>
            </fieldset>
            <br>
            <input type="submit" id="signup" class="btn btn-primary" value="Sign Up">
        </form>
    