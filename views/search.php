<?php 
/*
 *
 * A page for searching the database for media
 *
*/

    //Connect to database
    $connection = connect_to_db();
    
    $resultsPerPage = 10;
    $q = htmlspecialchars($search);
    
    $query = "SELECT Id, Title, Author, ImageURL, AverageRating, RatingsCount
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
        <div class="col-lg-10" style='background-color:#ccc;'>
            <?php 
                echo "Showing " . $resultsPerPage . " of "
                    . $numberOfResults . " results (0.<span id='time'></span> seconds)"; 
                
                 echo "<table class='table-striped'>";
                 
                    for($i = 0; $i < $resultsPerPage; $i++) 
                    {
                        if($result = $results->fetch_assoc())
                        {
                            $imageURL = $result['ImageURL'];
                            $id = $result['Id'];
                            
                            echo "<tr><td><a href = 'control.php?page=view&media=book&id=" . rawurlencode($id) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<img id='" . $id . "' class='rounded pull-left' src='" . $result['ImageURL']. "' alt='" . $result['Title'] . "'/></a>";
                            echo "</td><td style = 'width:300px'><a href = '#'><strong>" . $result['Title'] . "</strong></a>";
                            echo "</br>by " . $result['Author'];
                            star_rating_init($id,$result['AverageRating'],true);
                            echo $result['RatingsCount'] . " ratings";
                            echo "</td><td>";
                            echo "<div class='pt-2 form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Readlist</label></div>";
                            echo "<div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Reading</label></div>";
                            echo "<div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Read</label></div>";
                            echo "</br><div class='d-flex justify-content-center'>my rating</div><div class='d-flex justify-content-center'>";
                            star_rating_init($id);
                            echo "</div></td></tr>";
                        
                            if($imageURL == null)
                            {   
                                //$id = validateid($result['id']);
                                echo "<script> function handleResponse(response) { var item = response.items[0]; var link = item.volumeInfo.imageLinks.thumbnail;" 
                                   . "document.getElementById('" . $id . "').setAttribute('src', link); } </script>"
                                   . "<script src='https://www.googleapis.com/books/v1/volumes?q=id=" . $id . "&callback=handleResponse'></script>";
                            }
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