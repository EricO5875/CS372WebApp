<?php

    // require_once('db_con.php');

    // $connection = connect_to_db();

    function searchBooks($connection, $searchValue) {

        $query = "SELECT Id, Title, Author, ImageURL, AverageRating, RatingsCount
                    FROM BOOKS_T
                    WHERE Title LIKE '%%$searchValue%%'
                    OR Author LIKE '%%$searchValue%%';";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }

    function searchMovies($connection, $searchValue) {

        $query = "SELECT Title, ReleaseDate, ImageURL, AverageRating, Tagline
                    FROM MOVIES_T
                    WHERE Title LIKE '%%$searchValue%%';";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }

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
        $query = "SELECT Title, ReleaseDate, ImageURL, AverageRating
                    FROM MOVIES_T
                    ORDER BY ReleaseDate DESC
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

    function getSingleMovie($connection, $title, $releaseDate) {

        $query = "SELECT *
                  FROM MOVIES_T
                  WHERE Title = '$title' AND ReleaseDate = '$releaseDate';";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;

    }

    function getUserBookQueue($connection, $userId) {

        $query = "SELECT b.Id, b.Title, b.Author, b.ImageURL, b.AverageRating, u.Rating, u.Status
                    FROM BOOKS_T b
                    INNER JOIN BOOKS_TO_USER_T u ON b.Id = u.Id
                    WHERE u.UserId = '$userId'";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;

    }

    function getUserMovieQueue($connection, $userId) {

        $query = "SELECT m.Title, m.ReleaseDate, m.ImageURL, m.AverageRating, u.Rating, u.Status
                    FROM MOVIES_T m
                    INNER JOIN MOVIES_TO_USER_T u ON m.Title = u.Title AND m.ReleaseDate = u.ReleaseDate
                    WHERE u.UserId = '$userId'";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;

    }

    function getUserRelationBook($connection, $id, $userId) {
        $query = "SELECT Rating, Status
                    FROM BOOKS_TO_USER_T
                    WHERE UserId = '$userId' AND Id = " . $id . ";";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }

    function getUserRelationMovie($connection, $title, $releaseDate, $userId) {
        $query = "SELECT Rating, Status
                  FROM MOVIES_TO_USER_T
                  WHERE Title = '$title' AND ReleaseDate = '$releaseDate' AND UserID = '$userId' ;";

        $results = $connection->query($query) or die(mysqli_error($connection));

        return $results;
    }
?>
