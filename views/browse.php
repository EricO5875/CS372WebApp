<!--

A page for browsing for different media

-->
         
        <div class="container">
            <h2>Browse</h2>
            
            <ul class="tabs">
        		<li class="tab-link <?php echo htmlspecialchars($media) == 'movies' ? 'current' : '' ?>" data-tab="tab-1" name="movietab">Movies</li>
        		<li class="tab-link <?php echo htmlspecialchars($media) == 'tv_shows' ? 'current' : '' ?>" data-tab="tab-2" name = "tvtab">TV Shows</li>
        		<li class="tab-link <?php echo htmlspecialchars($media) == 'books' ? 'current' : '' ?>" data-tab="tab-3" name = "booktab">Books</li>
        	</ul>
            
            <div id="tab-1" class="tab-content <?php echo htmlspecialchars($media) == 'movies' ? 'current' : '' ?>">
  
            <h2>Movies</h2>
            <a name = "movies"></a><h4 id>New Releases</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/thankyouforyourservice.jpg" alt="Thank You for Your Service cover"/></td>
                    <td><img class="rounded" src="../images/thorragnarok.jpg" alt="Thor Ragnarok cover"/></td>
                    <td><img class="rounded" src="../images/boo2.jpg" alt="Boo 2! cover"/></td>
                    <td><img class="rounded" src="../images/onlythebrave.jpg" alt="Only the Brave cover"></td>
                    <td><img class="rounded" src="../images/geostorm.jpg" alt="Geostorm cover"/></td>
                    <td><img class="rounded" src="../images/HappyDeathDay.jpg" alt="Happy Death Day cover"/></td>
                    <td><img class="rounded" src="../images/thesnowman.jpg" alt="The Snowman cover"/></td>
                    <td><img class="rounded" src="../images/bladerunner2049.jpg" alt="Blade Runner 2049 cover"/></td>
                    <td><img class="rounded" src="../images/flatliners.jpg" alt="Flatliners cover"/></td>
                    
                
            </table>
        
            <a name = "movies"></a><h4 id>Most Popular</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/bladerunner2049.jpg" alt="Blade Runner 2049 cover"/></td>
                    <td><img class="rounded" src="../images/thelastjedi.jpg" alt="The Last Jedi cover"/></td>
                    <td><img class="rounded" src="../images/bladerunner.jpg" alt="Blade Runner cover"/></td>
                    <td><img class="rounded" src="../images/it.jpg" alt="It (2017) cover"/></td>
                    <td><img class="rounded" src="../images/justiceleague.jpg" alt="Justice League cover"/></td>
                    <td><img class="rounded" src="../images/kingsmanthegoldencircle.jpg" alt="Kingsman: The Golden Circle cover"/></td>
                    <td><img class="rounded" src="../images/professormarstonandthewonderwomen.jpg" alt="Professor Marston and the Wonder Women cover"/></td>
                    <td><img class="rounded" src="../images/thedarktower.jpg" alt="The Dark Tower cover"/></td>
                    <td><img class="rounded" src="../images/thorragnarok.jpg" alt="Thor Ragnarok cover"/></td>
                </tr>
                
            </table>
        
            <a name = "movies"></a><h4 id>Recommended for You</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/thelastjedi.jpg" alt="The Last Jedi cover"/></td>
                    <td><img class="rounded" src="../images/it.jpg" alt="It (2017) cover"/></td>
                    <td><img class="rounded" src="../images/bladerunner2049.jpg" alt="Blade Runner 2049 cover"/></td>
                    <td><img class="rounded" src="../images/blackpanther.jpg" alt="Black Panther cover"/></td>
                    <td><img class="rounded" src="../images/whatwedointheshadows.jpg" alt="What We Do in the Shadows cover"/></td>
                    <td><img class="rounded" src="../images/thesnowman.jpg" alt="The Snowman cover"/></td>
                    <td><img class="rounded" src="../images/littlemisssunshine.jpg" alt="Little Miss Sunshine cover"/></td>
                    <td><img class="rounded" src="../images/ipman.jpg" alt="Ip Man cover"/></td>
                    <td><img class="rounded" src="../images/justiceleague.jpg" alt="Justice League cover"/></td>
                </tr>
                
            </table>
        </div>
                
        <div id="tab-2" class="tab-content <?php echo htmlspecialchars($media) == 'tv_shows' ? 'current' : '' ?>">
            <h2>TV Shows</h2>
            <a name = "tvshows"></a><h4 id>New Releases</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/strangerthings.jpg" alt="Stranger Things cover"/></td>
                    <td><img class="rounded" src="../images/curbyourenthusiasm.jpg" alt="Curb Your Enthusiasm cover"/></td>
                    <td><img class="rounded" src="../images/glow.jpg" alt="GLOW cover"/></td>
                    <td><img class="rounded" src="../images/theWalkingDead.jpg" alt="The Walking Dead cover"/></td>
                    <td><img class="rounded" src="../images/theflash.jpg" alt="The Flash cover"/></td>
                    <td><img class="rounded" src="../images/thehandmaidstale.jpg" alt="The Handmaid's Tale cover"/></td>
                    <td><img class="rounded" src="../images/thedefenders.jpg" alt="The Defenders cover"/></td>
                    <td><img class="rounded" src="../images/startrekdiscovery.jpg" alt="Star Trek Discovery cover"/></td>
                    <td><img class="rounded" src="../images/theorville.jpg" alt="The Orville cover"/></td>
                </tr>
                
            </table>
        
            <a name = "tvshows"></a><h4 id>Most Popular</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/Supernatural.jpg" alt="Supernatural cover"/></td>
                    <td><img class="rounded" src="../images/gameofthrones.jpg" alt="Game of Thrones cover"/></td>
                    <td><img class="rounded" src="../images/theWalkingDead.jpg" alt="The Walking Dead cover"/></td>
                    <td><img class="rounded" src="../images/suits.jpg" alt="Suits cover"/></td>
                    <td><img class="rounded" src="../images/greysanatomy.jpg" alt="Grey's Anatomy cover"/></td>
                    <td><img class="rounded" src="../images/thevampirediaries.jpg" alt="The Vampire Diaires cover"/></td>
                    <td><img class="rounded" src="../images/arrow.jpg" alt="Arrow cover"/></td>
                    <td><img class="rounded" src="../images/vikings.jpg" alt="Vikings cover"/></td>
                    <td><img class="rounded" src="../images/theflash.jpg" alt="The Flash cover"/></td>
                </tr>
                
            </table>
        
            <a name = "tvshows"></a><h4 id>Recommended for You</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/strangerthings.jpg" alt="Stranger Things cover"/></td>
                    <td><img class="rounded" src="../images/curbyourenthusiasm.jpg" alt="Curb Your Enthusiasm cover"/></td>
                    <td><img class="rounded" src="../images/glow.jpg" alt="GLOW cover"/></td>
                    <td><img class="rounded" src="../images/thesopranos.jpg" alt="The Sopranos cover"/></td>
                    <td><img class="rounded" src="../images/gameofthrones.jpg" alt="Game of Thrones cover"/></td>
                    <td><img class="rounded" src="../images/thehandmaidstale.jpg" alt="The Handmaid's Tale cover"/></td>
                    <td><img class="rounded" src="../images/theWalkingDead.jpg" alt="The Walking Dead cover"/></td>
                    <td><img class="rounded" src="../images/theflash.jpg" alt="The Flash cover"/></td>
                    <td><img class="rounded" src="../images/thedefenders.jpg" alt="The Defenders cover"/></td>
                    
                </tr>
                
            </table>
        </div>
        <div id="tab-3" class="tab-content <?php echo htmlspecialchars($media) == 'books' ? 'current' : '' ?>">

            <h2>Books</h2>
            <a name = "books"></a><h4 id>New Releases</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/leonardodavinci.jpg" alt="Leonardo Da Vinci cover"/></td>
                    <td><img class="rounded" src="../images/americanradical.jpg" alt="American Radical cover"/></td>
                    <td><img class="rounded" src="../images/origin.jpg" alt="Origin cover"/></td>
                    <td><img class="rounded" src="../images/thesunandherflowers.jpg" alt="The Sun and Her Flowers cover"/></td>
                    <td><img class="rounded" src="../images/turtlesallthewaydown.jpg" alt="Turtles All the Way Down cover"/></td>
                    <td><img class="rounded" src="../images/thewisdomofsundays.jpg" alt="The Wisdom of Sundays cover"/></td>
                    <td><img class="rounded" src="../images/theroosterbar.jpg" alt="The Rooster Bar cover"/></td>
                    <td><img class="rounded" src="../images/thegetaway.jpg" alt="The Getaway cover"/></td>
                    <td><img class="rounded" src="../images/disciplineequalsfreedom.jpg" alt="Discipline Equals Freedom cover"/></td>
                </tr>
                
            </table>
        
            <a name = "books"></a><h4 id>Most Popular</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/thehungergames.jpg" alt="The Hunger Games cover"/></td>
                    <td><img class="rounded" src="../images/harrypotterandtheorderofthephoenix.jpg" alt="Harry Potter cover"/></td>
                    <td><img class="rounded" src="../images/tokillamockingbird.jpg" alt="To Kill a Mockingbird cover"/></td>
                    <td><img class="rounded" src="../images/prideandprejudice.jpg" alt="Pride and Prejudice cover"/></td>
                    <td><img class="rounded" src="../images/twilight.jpg" alt="Twilight cover"/></td>
                    <td><img class="rounded" src="../images/thebookthief.jpg" alt="The Book Thief cover"/></td>
                    <td><img class="rounded" src="../images/animalfarm.jpg" alt="Animal Farm cover"/></td>
                    <td><img class="rounded" src="../images/gonewiththewind.jpg" alt="Gone with the Wind cover"/></td>
                    <td><img class="rounded" src="../images/thelionthewitchandthewardrobe.jpg" alt="The Lion, the Witch, and the Wardrobe cover"/></td>
                </tr>
                
            </table>
        
            <a name = "books"></a><h4 id>Recommended for You</h4></a>

            <table class="table table-striped">
 
                <tr>
                    <td><img class="rounded" src="../images/turtlesallthewaydown.jpg" alt="Turtles All the Way Down cover"/></td>
                    <td><img class="rounded" src="../images/leonardodavinci.jpg" alt="Leonardo Da Vinci cover"/></td>
                    <td><img class="rounded" src="../images/americanradical.jpg" alt="American Radical cover"/></td>
                    <td><img class="rounded" src="../images/origin.jpg" alt="Origin cover"/></td>
                    <td><img class="rounded" src="../images/theroosterbar.jpg" alt="The Rooster Bar cover"/></td>
                    <td><img class="rounded" src="../images/animalfarm.jpg" alt="Animal Farm cover"/></td>
                    <td><img class="rounded" src="../images/thebookthief.jpg" alt="The Book Thief cover"/></td>
                    <td><img class="rounded" src="../images/TheShipoftheDead.jpg" alt="The Ship of the Dead cover"/></td>
                    <td><img class="rounded" src="../images/agameofthrones.jpg" alt="A Game of Thrones cover"/></td>
                </tr>
                
            </table>
        </div>
    </div>
       
