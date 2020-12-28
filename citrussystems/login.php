<?php
session_start();
 include 'includes/class-database.php';
 include 'includes/class-users.php';

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		    <meta name="description" content="prijava na sajt." />

		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body id="other-page">
<?php  
 include 'includes/header.php';
?>
		<div class="wrapper">
			<div class="form-container form-container-login">
				<?php
				if (isset($_POST["submit"])) {
					$database = new Database();
					$db = $database->getConnection();
					$db->set_charset("utf8");
					$us = new Users ($db);

					$username =  $db->real_escape_string($_POST['username']);
					$password =  $db->real_escape_string($_POST['password']);

					if($us->login($username, $password)) {
						header('location: index.php');
					} else	{
						echo 'Failed to login.';
					}

				}
				
				  ?>
		     	<form action = "" name = "myForm" method="post" >
		                <label for="username">Username</label>
		               <input type="text" name="username" id="username" />

		                <label for="password">password</label>
		               <input type="password" name="password" id="password" />
						  
		               <input type = "submit" value = "Submit" name="submit" />
		      </form>
			</div>

		</div>

<?php  
 include 'includes/footer.php';
?>
	
	</body>
</html>