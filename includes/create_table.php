<?php
/*
*   
*
*/

    function create_table($results)
    {
        while($result = $results->fetch_assoc()){
            $id = $result['id'];
            $title = $result['Title'];
            $imageURL = $result['ImageURL'];
            
        }
    ?> 
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
                            <td><img class="rounded" src="../images/thelastjedi.jpg" alt="The Last Jedi cover"/></td>
                            <td>Star Wars: The Last Jedi (2017)</td>
                            <td>Action/Adventure/Fantasy</td>
                            <td>Want to watch</td>
                            <!--Width put in to keep stars from changing col size-->
                            <td style = "width:300px"><div class="rateYo"></div></td>
                            <td>N/A</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/it.jpg" alt="It (2017) cover"/></td>
                            <td>It (2017)</td>
                            <td>Drama/Horror/Thriller</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>3.90</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/bladerunner2049.jpg" alt="Blade Runner 2049 cover"/></td>
                            <td>Blade Runner 2049 (2017)</td>
                            <td>Mystery/Sci-fi/Thriller</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>4.25</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/blackpanther.jpg" alt="Black Panther cover"/></td>
                            <td>Black Panther (2018)</td>
                            <td>Action/Drama/Sci-fi</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>N/A</td>
                        </tr>
                        <tr>
                            <td><img class="rounded" src="../images/whatwedointheshadows.jpg" alt="What We Do in the Shadows cover"/></td>
                            <td>What We Do in the Shadows (2014)</td>
                            <td>Comedy/Horror</td>
                            <td>Want to watch</td>
                            <td><div class="rateYo"></div></td>
                            <td>3.80</td>
                        </tr>
                        <tr>
                            <td colspan="5"><a href="#">see more</a></td>
                        </tr>
                    </table>
    <?php }

?>
