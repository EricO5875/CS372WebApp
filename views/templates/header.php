<?php
/*
	A header for pages
*/
?>

<!DOCTYPE html>

    <html lang="en">
        
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title><?php echo htmlspecialchars($title) ?></title>
        
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom styles for this website -->
        <link href="../css/custom.css" rel="stylesheet">
    
        <!-- CSS for RateYo Jquery star rating plugin -->
        <link rel="stylesheet" href="../bower_components/rateYo/min/jquery.rateyo.min.css"/>
        
    </head>
    <body>
        
        <?php require('navbar.php'); ?>