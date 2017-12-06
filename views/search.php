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

    $results = searchBooks($connection, $q);

    $numberOfResults = mysqli_num_rows($results);

    if($resultsPerPage > $numberOfResults)
    {
        $resultsPerPage = $numberOfResults;
    }


    $movieResults = searchMovies($connection, $q);

    $numberOfmovieResults = mysqli_num_rows($movieResults);

    if($movieResultsPerPage > $numberOfmovieResults)
    {
        $movieResultsPerPage = $numberOfmovieResults;
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

                <p>Showing <?php echo $movieResultsPerPage; ?> of <?php echo $numberOfMovieResults; ?> results (0.<span id='time'></span> seconds)</p>
                <table class='table table-striped'>
                <?php
                    for($i = 0; $i < $resultsPerPage; $i++)
                    {
                        if($result = $movieResults->fetch_assoc())
                        {
                            $imageURL = $result['ImageURL'];
                            if($imageURL == null)
                            {
                                $imageURL = 'https://s.gr-assets.com/assets/nophoto/book/50x75-a91bf249278a81aabab721ef782c4a74.png';
                            }

                            $id = $result['Id'];

                            echo "<tr><td><a href='control.php?page=view&media=movie&release=" . rawurlencode($result['ReleaseDate']) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<img id='" . $id . "' class='rounded pull-left' src='" . $result['ImageURL']. "' alt='" . $result['Title'] . "'/></a>";
                            echo "</td><td style = 'width:300px'><a href='control.php?page=view&media=movie&release=" . rawurlencode($result['ReleaseDate']) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<strong>" . $result['Title'] . "</strong></a></br>(" . $result['ReleaseDate'] . ")";
                            star_rating_init($id,'-1',$result['AverageRating'],true);
                            echo $result['RatingsCount'] . " ratings";

                            ?>
                            </td><td>
                                <form style="<?php if(!isset($_SESSION['authenticated'])) echo "visibility:hidden" ?>" name="statusForm" action="" method="post">
                                    <div class="form-group">
                                        <div class='pt-2 form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='0' name='status'>finished</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='1' name='status'>in progress</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='2' name='status'>interested</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='3' name='status'>not intersted</label></div>
                                    </div>
                                    <div class="">
                                        <div class='d-inline-block'>my rating</div><div class='d-inline-block'>
                                             <?php
                                                star_rating_init($id,$_SESSION['user']);
                                             ?>
                                        </div>
                                    </div>

                                <?php echo "</form></td></tr>";

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

        <div id="tab-3" class="row my-4 tab-content">
            <div class="col-lg-12" style='background-color:#ccc;'>

                <p>Showing <?php echo $resultsPerPage; ?> of <?php echo $numberOfResults; ?> results (0.<span id='time'></span> seconds)</p>
                <table class='table table-striped'>
                <?php
                    for($i = 0; $i < $resultsPerPage; $i++)
                    {
                        if($result = $results->fetch_assoc())
                        {
                            $imageURL = $result['ImageURL'];
                            if($imageURL == null)
                            {
                                $imageURL = 'https://s.gr-assets.com/assets/nophoto/book/50x75-a91bf249278a81aabab721ef782c4a74.png';
                            }

                            $id = $result['Id'];

                            echo "<tr><td><a href='control.php?page=view&media=book&id=" . rawurlencode($id) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<img id='" . $id . "' class='rounded pull-left' src='" . $result['ImageURL']. "' alt='" . $result['Title'] . "'/></a>";
                            echo "</td><td style = 'width:300px'><a href='control.php?page=view&media=book&id=" . rawurlencode($id) . "&title=" . rawurlencode($result['Title']) ."'>";
                            echo "<strong>" . $result['Title'] . "</strong></a></br>by " . $result['Author'];
                            star_rating_init($id,'-1',$result['AverageRating'],true);
                            echo $result['RatingsCount'] . " ratings";

                            ?>
                            </td><td>
                                <form style="<?php if(!isset($_SESSION['authenticated'])) echo "visibility:hidden" ?>" name="statusForm" action="" method="post">
                                    <div class="form-group">
                                        <div class='pt-2 form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='0' name='status'>finished</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='1' name='status'>in progress</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='2' name='status'>interested</label></div>
                                        <div class='form-check form-check-inline'><label class='form-check-label'>
                                            <input class='form-check-input' data-user="<?php echo $_SESSION['user']; ?>" data-id="<?php echo $id; ?>" type='radio' value='3' name='status'>not intersted</label></div>
                                    </div>
                                    <div class="">
                                        <div class='d-inline-block'>my rating</div><div class='d-inline-block'>
                                             <?php
                                                star_rating_init($id,$_SESSION['user']);
                                             ?>
                                        </div>
                                    </div>

                                <?php echo "</form></td></tr>";

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