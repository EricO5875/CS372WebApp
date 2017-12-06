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
        <ul class="tabs">
        	<li class="tab-link current" data-tab="tab-1">Movies</li>
        	<li class="tab-link" data-tab="tab-2">TV Shows</li>
        	<li class="tab-link" data-tab="tab-3">Books</li>
        </ul>  
        
        <div id="tab-1" class="row my-4 tab-content current">

       
            <div class="col-lg-12" style='background-color:#ccc;'>
            
                <p>Showing <?php echo $resultsPerPage; ?> of <?php echo $numberOfResults; ?> results (0.<span id='time'></span> seconds)</p>
                <table class='table table-striped'>
                <?php
                    for($i = 0; $i < $resultsPerPage; $i++) 
                    {
                        if($result = $results->fetch_assoc())
                        {
                            $imageURL = $result['ImageURL'];
                            $id = $result['Id'];
                            
                            echo "<tr><td><a href='control.php?page=view&media=book&id=" . rawurlencode($id) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<img id='" . $id . "' class='rounded pull-left' src='" . $result['ImageURL']. "' alt='" . $result['Title'] . "'/></a>";
                            echo "</td><td style = 'width:300px'><a href='control.php?page=view&media=book&id=" . rawurlencode($id) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<strong>" . $result['Title'] . "</strong></a></br>by " . $result['Author'];
                            star_rating_init($id,$result['AverageRating'],true);
                            echo $result['RatingsCount'] . " ratings";
                            ?>
                            </td><td>
                            <form>
                                <div class="form-group">
                                    <div class='pt-2 form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>finished</label></div>
                                    <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>in progress</label></div>
                                    <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>interested</label></div>
                                    <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>not intersted</label></div>
                                </div>
                                <div class='d-flex justify-content-center'>my rating</div><div class='d-flex justify-content-center'>
                            </form>    
                        
                            <?php 
                            star_rating_init($id);
                            echo "</div></td></tr>";
                        
                            if($imageURL == null)
                            { ?> 
                                <script>
                                    function handleResponse(response) 
                                    { 
                                        var item = response.items[0]; 
                                        var link = item.volumeInfo.imageLinks.thumbnail; 
                                        document.getElementById('<?php echo $id; ?>').setAttribute('src', link); 
                                    } 
                                </script>
                                <script src='https://www.googleapis.com/books/v1/volumes?q=isbn=<?php echo $id; ?>&callback=handleResponse'></script>";
                            <?php }
                        }
                    } ?>
                </table>
            </div> 
            <!-- /.col-lg-12 -->
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