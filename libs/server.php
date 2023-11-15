<?php
require_once('config.php');
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

?>

<?php
// pag mag path ka ng file gamit ka nito "../"
// Automatic na mag Open and Close yung connection pag nag instantiate ka ng object nito. ( $server = new Server;)
// @Param string   $query - "SELECT INSERT ......."
// @Param array    $data - bind_param
// @Param string   $path - redirect path
// If maiksi lang code integrate mo na lang din sa mismong file nya like yung sa login.php
// yung signup si admin lang makakapg register ng account then si user na bahala mag inputs ng personal info. 




class Server
{
  // pati to pa change, iba kasi configuration ng database natin
  private $user = LESUSER; 
  private $pass = LESPASS;
  private $lesDBname = LESDBNAME;
  private $port = PORT;

  // private $user = USER; 
  // private $pass = PASS;
  private $host = HOST;
  private $dbname = DBNAME;
  // private $port = PORT;
  private $dsn;
  private $conn;
  private $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);



  // ------------------------- OPEN CONNECTTION UPON INITIATION --------------------------
  public function __construct()
  {
    $this->openConn();
  }


  // ------------------------- CLOSE CONNECTTION UPON INITIATION --------------------------
  public function __destruct()
  {
    $this->closeConn();
  }


  // ------------------------- OPEN CONNECTTION FUNCTION --------------------------
  public function openConn()
  {

    try {
      // ken pabago nalng to ah HAHAHAH 
      $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass, $this->option);
      return $this->conn;
    } catch (PDOException $e) {
      die("connection failed" . $e->getMessage());
    }
  }


  // ------------------------- CLOSE CONNECTTION FUNCTION --------------------------
  public function closeConn()
  {
    try {
      $this->conn = null;
    } catch (PDOException $e) {
      die("connection close failed" . $e->getMessage());
    }
  }

  public function userLogin($query, $data, $pass, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
        while ($result = $stmt->fetch()) {
            $password = $result['pwd']; // Change 'pwd' to 'password' if needed
            $user_id = $result["id"];
            $username = $result["username"];
        }

        if (password_verify($pass, $password)) {
            // Password is correct
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user_id;
            header("location:" . $path . "");
        } else {
            // Password is incorrect
            $_SESSION['status'] = "Login Failed!";
            $_SESSION['text'] = "Wrong Password";
            $_SESSION['status_code'] = "error";
        }
    } else {
      // Username doesn't exist
      $_SESSION['status'] = "Login Failed!";
      $_SESSION['text'] = "Username doesn't exist.";
      $_SESSION['status_code'] = "error";
    }
  }


  // ------------------------- LOGIN FUNCTION --------------------------
  public function login($query, $data, $pass, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);




    if ($stmt->rowCount() > 0) {
      while ($result = $stmt->fetch()) {
        // $username = $result['username'];
        $password = $result['password'];
        $firstname = $result['firstname'];
        $user_id = $result['id'];
        $account_number = $result['account_number'];
      }
      if (password_verify($pass, $password)) {

        // $_SESSION['username'] = $username;
        // $_SESSION['password'] = $password;
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['account_number'] = $account_number;

        // pass the value to adminAuthentication()
        // para
        $_SESSION['admin_auth'] = true;

        // Activity log
        $action = "Logged in the system";
        $time_log = date("Y-m-d H:i:sA", strtotime("now"));
        $query_log = "INSERT INTO activity_log (account_number, firstname, action, date) VALUES (:account_number, :firstname, :action, :date)";
        $data_log = [
          "account_number" => $account_number,
          "firstname" => $firstname,
          "action" => $action,
          "date" => $time_log
        ];
        $stmt = $connection->prepare($query_log);
        $stmt->execute($data_log);
        $count = $stmt->rowCount();
        if ($count > 0) {
        } else {
          $_SESSION['status'] = "Warning";
          $_SESSION['text'] = "Something went wrong.";
          $_SESSION['status_code'] = "warning";
        }


        header("location:" . $path . "");
      }
      // Pup op alert if password doesn't exist
      else {
        $_SESSION['status'] = "Login Failed!";
        $_SESSION['text'] = "Wrong Password";
        $_SESSION['status_code'] = "error";
      }
    }
    // Pop up alert if Username doesn't exist.
    else {
      $_SESSION['status'] = "Login Failed!";
      $_SESSION['text'] = "Username doesn't exist.";
      $_SESSION['status_code'] = "error";
    }
  }


  // Verify passowrd when deleting account
  public function verifyPassword($query, $data, $pass, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);


    if ($stmt->rowCount() > 0) {
      while ($result = $stmt->fetch()) {

        $password = $result['password'];
      }
      if (password_verify($pass, $password)) {
        return true;
      }
      // Pup op alert if password doesn't exist
      else {
      }
    }
    // Pop up alert if Username doesn't exist.
    else {
    }
    header("location:" . $path . "");
  }


  // ------------ REGISTER ACCOUNT ADMIN ---------------
  public function register($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
      $_SESSION['status'] = "Registration Success!";
      $_SESSION['text'] = "Your account has been successfully created.";
      $_SESSION['status_code'] = "success";
      header("location:" . $path . "");
    } else {
      $_SESSION['status'] = "Registration Failed!";
      $_SESSION['text'] = "Unable to register account. Please try again.";
      $_SESSION['status_code'] = "error";
      header("location:" . $path . "");
    }
  }

  public function update($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount()) {
    }
    header("location:" . $path . "");
  }


  // DELETE ACCOUNT
  public function delete($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount()) {
      $_SESSION['status'] = "Account Deleted";
      $_SESSION['text'] = "The account has been permanently deleted";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Account Deletion Failed!";
      $_SESSION['text'] = "You input a wrong password";
      $_SESSION['status_code'] = "error";
    }
    header("location:" . $path . "");
  }



  // UpdatePassword
  public function updateUser($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
      $_SESSION['status'] = "Change Password Success!";
      $_SESSION['text'] = "Your password has been successfully updated.";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Change Password Failed!";
      $_SESSION['text'] = "Unable to change your password. Please try again.";
      $_SESSION['status_code'] = "error";
    }
    header("location:" . $path . "");
  }

  // Update Profile Picture
  public function updatePhoto($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
      $_SESSION['status'] = "Change Photo Success!";
      $_SESSION['text'] = "Your profile picture has been successfully updated.";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Change Photo Failed!";
      $_SESSION['text'] = "Unable to change your profile picture. Please try again.";
      $_SESSION['status_code'] = "error";
    }
    header("location:" . $path . "");
  }



  public function insert($query, $data){
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    
    if($stmt->rowCount() > 0 ){

    } else {

    }
   
    
  }





  public function checkUsername($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {

      header("location:" . $path . "");

      return true;
    } else {
      return false;
    }
  }

  public function checkAccountNumber($query)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {



      return true;
    } else {
      return false;
    }
  }


  public function insertActivityLog($action)
  {

    $account_number = $_SESSION['account_number'];
    $firstname = $_SESSION['firstname'];
    $time_log = date("Y-m-d H:i:sA", strtotime("now"));

    $query = "INSERT INTO activity_log (account_number, firstname, action, date) VALUES (:account_number, :firstname, :action, :date)";
    $data = [
      "account_number" => $account_number,
      "firstname" => $firstname,
      "action" => $action,
      "date" => $time_log
    ];


    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $rowCount = $stmt->rowCount();



    if ($rowCount) {
    } else {
      $_SESSION['status'] = "Warning";
      $_SESSION['text'] = "Something went wrong.";
      $_SESSION['status_code'] = "warning";
    }
  }





  // ------------------------- SESSION VALIDATION FUNCTION --------------------------


  // if naka login na, hindi na makakabalik sa log in page ulit
  public function adminSessionLogin()
  {
    if (isset($_SESSION['admin_id'])) {
      echo "<script>window.location.href='../admin-panel/dashboard.php'</script>";
    }
  }


  // if hindi naka login, hindi makaka access sa admin page, then babalik lang sa login page
  public function adminAuthentication()
  {
    if (empty($_SESSION['admin_auth'])) {
      echo "<script>window.location.href='../admin/index.php'</script>";
    }
  }
}

?>