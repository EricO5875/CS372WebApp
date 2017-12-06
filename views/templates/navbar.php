<?php
/*
	A navbar for pages
*/
?>        

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="control.php?page=home">Entertainment Center</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="control.php?page=home">Home
                                 <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php 
                            if($_SESSION['authenticated'])
                            {
                               echo "<li class='nav-item'><a class='nav-link' href='control.php?page=queue'>My Queue</a></li>";
                            }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Browse
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="control.php?page=browse&media=movies">Movies</a>
                                <a class="dropdown-item" href="control.php?page=browse&media=tv_shows">Tv Shows</a>
                                <a class="dropdown-item" href="control.php?page=browse&media=books">Books</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="control.php?page=aboutUs">About Us</a>
                        </li>
                    </ul>
                    
                    <form class="form-inline my-2 my-lg-0" id='searchForm' method='get' action='control.php'>
                        <input type="text" name="page" style='display:none;' value="search">
                        <input class="form-control mr-sm-2" id='search' type="text" list="datalist" 
                            placeholder="Search" name="search" value="<?php if (isset($_GET['search'])) echo htmlspecialchars($_GET['search']); ?>">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
                    </form>
              
                    <ul class="navbar-nav ml-auto">
                        <?php 
                            if($_SESSION['authenticated'])
                            { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <img src="../images/person.JPG" width="30" height="30" class="d-inline-block align-top" alt="My Profile"/>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">View Profile</a>
                                        <a class="dropdown-item" href="#">Account Settings</a>
                                        <a class="dropdown-item" href="control.php?page=home&logout=1">Logout</a>
                                    </div>   
                                    </a>
                                </li>
                            <?php }
                            else 
                            { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="control.php?page=login">Login<span class="glyphicon glyphicon-log-in"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="control.php?page=signup">Sign up<span class="glyphicon glyphicon-edit"></span></a>
                                </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        