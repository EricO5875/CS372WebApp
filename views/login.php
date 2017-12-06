<!--

A login page for entertainmentcenter.com

-->

<?php 

    if (isset($_POST["login"]))
	{
		if (!empty($_POST["user"]) && !empty($_POST["pass"]))
        {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            
            //Connect to database
            $connection = connect_to_db();
            
            $query = "SELECT *
                      FROM USER_T
                      WHERE Username = '$user'
                      AND Pass = PASSWORD('$pass');";
                      
            $results = $connection->query($query) or die("SQL Error line  ".__LINE__ ." file ".__FILE__." : ".mysqli_error());
            
            
            if($results !== false && mysqli_num_rows($results) > 0)
            {
                $result = $results->fetch_assoc();
                $_SESSION['authenticated'] = true;
                $_SESSION['user'] = $result['UserId'];
                header("Location: control.php?page=home");
            }
            else
            {
                echo "<h6 class='mt-4 ml-5 pl-4' style='color:red; text-align:left;'>Invalid username or password</h6>";
            }
        }
    }

?>

        <form action="control.php?page=login" id="login" method="post">
            <fieldset>
                <legend>Entertainment Center Login </legend>
                <div>
                    <b>Username: </b> <input type="text" class="form-control" name="user" id="txtUsername"
                    value="<?php if (isset($_POST["user"])) echo htmlspecialchars($_POST["user"]); ?>" required>
                    <b>Password: </b> <input type="password" class="form-control" name="pass" id="txtPassword" required>
                </div>
            </fieldset>
            <br/>
            <input type="submit" name="login" id="login" class="btn btn-primary" value="Login">
        </form>
        <a class="ml-5" href='control.php?page=signup' id="signup">
            <input type="submit" id="signup" name="signup" class="mb-4 ml-3 btn btn-primary" value="Sign Up">
        </a>
       