<?php

    //Connect to the database
    $host = "localhost";
    $user = "eolsen";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "c9";                                  //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306

    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

    $searchTitle = $_POST['search'];

    //And now to perform a simple query to make sure it's working
    $query = "SELECT u.UserID, b.ISBN, b.Title, b.Author, c.Status, b.AverageRating, b.Genre
              FROM USER_T u
              LEFT JOIN BOOKSTOUSER_T c ON u.UserID = c.UserID
              LEFT JOIN BOOKS_T b ON c.ISBN = b.ISBN AND b.Author = '$searchTitle';";

    $result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Entertainment</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../star-rating-plugin/bootstrap-star-rating/css/star-rating.min.css">

        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        <script
            src="../star-rating-plugin/bootstrap-star-rating/js/star-rating.min.js" type="text/javascript">
        </script>

    <style>
        .thumbnail {
            width: 100px;
        }
    </style>

    </head>
    <body>
        <div class="container">
            <h4>books</h4>
            <table class="table table-striped">
                <tr>
                    <th>title</th>
                    <th>author</th>
                    <th>status</th>
                    <th>rating</th>
                    <th>genre</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['Title'];
                    if ($title == "") {
                        continue;
                    }
    	            $author = $row['Author'];
    	            if ($row['Status'] == 0) {
    	                $status = "Have Finished";
    	            } else if ($row['Status'] == 1) {
    	                $status = "In Progress";
    	            } else {
    	                $status = "Want to read";
    	            }
    	            $rating = $row['AverageRating'];
    	            $genre = $row['Genre'];
    	            //-display the result of the array
                 	echo "<tr>\n";
                	echo "<td>" . " " . $title . " " . "</td>\n";
                	echo "<td>" . " " . $author . " " . "</td>\n";
                	echo "<td>" . " " . $status . " " . "</td>\n";
                	echo "<td>" . " " . $rating . " " . "</td>\n";
                	echo "<td>" . " " . $genre . " " . "</td>\n";
                	echo "<tr>";
                }
                 ?>
            </table>
        </div>
    </body>
</html>