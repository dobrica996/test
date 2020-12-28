<?php
class database {
  
    private $servername = "localhost";
    private $dbname = "citrus_systems";
    private $username = "username";
    private $password = "password";
    public $conn;
  
    public function getConnection(){
  
        $this->conn = null;
		
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
        return $this->conn;
		
    }
} 

 ?>