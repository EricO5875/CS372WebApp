<?php
/*
 *
 * A page for viewing media
 *
*/

    //Connect to database
    $connection = connect_to_db();
    $hasSeen = false;

    if($media === 'book')
    {
        $result = getBookByID($connection, $id)->fetch_assoc();

        $author = $result['Author'];
        $imageURL = $result['ImageURL'];
        $title = $result['Title'];
        $averageRating= $result['AverageRating'];
        $ratingsCount = $result['RatingsCount'];

        if ($result = getUserRelationBook($connection, $id)->fetch_assoc()) {
            $hasSeen = true;
        }


    } else if ($media === 'movie') {

        $title = $_GET['title'];
        $releaseDate = $_GET['release'];
        $result = getSingleMovie($connection, $title, $releaseDate)->fetch_assoc();
        $imageURL = $result['ImageURL'];
        $averageRating= $result['AverageRating'];
        $summary = $result['Summary'];

        if ($result = getUserRelationMovie($connection, $title, $releaseDate)->fetch_assoc()){
            $hasSeen = true;
        }
    }

    if ($hasSeen) {
        $userStatus = $result['Status'];
        $userRating = $result['Rating'];
    } else {
        $userStatus = 1;
        $userRating = 1;
    }


?>
    <!-- Page Content -->
    <div class="container content">
      <!-- Heading Row -->
      <div class="row justify-content-start">
        <div class="col-lg-3">
            <img  id='<?php $id ?>' class='img pull-left' src='<?php echo $imageURL; ?>' alt='<?php echo $title; ?>' height="250" width="160"/>
            </br></br><div class='rateYo' data-rateyo-read-only='true' data-rateYo-rating="<?php echo $averageRating; ?>"></div><?php if ($media === 'book') {echo $ratingsCount . "ratings";} ?> </br>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-6 pl-0 mb-3">
            <div>
                <h1><?php echo $title ?></h1>
                <h4><?php if ($media === 'book') {
                            echo "by " . $author;
                          } else {
                            echo "(" . $releaseDate . ")";
                          }
                    ?>
                </h4> </br>


            </div>
            <h4>Summary</h4></br>
            <div id="description"> <?php echo $summary ?> </div>
        </div>


        <div class="col-lg-3">
            <div class='pt-2 form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status' checked=checkStatus(2, <?php $userStatus ?>>Readlist</label></div>
            <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status' checked=checkStatus(1, <?php $userStatus ?>>Reading</label></div>
            <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status' checked=checkStatus(0, <?php $userStatus ?>>Read</label></div>
            </br><div class='d-flex justify-content-center'>My Rating</div><div class='d-flex justify-content-center'><div class='rateYo'></div></div></td></tr>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <?php
        if($imageURL == null)
        { ?>
            <script>
                function handleResponseImage(response)
                {   var item = response.items[0];
                    var link=item.volumeInfo.imageLinks.thumbnail;
                    document.getElementById('<?php echo $id; ?>').setAttribute('src', link); }
            </script>
            <script src='https://www.googleapis.com/books/v1/volumes?q=isbn=<?php echo $id; ?>&callback=handleResponseImage'></script>";
        <?php }
    ?>
    <script>
    function handleResponseDescription(response) {
        var item = response.items[0];
        document.getElementById("description").innerHTML += item.volumeInfo.description;
    }

    function checkStatus(radio, status) {
        if (radio = status) {
            return true;
        }
        return false;
    }
    </script>
    <script src="https://www.googleapis.com/books/v1/volumes?q=isbn=<?php echo $id?>&callback=handleResponseDescription"></script>