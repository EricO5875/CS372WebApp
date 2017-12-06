<?php

    // require_once('db_con.php');

    // $connection = connect_to_db();

    function getRecentBooks($connection)
    {
        $query = "SELECT Id, Title, Author, PublicationYear, ImageURL
                    FROM BOOKS_T
                    ORDER BY PublicationYear DESC
                    LIMIT 0 , 30;";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }

    function getRecentMovies($connection)
    {
        $query = "SELECT Title, YearOfRelease, ImagePath, AverageRating
                    FROM MOVIES_T
                    ORDER BY YearOfRelease DESC
                    LIMIT 0 , 30;";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }

    function getBookByID($connection, $id) {

        $query = "SELECT *
                  FROM BOOKS_T
                  WHERE Id = '$id';";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }
?>
