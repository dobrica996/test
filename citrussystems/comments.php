<?php
session_start();
 include 'includes/class-database.php';
 include 'includes/class-comments.php'; 
 include 'includes/class-users.php';

$database = new Database();
$db = $database->getConnection();
$db->set_charset("utf8");
if(!Users::isLoggedIn()) {
	header('location: index.php');	

}
 
?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Comments</title>
		    <meta name="description" content="Comments" />

		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body id="page">
<?php  
 include 'includes/header.php';
?>
		<div class="wrapper">
			<?php 
			if(isset($_REQUEST['fn'])) {
				$fn = $_REQUEST['fn']; 
			} else {
				$fn = '';				
			}	
			$cm = new Comments($db);
					
			
				switch ($fn) {
				case 'update':
					$comment_id = intval($_GET['id']);					 
					if($cm->approveComment($comment_id)) {
						echo '<br>Data saved in database.';
					} else	{
						echo '<br>Failed to save data.';
					}

				break;
				
			}
			?>
			<h1>Comments</h1>
			
			<?php 

			
			$result = $cm->getComments(0);
			if (is_array($result)) {
				?>
					<table id="table" class = "class-comments" >
					  <tr>
					    <th>Comment</th>					    
					    <th>Approve</th>
					    
					  </tr>

				<?php

				foreach($result as $n => $v) {
					?>
					  <tr>
					    <td>
					    	<p><strong><?php echo $v["name"]; ?></strong></p>
					    	<p><?php echo $v["email"]; ?></p>
					    	<p><?php echo $v["comment"]; ?></p>
					    </td>
					    <td><?php echo '<a href="comments.php?fn=update&id='.$v["id"].'">Approve</a>'; ?> </td>

					  </tr>
					<?php
				}
				?>
				</table>
				<?php
			} else {
				echo "0 results";
			}
			 ?>
		</div>


<?php  
 include 'includes/footer.php';
?>
	
	</body>
</html>