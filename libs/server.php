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
  //private $lesDBname = LESDBNAME;
  private $port = PORT;

  // private $user = USER;
  // private $pass = PASS;
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


  // for announcement carousel only
  public function conn()
  {
    // Lesther
    $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname, $this->port);

    //Ken
    // $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    return $conn;
  }

  // ------------------------- OPEN CONNECTTION FUNCTION --------------------------
  public function openConn()
  {

    try {
      // Lesther 
      $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass, $this->option);

      // Ken
      // $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass, $this->option);

      //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass, $this->option);
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
        $password = $result['password']; // Change 'pwd' to 'password' if needed
        $user_id = $result["id"];
        $username = $result["username"];
        $firstname = $result["firstname"];
        $lastname = $result["lastname"];
      }

      if (password_verify($pass, $password)) {
        // Password is correct
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_firstname"] = $firstname;
        $_SESSION["user_lastname"] = $lastname;
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


  // get announcement
  public function getAnnouncement()
  {

    $connection = $this->conn;
    $query = "SELECT * FROM announcement ORDER BY date ASC";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      while ($result = $stmt->fetchAll()) {
        $id = $result['id'];
        $about = $result['about'];
        $content = $result['content'];
        $date = $result['date'];
      }

      $_SESSION['about'] = $about;
      $_SESSION['content'] = $content;
      $_SESSION['date'] = $date;
    }
  }

  // carousel functionality
  public function pagination($numberofPage)
  {
    // Lesther
    $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname, $this->port);

    //Ken
    // $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);



    if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
      $page_no = $_GET['page_no'];
    } else {
      $page_no = 1;
    }




    $result_count = mysqli_query($connection, "SELECT COUNT(status) AS total_records FROM announcement WHERE status = 'ACTIVE'");
    $total_records_per_page = $numberofPage;
    $offset = ($page_no - 1) * $total_records_per_page;




    $query = "SELECT * FROM announcement WHERE status = 'ACTIVE' ORDER  BY date DESC LIMIT $offset, $total_records_per_page";

    $prev_page = $page_no - 1;
    $next_page = $page_no + 1;




    $result = mysqli_query($connection, $query);

    $result_count = mysqli_query($connection, "SELECT COUNT(status) as total_records FROM announcement WHERE status = 'ACTIVE'") or die(mysqli_error($connection));
    $records = mysqli_fetch_array($result_count);
    $total_records = $records['total_records'];
    $total_number_per_page = ceil($total_records / $total_records_per_page);



    return array(
      "result" => $result,
      "page_no" => $page_no,
      "prev_page" => $prev_page,
      "next_page" => $next_page,
      "total_number_per_page" => $total_number_per_page
    );
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
        $type = $result['type'];
      }
      if (password_verify($pass, $password)) {

        // $_SESSION['username'] = $username;
        // $_SESSION['password'] = $password;
        $_SESSION['type'] = $type;
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
  public function verifyPassword($query, $data, $pass)
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
      $_SESSION['text'] = "Account has been successfully registered.";
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





  public function insert($query, $data)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
      $_SESSION['status'] = "Registration Success!";
      $_SESSION['text'] = "Property has been successfully registered.";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Registration Failed!";
      $_SESSION['text'] = "Unable to register property. Please try again.";
      $_SESSION['status_code'] = "error";
    }
  }


  public function insertPhase($query, $data, $path)
  {
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
      $_SESSION['status'] = "Success!";
      $_SESSION['text'] = "Phase successfuly added.";
      $_SESSION['status_code'] = "success";
    } else {
    }
    header("location:" . $path . "");
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






  // -------  AUTO INSERT COLLECTION FUNCTION ----------
  public function insertCollection()
  {

    // -------  AUTO INSERT COLLECTION FUNCTION ----------
    $current_date = date("Y-m-d H:i:s", strtotime("now"));
    $current_month = date("F", strtotime("now"));
    $current_year = date("Y", strtotime("now"));
    $current_day = date("j", strtotime("now"));
    $first_day_month = date("j", strtotime("first day of this month"));
    $month = date("m", strtotime("now"));
    $year = date("Y", strtotime("now"));


    // Get all id in the proeprty list
    $query1 = "SELECT * FROM property_list";
    $connection1 = $this->conn;
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute();

    if ($stmt1->rowCount() > 0) {
      while ($property_row = $stmt1->fetch()) {
        $property_list_id = $property_row['id'];
        $property_list_phase = $property_row['phase'];
        // It validates if there is already a collection for this month and year
        $query2 = "SELECT * FROM collection_list WHERE property_id = :property_list_id AND month = :current_month AND year = :current_year";
        $data2 = [
          'property_list_id' => $property_list_id,
          'current_month' => $current_month,
          'current_year' => $current_year
        ];
        $connection2 = $this->conn;
        $stmt2 = $connection2->prepare($query2);
        $stmt2->execute($data2);

        if ($stmt2->rowCount() > 0) {
        } else {

          // get the current monthly dues fee
          $monthly_dues = "Monthly Dues";
          $query3 = "SELECT * FROM collection_fee WHERE category = :category";
          $data3 = ["category" => $monthly_dues];
          $connection3 = $this->conn;
          $stmt3 = $connection3->prepare($query3);
          $stmt3->execute($data3);
          if ($stmt3->rowCount() > 0) {
            while ($result = $stmt3->fetch()) {
              $collection_fee_id = $result['id'];
              $collection_fee = $result['fee'];
            }

            // Check the date
            $array_month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October",  "November", "December");
            foreach($array_month as $x){
              $status = "AVAILABLE";
              $month_int = date("m", strtotime($x));
                $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, balance, status, month, month_int, year) VALUES (:property_id, :collection_fee_id, :date_created, :balance, :status, :month, :month_int, :year)";
                $data4 = [
                  "property_id" => $property_list_id,
                  "collection_fee_id" => $collection_fee_id,
                  "date_created" => $current_date,
                  "balance" => $collection_fee,
                  "status" => $status,
                  "month" => $x,
                  "month_int" => $month_int,
                  "year" => $current_year
                ];
                $connection4 = $this->conn;
                $stmt4 = $connection4->prepare($query4);
                $stmt4->execute($data4);
            }

            // if ($property_list_phase == "Phase 1" && ($current_day >= $day_range = date("j", mktime(0, 0, 0, $month, 1, $year)) && $current_day <= $day_range = date("j", mktime(0, 0, 0, $month, 7, $year)))) {
            //   $status = "AVAILABLE";
            //   $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, balance, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :balance, :status, :month, :year)";
            //   $data4 = [
            //     "property_id" => $property_list_id,
            //     "collection_fee_id" => $collection_fee_id,
            //     "date_created" => $current_date,
            //     "balance" => $collection_fee,
            //     "status" => $status,
            //     "month" => $current_month,
            //     "year" => $current_year
            //   ];
            //   $connection4 = $this->conn;
            //   $stmt4 = $connection4->prepare($query4);
            //   $stmt4->execute($data4);
            // }
            // if ($property_list_phase == "Phase 2" && ($current_day >= $eight_day = date("j", mktime(0, 0, 0, $month, 8, $year)) && $current_day <= $eight_day = date("j", mktime(0, 0, 0, $month, 14, $year)))) {
            //   $status = "AVAILABLE";
            //   $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, balance, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :balance, :status, :month, :year)";
            //   $data4 = [
            //     "property_id" => $property_list_id,
            //     "collection_fee_id" => $collection_fee_id,
            //     "date_created" => $current_date,
            //     "balance" => $collection_fee,
            //     "status" => $status,
            //     "month" => $current_month,
            //     "year" => $current_year
            //   ];
            //   $connection4 = $this->conn;
            //   $stmt4 = $connection4->prepare($query4);
            //   $stmt4->execute($data4);
            // }
            // if ($property_list_phase == "Phase 3" && ($current_day <= $day_range = date("j", mktime(0, 0, 0, $month, 21, $year)) && $current_day >= $day_range = date("j", mktime(0, 0, 0, $month, 15, $year)))) {
            //   $status = "AVAILABLE";
            //   $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, balance, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :balance, :status, :month, :year)";
            //   $data4 = [
            //     "property_id" => $property_list_id,
            //     "collection_fee_id" => $collection_fee_id,
            //     "date_created" => $current_date,
            //     "balance" => $collection_fee,
            //     "status" => $status,
            //     "month" => $current_month,
            //     "year" => $current_year
            //   ];
            //   $connection4 = $this->conn;
            //   $stmt4 = $connection4->prepare($query4);
            //   $stmt4->execute($data4);
            // }

          } else {
            $_SESSION['status'] = "There is no current fee for monthly duess";
            $_SESSION['text'] = "";
            $_SESSION['status_code'] = "warning";
          }
        }
      }
    }



    $available = "AVAILABLE";
    $query5 = "SELECT 
