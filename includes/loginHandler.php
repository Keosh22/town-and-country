

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $login_Username = $_POST["username"];
//     $login_Pass = $_POST["password"];

//     $_SESSION["usernameSession"] = $login_Username;
    
//     try{
//         require_once "dbh-inc.php";

//         $query = "SELECT * FROM users WHERE username = :username AND pwd = :pass";


//         $statement = $pdo->prepare($query);

//         $statement->bindParam(":username", $login_Username);
//         $statement->bindParam(":pass", $login_Pass);

//         $statement->execute();


//         $count = $statement->rowCount();

//         if($count > 0){
//             header("Location: ../admin-panel/admin-dashboard.php");
//             die();
//         }
//         else{
//             echo "User and pass does not match!";
//             header("Location: ../admin-login/login.php");
//         }

//         $pdo = null;
//         $statement = null;
        

//     }catch (PDOException $e){
//         die("Query failed" . $e->getMessage());
//     }


// }