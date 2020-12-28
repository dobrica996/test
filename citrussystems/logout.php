<?php
session_start();
 include 'includes/class-database.php';
 include 'includes/class-users.php';

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Logout</title>
		    <meta name="description" content="Logout." />

		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body id="home-page">
<?php  
 include 'includes/header.php';
?>
		<div class="wrapper">
			<?php
			$database = new Database();
					$db = $database->getConnection();
					$db->set_charset("utf8");
					if(Users::logOut()) {
					 	header('location: index.php');
					} 

			 ?>

		</div>

<?php  
 include 'includes/footer.php';
?>
	
	</body>
</html>