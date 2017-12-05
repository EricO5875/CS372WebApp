<?php 
/*
 *
 * A page for viewing media
 *
*/

    if($media === 'book')
    {
    //Connect to database
    $connection = connect_to_db();
    
    $query = "SELECT *
              FROM BOOKS_T
              WHERE Id = '$id';";
    

    $results = $connection->query($query) or die(mysqli_error($connection));
    
    $result = $results->fetch_assoc();
  
    $author = $result['Author'];
    $imageURL = $result['ImageURL'];
    $title = $result['Title'];
    $averageRating= $result['AverageRating'];
    $ratingsCount = $result['RatingsCount'];
    }
    
?>    
    <!-- Page Content -->
    <div class="container content">
      <!-- Heading Row -->
      <div class="row justify-content-start">
        <div class="col-lg-3">
            <img id='<?php echo $id; ?>' class='img pull-left' src="<?php echo $imageURL; ?>" alt="<?php echo $title; ?>" height="250" width="160"/>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-6 pl-0 mb-3">
            <div>
                <h1><?php echo $title ?></h1>
                </br><h4>by <?php echo $author ?></h4>
                </br><div class='rateYo' data-rateyo-read-only='true' data-rateYo-rating="<?php echo $averageRating; ?>"></div><?php echo $ratingsCount; ?> ratings
            </div>
            <div id="description"></div>
        </div>
        <div class="col-lg-3">
            <div class='pt-2 form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Readlist</label></div>
            <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Reading</label></div>
            <div class='form-check form-check-inline'><label class='form-check-label'><input class='form-check-input' type='radio' name='status'>Read</label></div>
            </br><div class='d-flex justify-content-center'>my rating</div><div class='d-flex justify-content-center'><div class='rateYo'></div></div></td></tr>
        </div>    
        
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    
    <?php 
          if($imageURL == null)
                            {   
                                echo "<script> function handleResponseImage(response) { var item = response.items[0]; var link=item.volumeInfo.imageLinks.thumbnail;" 
                                   . "document.getElementById('" . $id . "').setAttribute('src', link); } </script>"
                                   . "<script src='https://www.googleapis.com/books/v1/volumes?q=id=" . $id . "&callback=handleResponseImage'></script>";
                            }
    
    ?>
    
    <script>
      function handleResponseDescription(response) {
        var item = response.items[0];
        document.getElementById("description").innerHTML += "<br>" + item.volumeInfo.description;
    }
    </script>
    <script src="https://www.googleapis.com/books/v1/volumes?q=id=<?php echo $id?>&callback=handleResponseDescription"></script>