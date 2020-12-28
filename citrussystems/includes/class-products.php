<?php
class Products 
{
	private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
	
	public function getProducts() {
		$data = array();
		$sql = "SELECT * FROM products LIMIT 9 ";
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
	
	
}

  ?>