<?php
require_once('../config.php');
?>

<?php
// pag mag path ka ng file gamit ka nito "../"
// Automatic na mag Open and Close yung connection pag nag instantiate ka ng object nito. ( $server = new Server;)
// @Param string   $query - "SELECT INSERT ......."
// @Param array    $data - bind_param
// @Param string   $path - redirect path
// If maiksi lang code integrate mo na lang din sa mismong file nya like yung sa login.php
// yung signup si admin lang makakapg register ng account then si user na bahala mag inputs ng personal info. 
// sorry na par nagulo ko yung code HAHAHAHA



class Server
{

  private $user = USER;
  private $pass = PASS;
  private $host = HOST;
  private $dbname = DBNAME;
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
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . "", $this->user, $this->pass, $this->option);
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


  // ------------------------- LOGIN FUNCTION --------------------------
  public function login($query, $data, $pass, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);




    if ($stmt->rowCount() > 0) {
      while ($result = $stmt->fetch()) {
        $username = $result['username'];
        $password = $result['password'];
        $firstname = $result['firstname'];
        $user_id = $result['id'];
      }
      if (password_verify($pass, $password)) {

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['auth'] = true;


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
    } else {
      $_SESSION['status'] = "Registration Failed!";
      $_SESSION['text'] = "Unable to register account. Please try again.";
      $_SESSION['status_code'] = "error";
    }

    header("location:" . $path . "");
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



  public function fetch($query)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute();
    while ($result = $stmt->fetch()) {
      $id = $result['id'];
      $username = $result['username'];
      $email = $result['email'];
      $phone = $result['phone_number'];
    }
    echo '<tr>
    <td> <?php echo $row["id"] ?> </td>
    <td> <?php echo $row["username"] ?> </td>
    <td> <?php echo $row["email"] ?> </td>
    <td> <?php echo $row["phone_number"] ?> </td>
</tr>';
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







  // ------------------------- SESSION VALIDATION FUNCTION --------------------------
  public function validateSessionLogin()
  {
    // if naka login na, hindi na makakabalik sa log in page ulit

    if (isset($_SESSION['user_id'])) {
      echo "<script>window.location.href='../admin-panel/dashboard.php'</script>";
    }
  }

  // if naka hindi naka login hindi maka direct sa admin page
  public function userAuthentication()
  {
    if (empty($_SESSION['auth'])) {
      echo "<script>window.location.href='../admin/index.php'</script>";
    }
  }
}
// public function fetchJson($query)
// {
//   $connection = $this->conn;
//   $stmt = $connection->prepare($query);
//   $stmt->execute();
//   $output = array();

//   $result = $stmt->fetchAll();
//   $data = array();
//   $filtered_rows = $stmt->rowCount();
//   foreach ($result as $row) {
//     $sub_array = array();

//     $sub_array[] = $row['id'];
//     $sub_array[] = $row['username'];
//     $sub_array[] = $row['email'];
//     $sub_array[] = $row['phone'];
//     $sub_array[] = '	<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-primary btn-sm update">Edit</button>';
//     $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-sm delete">Delete</button>';
//     $data[] = $sub_array;
//   }
//   $output = array(
//     "draw"  => intval($_POST["draw"]),
//     "recordsTotal" => $filtered_rows,
//     "recordsFiltered" => 100,
//     "data" => $data
//   );

//   echo json_encode($output);
// }

?>