<?php

/**
 * Initialize star rating.
 * 
 */
 
function star_rating_init($id,$user,$rating='0',$readOnly=false){
    echo "<div class='rateYo' data-rateyo-read-only='$readOnly' data-user='$user'data-rateYo-rating='$rating' data-id='$id'></div>";
}

?>