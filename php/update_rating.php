<?php 
    header("Content-type: application/json");
    require("../includes/db_con.php");
    
    $id = htmlspecialchars($_REQUEST['id']);
    $rate = htmlspecialchars($_REQUEST['rate']);
    
    //Connect to database
    $connection = connect_to_db();
        
    $query = "INSERT INTO `BOOKS_TO_USER_T`(`ISBN`, `UserId`, `Rating`, `Status`) 
              VALUES ('$id','$_SESSION['user']','$rate','0')
              ON DUPLICATE KEY UPDATE Rating = $rate;";
        
    $results = $connection->query($query) or die(mysqli_error($connection));
    
?>