collection_list.id,
collection_list.status,
collection_list.month,
collection_list.year,
collection_list.property_id,
property_list.phase
FROM collection_list INNER JOIN property_list WHERE collection_list.property_id = property_list.id AND collection_list.status = :available AND year =:current_year";
    $data5 = ["available" => $available, "current_year" => $current_year];
    $connection5 = $this->conn;
    $stmt5 = $connection5->prepare($query5);
    $stmt5->execute($data5);
    if ($stmt5->rowCount() > 0) {
      while ($result_collection_list = $stmt5->fetch()) {
        $collection_id = $result_collection_list['id'];
        $collection_list_month = $result_collection_list['month'];
        $collection_list_year = $result_collection_list['year'];
        $phase = $result_collection_list['phase'];



        if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 1" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 8, $year))) {
          $due = "DUE";
          $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
          $data6 = ["due" => $due, "collection_list_id" => $collection_id];
          $connection6 = $this->conn;
          $stmt6 = $connection6->prepare($query6);
          $stmt6->execute($data6);
        }
        if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 2" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 15, $year))) {
          $due = "DUE";
          $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
          $data6 = ["due" => $due, "collection_list_id" => $collection_id];
          $connection6 = $this->conn;
          $stmt6 = $connection6->prepare($query6);
          $stmt6->execute($data6);
        }
        if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 3" && $current_day >= $twenty_second_day = date("j", mktime(0, 0, 0, $month, 22, $year))) {
          $due = "DUE";
          $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
          $data6 = ["due" => $due, "collection_list_id" => $collection_id];
          $connection6 = $this->conn;
          $stmt6 = $connection6->prepare($query6);
          $stmt6->execute($data6);
        }






        // Update the status to DUE
        // if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 1" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 8, $year))) {
        //   $due = "DUE";
        //   $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
        //   $data6 = ["due" => $due, "collection_list_id" => $collection_id];
        //   $connection6 = $this->conn;
        //   $stmt6 = $connection6->prepare($query6);
        //   $stmt6->execute($data6);
        // }
        // if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 2" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 15, $year))) {
        //   $due = "DUE";
        //   $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
        //   $data6 = ["due" => $due, "collection_list_id" => $collection_id];
        //   $connection6 = $this->conn;
        //   $stmt6 = $connection6->prepare($query6);
        //   $stmt6->execute($data6);
        // }
        // if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 3" && $current_day >= $twenty_second_day = date("j", mktime(0, 0, 0, $month, 22, $year))) {
        //   $due = "DUE";
        //   $query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
        //   $data6 = ["due" => $due, "collection_list_id" => $collection_id];
        //   $connection6 = $this->conn;
        //   $stmt6 = $connection6->prepare($query6);
        //   $stmt6->execute($data6);
        // }
      }
    }
  }





  // AUTO UPDATE PROMOTION
  public function updatePromotion()
  {
    $query = "SELECT * FROM promotion";
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
      while ($result = $stmt->fetch()) {
        $promotion_id = $result['id'];
        $photo = $result['photo'];
        $business_name = $result['business_name'];
        $content = $result['content'];
        $status = $result['status'];
        $date_created = $result['date_created'];
        $date_expired = $result['date_expired'];

        $promotion_due = date("Y/m/d", strtotime($date_expired . "+1 day"));
        $current_date = date("Y/m/d", strtotime("now"));
        if ($promotion_due <= $current_date) {
          $status = "INACTIVE";
          $query_expired = "UPDATE promotion SET status = :status WHERE id = :promotion_id";
          $data_expired = [
            "status" => $status,
            "promotion_id" => $promotion_id
          ];
          $stmt_expired = $connection->prepare($query_expired);
          $stmt_expired->execute($data_expired);
        }
      }
    }
  }



  //AUTO UPDATE ANNOUCEMENT
  public function updateAnnouncement()
  {
    $query = "SELECT * FROM announcement";
    $connection = $this->conn;
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
      while ($result = $stmt->fetch()) {
        $announcement_id = $result['id'];
        $about = $result['about'];
        $content = $result['content'];
        $date = $result['date'];
        $date_created = $result['date_created'];
        $status = $result['status'];

        $announcement_expired = date("Y/m/d", strtotime($date . "+1 day"));
        $current_date = date("Y/m/d", strtotime("now"));
        if ($announcement_expired <= $current_date) {
          $status = "INACTIVE";
          $query_expired = "UPDATE announcement SET status = :status WHERE id = :announcement_id";
          $data_expired = [
            "status" => $status,
            "announcement_id" => $announcement_id
          ];
          // $connection_expired = $server->openConn();
          $stmt_expired = $connection->prepare($query_expired);
          $stmt_expired->execute($data_expired);
        }
      }
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


  public function userSessionLogin()
  {
    if (isset($_SESSION['user_id'])) {
      echo "<script>window.location.href='./user/home.php'</script>";
    }
  }

  public function userAuthentication()
  {
    if (empty($_SESSION['user_id'])) {
      echo "<script>window.location.href='../index.php'</script>";
    }
  }
}

?>