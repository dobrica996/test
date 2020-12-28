<?php
session_start();
 include 'includes/class-database.php';
 include 'includes/class-products.php';
 include 'includes/class-comments.php'; 
 include 'includes/class-users.php';
 
?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Citrus Systems</title>
		    <meta name="description" content="Home" />

		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body id="home-page">
<?php  
 include 'includes/header.php';
?>
		<div class="wrapper">
			<?php 
			$database = new database();
			$db = $database->getConnection();
			$db->set_charset("utf8");
			if(isset($_REQUEST['fn'])) {
				$fn = $_REQUEST['fn']; 
			} else {
				$fn = '';				
			}
			
					
			switch ($fn) {
			case 'insert':	
				$errors = array();
				if (empty($_POST["name"])) {
				    $errors[] = "Name is required.";
				}if (empty($_POST["email"])) {
				    $errors[] = "Email is required.";
				}if (empty($_POST["comment"])) {
				    $errors[] = "Comment is required.";
				}
				if(count($errors) > 0) {
		    echo '<ul class="error-list">';
		    foreach ($errors as $value) {
		        echo "<li>$value</li>\n";
		    }
		    echo '</ul>';
					} else {
					    $cm = new Comments ($db);

									$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

									$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

									$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

									if($cm->insertComment($name, $email, $comment)) {
										echo '<p>The comment was recorded in the database.</p>';
									} else	{
										echo '<p>Failed to save comments to database.</p>';
									}
					}
								

				break;

			}
			?>			
			<div class="products clearfix"> 
				<h1>Products</h1>
				<?php 
				$database = new database();
				$db = $database->getConnection();
				$db->set_charset("utf8");

				$pr = new Products($db);
				$data = $pr->getProducts();
				if (is_array($data)) {
					if (count ($data) > 0) {
						foreach($data as $n => $v) {
							echo '<div class="product-item">'."\n";
							echo '<h2>'. $v["name"] . '</h2>'."\n";
							echo '<div class="image-box"><img class="images" src="images/'. $v["image"] . '" alt="'. htmlspecialchars($v["name"]) . '"></div>'."\n";
							echo '<div class="product-description">'. $v["description"] . '</div>'."\n"; 
							echo '</div>'."\n";
						}
					} else {
						echo "<p>No results found</p>\n";
					}
				}
					
				 ?>
			</div>
			<div class="comments-wrapper">
			  <h4>Comments</h4>
			  <?php
			  $cm = new Comments($db);
			  $data2 = $cm->getComments();
			  if (count($data2) > 0) {
			  		echo '<ul class="comments">'."\n";
					foreach($data2 as $n => $v) {
						echo '<li>'. $v["name"] . '</strong><p>'. $v["email"] . '</p><div class="comment-text">'. $v["comment"] . '</div></li>'."\n";
						
					}
					echo '</ul>'."\n";
				} else {
					echo "<p>No comments found</p>\n";
				}
			    ?>
			</div>
			<div class="form-container">
				<form action = "" name = "myForm" method="post" enctype="multipart/form-data">
			                <label for="name">Name</label>
			               <input type="text" name="name" id="name" />

			                <label for="email">E-mail</label>
			               <input type="text" name="email" id="email" />

			                <label for="comment">Comment</label>
			               <textarea rows="6" cols="50" name="comment" id="comment"></textarea>
			               
							<input type = "hidden" name = "fn" value = "insert" />			       
			               <input type = "submit" value = "Submit" name = "submit" />
			      </form>
			  </div>
		</div>


<?php  
 include 'includes/footer.php';
?>
	
	</body>
</html>
