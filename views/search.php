<?php 
/*
 *
 * A page for searching the database for media
 *
*/

    //Connect to database
    require_once('../php/db_con.php');
    $connection = connect_to_db();
    
    $resultsPerPage = 10;
    $q = htmlspecialchars($search);
    
    $query = "SELECT Title, Author, ImageURL, AverageRating, RatingsCount
              FROM BOOKS_T
              WHERE Title LIKE '%%$q%%'
              OR Author LIKE '%%$q%%';";

    $results = $connection->query($query) or die(mysqli_error($connection));
    
    $numberOfResults = mysqli_num_rows($results);
    
    if($resultsPerPage > $numberOfResults)
    {
        $resultsPerPage = $numberOfResults;
    }
?>   
    <!-- Page Content -->
    <div class="container content">
      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-2">
            <h4>Limit Search Results</h4>
            <ul>
                <li>Movies</li>
                <li>Tv Shows</li>
                <li>Books</li>
            </ul>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-10">
            <?php 
                echo "Showing " . $resultsPerPage . " of "
                    . $numberOfResults . " results (0.<span id='time'></span> seconds)"; 
                
                 echo "<table>";
                 
                    for($i = 0; $i < $resultsPerPage; $i++) 
                    {
                        if($result = $results->fetch_assoc())
                        {
                            echo "<tr><td>";
                            echo "<img class='rounded pull-left' src='" . $result['ImageURL']. "' alt='" . $result['Title'] . "'/>";
                            echo "</td><td style = 'width:300px'><strong>" . $result['Title'] . "</strong></span>";
                            echo "</br>by " . $result['Author'];
                            echo "</br><div class='rateYo' data-rateyo-read-only='true' data-rateYo-rating='";
                            echo $result['AverageRating'] . "' ></div>" . $result['RatingsCount'] . " ratings";
                            echo "</td><td>";
                            echo "<div class='pt-2 form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Readlist</label></div>";
                            echo "<div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Reading</label></div>";
                            echo "<div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Read</label></div>";
                            echo "</br><div class='d-flex justify-content-center'>my rating</div><div class='d-flex justify-content-center'><div class='rateYo'></div></div></td></tr>";
                        }
                    }
                   
                echo "</table>";
                
                ?>
        </div> 
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    
    <script>
        window.onload = function()
        {
            setTimeout(function()
            {
                var t = performance.timing;
                var time = document.getElementById('time');
                time.innerHTML = (t.loadEventEnd - t.responseEnd);
            }, 0);
        } 
    </script>