<?php
class Comments {
	private $conn;

    public function __construct($db){ 
        $this->conn = $db; 
    }
	
	public function getComments($approved = 1) 
	{
		$sql = "SELECT * FROM comments WHERE approved=$approved"; 
		$result = $this->conn->query($sql); 

		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
				$data[] = $row;
				
			}
			return $data;																								
		} else {
			return false;
		}	
	}	

	public function insertComment($name, $email, $comment) 
	{
		$sql = "INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`) VALUES (NULL, '$name','$email', '$comment', 0);";
		$result = $this->conn->query($sql);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}	

	public function approveComment($id) 
	{
	 
		$sql = "UPDATE comments SET approved = 1 WHERE id = {$id}";
		echo "sql $sql";

		$result = $this->conn->query($sql);

		if ($result === TRUE) {
			return true;
		} else {
			return false;
		}		
	}
	
} 

  ?>