<?php require_once( 'funktion.php' ); ?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php the_title(); ?></title> <!-- Hier muss noch eine php-Funktion erstellt werden-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body class="bg-dark text-white text-center">
<?php include "navbar.php" ?>
	<br>
	<h1><?php the_title();?></h1>
	<br>
	<h2><?php the_subtitle();?></h2>
	<span class="meta">Erstellt von <?php the_autor();?>, am <?php the_date();?></span>
	<br>
	<br>
	<img src="<?php the_image_url(); ?>" class="roundet" alt="???">
</body>