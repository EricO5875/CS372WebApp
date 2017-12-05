<!--

A controller for entertainmentcenter.com

-->

<?php require_once('../includes/helpers.php'); 

    // determine which page to render
    if (isset($_GET['page']))
    	$page = $_GET['page'];
    else
    	$page = 'home';
    // show page
    switch ($page)
    {
    	case 'home':
    		render('templates/header', array('title' => 'Entertainment Center')); 
    		render('home');
    		break;
    
        case 'queue':
    		render('templates/header', array('title' => 'My Queue'));
    		render('queue');
    		break;
    		
    	case 'browse':
    		render('templates/header', array('title' => 'Browse '. $_GET['media']));
    		render('browse', array('media' => $_GET['media']));
    		break;
    
    	case 'aboutUs':
    		render('templates/header', array('title' => 'About us'));
    		render('aboutUs');
    		break;
    	
    	case 'login':
    		render('templates/header', array('title' => 'Login'));
    		render('login');
    		break;
    		
    	case 'signup':
    		render('templates/header', array('title' => 'Sign up'));
    		render('signup');
    		break;
    		
    	case 'search':
    		render('templates/header', array('title' => 'Search results'));
    		render('search', array('search' => $_GET['search']));
    		break;
    		
    	case 'view':
    		render('templates/header', array('title' => $_GET['title']));
    		render('view', array('id' => $_GET['id'], 'media' => $_GET['media']));
    		break;
    		
    }
    
    	render('templates/footer');

?>

