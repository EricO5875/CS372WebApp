<?php
    header("Content-type: application/json");
    require("../includes/db_con.php");
    
    $id = htmlspecialchars($_REQUEST['id']);
    $rate = htmlspecialchars($_REQUEST['rate']);
    $userId = htmlspecialchars($_REQUEST['user']);

    //Connect to database
    $connection = connect_to_db();
    
    $query1 = "SELECT * FROM `BOOKS_TO_USER_T` WHERE `Id` = '$id' AND `UserId` = '$userId';";
    
    $results = $connection->query($query1) or die(mysqli_error($connection));
    
    if($results !== false && mysqli_num_rows($results) > 0)
    {
        $query = "UPDATE `BOOKS_TO_USER_T` 
                  SET `Rating` = '$rate'
                  WHERE `Id` = '$id' AND `UserId` = '$userId';";
    }
    else
    {
       $query = "INSERT INTO `BOOKS_TO_USER_T`(`Id`, `UserId`, `Rating`, `Status`) 
              VALUES ('$id','$userId','$rate','0');"; 
    }
    
    $results = $connection->query($query) or die(mysqli_error($connection));

?>