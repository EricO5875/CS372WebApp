<!--

A login page for entertainmentcenter.com

-->
        
        <form action="control.php?page=home" id="login" method="post" onsubmit="return true">
            <fieldset>
                <legend>Entertainment Center Login </legend>
                <div>
                    <b>Username: </b> <input type="text" class="form-control" name="txtUsername" id="txtUsername" required>
                    <b>Password: </b> <input type="password" class="form-control" name="txtPassword" id="txtPassword" required>
                </div>
            </fieldset>
            <br/>
            <input type="submit" id="login" class="btn btn-primary" value="Login" onclick="window.location.href='control.php?page=home'">
            <input type="submit" id="signup" class="btn btn-primary" value="Sign Up" onclick="window.location.href='control.php?page=signup'">
        </form>
       