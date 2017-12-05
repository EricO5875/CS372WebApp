<?php

/**
 * Initialize star rating.
 * 
 */
 
function star_rating_init($id,$rating='0',$readOnly=false){
    echo "<div class='rateYo' data-rateyo-read-only='$readOnly' data-rateYo-rating='$rating' data-id='$id'></div>";
}

?>