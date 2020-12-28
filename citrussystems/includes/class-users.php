 <?php 
class Users 
{
	private $conn;

    public function __construct($db){
        $this->conn = $db;
    } 

    public static function isLoggedIn() {
        if (isset($_SESSION['user_session'])) {
            return true;
        } else {
        	return false;
        }
    }

    public static function logOut() {

        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }	
	
	public function login($username, $password) {
		$sql = "SELECT * FROM users WHERE username='$username' AND password='".sha1($password)."'";
		$result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
			$_SESSION['user_session'] = $result->fetch_object()->id;
			return true;
		} else {
			return false;
		}	
	}

}
  ?>
