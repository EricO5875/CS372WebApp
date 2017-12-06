<!--

An queue page for entertainmentcenter.com

-->

<?php
    //Connect to database
    $connection = connect_to_db();

    $movieResults = getUserMovieQueue($connection);

    $bookResults = getUserBookQueue($connection);

?>

        <div class="container">
            <h2>My Queue</h2>

            <ul class="tabs">
        		<li class="tab-link current" data-tab="tab-1">Movies</li>
        		<li class="tab-link" data-tab="tab-2">TV Shows</li>
        		<li class="tab-link" data-tab="tab-3">Books</li>
        	</ul>

                <div id="tab-1" class="tab-content current">
                    <table class="table table-striped">
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Avg Rating</th>
                        </tr>

                        <?php
                            for($i = 0; $i < 5; $i++)
                            {
                                if ($result = $movieResults->fetch_assoc()) {
                                    if ($result['Status'] = 0) {
                                        $status = "Have Watched";
                                    } else if ($result['Status'] = 1) {
                                        $status = "Currently Watching";
                                    } else {
                                        $status = "Want to Watch";
                                    }


                                    echo "<tr>";
                                    echo "<td><img class='rounded' src='" . $result['ImageURL'] . "' alt='" . $result['Title'] . "'/></td>";
                                    echo "<td>" . $result['Title'] . "</td>";
                                    echo "<td>" . $status . "</td>";
                                    echo "<td style='width:300px'><div class='rateYo'></div></td>";
                                    echo "<td>" . $result['AverageRating'] . "</td>";
                                }
                            }
                        ?>
                        <!--<tr>-->
                        <!--    <td><img class="rounded" src="../images/thelastjedi.jpg" alt="The Last Jedi cover"/></td>-->
                        <!--    <td>Star Wars: The Last Jedi (2017)</td>-->
                        <!--    <td>Action/Adventure/Fantasy</td>-->
                        <!--    <td>Want to watch</td>-->
                            <!--Width put in to keep stars from changing col size-->
                        <!--    <td style = "width:300px"><div class="rateYo"></div></td>-->
                        <!--    <td>N/A</td>-->
                        <!--</tr>-->

                        <tr>
                            <td colspan="5"><a href="#">see more</a></td>
                        </tr>
                    </table>
                </div>
                <div id="tab-2" class="tab-content">
                    <table class="table table-striped">
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Avg Rating</th>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/strangerthings.jpg" alt="Stranger Things cover"/></td>
                            <td>Stranger Things</td>
                            <td>Drama/Fantasy/Horror</td>
                            <td>Want to watch</td>
                            <!--Width put in to keep stars from changing col size-->
                            <td style = "width:300px"><div class="rateYo"></div></td>
                            <td>4.45</td>

                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/curbyourenthusiasm.jpg" alt="Curb Your Enthusiasm cover"/></td>
                            <td>Curb Your Enthusiasm</td>
                            <td>Comedy</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>4.35</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/glow.jpg" alt="GLOW cover"/></td>
                            <td>GLOW</td>
                            <td>Comedy/Drama/Sport</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>4.00</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/thesopranos.jpg" alt="The Sopranos cover"/></td>
                            <td>The Sopranos</td>
                            <td>Crime/Drama</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>4.60</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/gameofthrones.jpg" alt="Game of Thrones cover"/></td>
                            <td>Game of Thrones</td>
                            <td>Adventure/Drama/Fantasy</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>4.75</td>
                        </tr>
                        <tr>
                            <td colspan="5"><a href="#">see more</a></td>
                        </tr>
                    </table>
                </div>
                <div id="tab-3" class="tab-content">
                    <table class="table table-striped">
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Avg Rating</th>
                        </tr>

                        <?php
                            for($i = 0; $i < 4; $i++)
                            {
                                if ($result = $bookResults->fetch_assoc()) {

                                    if ($result['Status'] = 0) {
                                        $status = "Have Read";
                                    } else if ($result['Status'] = 1) {
                                        $status = "Currently Reading";
                                    } else {
                                        $status = "Want to Read";
                                    }

                                    echo "<tr>";
                                    echo "<td><img class='rounded' src='" . $result['ImageURL'] . "' alt='" . $result['Title'] . "'/></td>";
                                    echo "<td>" . $result['Title'] . "</td>";
                                    echo "<td>" . $result['Author'] . "</td>";
                                    echo "<td>" . $status . "</td>";
                                    echo "<td style='width:300px'><div class='rateYo' data-rateYo-rating='" . $result['Rating'] . "'></div></td>";
                                    echo "<td>" . $result['AverageRating'] . "</td>";
                                }
                            }
                        ?>
                        <!--<tr>-->
                        <!--    <td><img class="rounded" src="../images/artofdeal.jpg" alt="Trump: Art of the Deal cover"/></td>-->
                        <!--    <td>Trump: Art of the Deal</td>-->
                        <!--    <td>Donald J. Trump, Tony Schwartz</td>-->
                        <!--    <td>Want to read</td>-->
                            <!--Width put in to keep stars from changing col size-->
                        <!--    <td style = "width:300px"><div class="rateYo"></div></td>-->
                        <!--    <td>3.66</td>-->
                        <!--</tr>-->

                        <tr>
                            <td colspan="6"><a href="#">see more</a></td>
                        </tr>
                    </table>
                </div>
            </div>
