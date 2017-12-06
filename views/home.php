<!--

A homepage for entertainmentcenter.com

-->
<?php
    //Connect to DB
    $connection = connect_to_db();

    $bookResults = getRecentBooks($connection);
    $movieResults = getRecentMovies($connection);

?>
    <!-- Page Content -->
    <div class="container content">
      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <iframe width="730" height="400" src="https://www.youtube.com/embed/-Denciie5oA?autoplay=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <img src="../images/12strong.jpg" alt="12 Strong" width="270px" class="poster"/>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->

      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Movies</h2>
              <h6 class="card-title">Box Office</h6>

              <?php
                  for($i = 0; $i < 4; $i++)
                  {
                      $movieResult = $movieResults->fetch_assoc();
                      echo "<div class='thumbnail'>";
                      echo "<img src='" . $movieResult['ImagePath'] . "' alt='" . $movieResult['Title'] . "' class='thumb'>";
                      echo "<div class='caption'>";
                      echo "<p>" . $movieResult['Title'] . "</p>";
                      echo "<p class='weekend-gross'>" . $movieResult['AverageRating'];
                      echo "</div>";
                      echo "</a>";
                      echo "</div>";
                  }
                ?>

            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
      </div>
        <!-- /.col-md-4 -->

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Tv Shows</h2>
              <h6 class="card-title">Currently Airing</h6>
              <div class="thumbnail">
                <a href="#">
                  <img src="../images/theWalkingDead.jpg" alt="The Walking Deaad" class="thumb">
                  <div class="caption">
                    <p>The Walking Dead</p>
                    <p class="season">Season 8</p>
                  </div>
                </a>
              </div>
                <div class="thumbnail">
                  <a href="#">
                    <img src="../images/theflash.jpg" alt="The Flash" class="thumb">
                    <div class="caption">
                      <p>The Flash</p>
                      <p class="season">Season 4</p></p>
                    </div>
                  </a>
                </div>
                <div class="thumbnail">
                  <a href="#">
                    <img src="../images/Supernatural.jpg" alt="Supernatural" class="thumb">
                    <div class="caption">
                      <p>Supernatural</p>
                      <p class="season">Season 13</p>
                    </div>
                  </a>
                </div>
                <div class="thumbnail">
                  <a href="#">
                    <img src="../images/BigBang.jpg" alt="Big Bang Theory" class="thumb">
                    <div class="caption">
                      <p>The Big Bang Theory</p>
                      <p class="season">Season 11</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Books</h2>
              <h6 class="card-title">Recently Published</h6>
              <?php
                  for($i = 0; $i < 4; $i++)
                  {
                      $bookResult = $bookResults->fetch_assoc();
                      echo "<div class='thumbnail'>";
                      echo "<a href='control.php?page=view&media=book&id=" . rawurlencode($bookResult['Id']) . "&title=" . rawurlencode($bookResult['Title']) ."'>";
                      echo "<img src='" . $bookResult['ImageURL'] . "' alt='" . $bookResult['Title'] . "' class='thumb'>";
                      echo "<div class='caption'>";
                      echo "<p>" . $bookResult['Title'] . "</p>";
                      echo "<p class='author'>" . $bookResult['AverageRating'] . "</p>";
                      echo "</div>";
                      echo "</a>";
                      echo "</div>";
                  }
              ?>
              <!--<div class="thumbnail">-->
              <!--  <a href="#">-->
              <!--    <img src="../images/origin.jpg" alt="Origin" class="thumb">-->
              <!--    <div class="caption">-->
              <!--      <p>Origin</p>-->
              <!--      <p class="author">Dan Brown</p>-->
              <!--    </div>-->
              <!--  </a>-->
              <!--</div>-->
              <!--  <div class="thumbnail">-->
              <!--    <a href="#">-->
              <!--      <img src="../images/TurtlesAlltheWayDown.jpg" alt="Turtles All the Way Down" class="thumb">-->
              <!--      <div class="caption">-->
              <!--        <p>Turtles All the Way Down</p>-->
              <!--        <p class="author">John Green</p>-->
              <!--      </div>-->
              <!--    </a>-->
              <!--  </div>-->
              <!--  <div class="thumbnail">-->
              <!--    <a href="#">-->
              <!--      <img src="../images/WithoutMerit.jpg" alt="Without Merit" class="thumb">-->
              <!--      <div class="caption">-->
              <!--        <p>Without Merit</p>-->
              <!--        <p class="author">Collen Hoover</p>-->
              <!--      </div>-->
              <!--    </a>-->
              <!--  </div>-->
              <!--  <div class="thumbnail">-->
              <!--    <a href="#">-->
              <!--      <img src="../images/TheShipoftheDead.jpg" alt="The Ship of the Dead" class="thumb">-->
              <!--      <div class="caption">-->
              <!--        <p>The Ship of the Dead</p>-->
              <!--        <p class="author">Rick Riordan</p>-->
              <!--      </div>-->
              <!--    </a>-->
              <!--  </div>-->
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
