		<header class="clearfix">
			<div class="wrapper">
				<h2>Citrus Systems</h2>
			</div>
			<nav>
				<div class="wrapper">
					<ul class="">
						<li><a href="index.php">Home</a></li>
						<?php
							$database = new Database();
							$db = $database->getConnection();
							$db->set_charset("utf8");
							if(Users::isLoggedIn()) {
								?>
								<li><a href="comments.php">Comments</a></li>
								<li><a href="logout.php">Logout</a></li>
								<?php  
							} else {
								?>
								<li><a href="login.php">Login</a></li>
								 <?php

							}
						 ?>

					</ul>
				</div>
			</nav>
		</header>