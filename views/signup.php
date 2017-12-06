<!--

A sign up page for entertainmentcenter.com

-->

<?php 
   if (isset($_POST["signup"]))
	{	
		if (!empty($_POST["email"]) &&
		    !empty($_POST["user"]) && 
		    !empty($_POST["pass"]) &&
		    !empty($_POST["pass2"]) &&
            (($_POST["pass"]) === ($_POST["pass2"])))
	        {
	        	echo "made it";
		        $connection = connect_to_db();
		        $sql = sprintf("INSERT INTO `USER_T`(`Username`, `Email`, `Pass`) VALUE ('%s', '%s', PASSWORD('%s'))",
		                       $connection->real_escape_string($_POST["user"]),
		                       $connection->real_escape_string($_POST["email"]),
		                       $connection->real_escape_string($_POST["pass"]));
		            
		        $result = $connection->query($sql) or die(mysqli_error($connection));
		       
                $result = $results->fetch_assoc();
                $_SESSION['authenticated'] = true;
                $_SESSION['user'] = $result['UserId'];
                header("Location: control.php?page=home");
	        }
	        else
	        {
                echo "<h6 class='mt-4 ml-5 pl-4' style='color:red; text-align:left;'>Passwords do not match</h6>";
	        }
	}
    
?>

        <form action="control.php?page=signup" id="signup" method="post" >
            <fieldset>
                <legend>Entertainment Center Sign Up</legend>
                <div>
                    <b>E-mail: </b> <input type="email" class="form-control" name="email" id="txtEmail" value="<?php if (isset($_POST["email"])) 
				    echo htmlspecialchars($_POST["email"]); ?>" required>
                    <b>Username: </b> <input type="text" class="form-control" name="user" id="txtUsername" value="<?php if (isset($_POST["user"])) 
				    echo htmlspecialchars($_POST["user"]); ?>" required>
                    <b>Password: </b> <input type="password" class="form-control" name="pass" id="txtPassword" required>
                    <b>Confirm Password: </b> <input type="password" class="form-control" name="pass2" id="txtConfirm" required>
                </div>
            </fieldset>
            <br>
            <input type="submit" name="signup" id="signup" class="btn btn-primary" value="Sign Up">
        </form>
    