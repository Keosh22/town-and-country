<?php
require_once("../includes/header.php");
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server; // Open/Close connection
session_start();
$server->adminSessionLogin();


?>


<?php
// Set HTTP request to POST method if login btn is clicked
if (isset($_POST['login_submit'])) {


    $login_Username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $login_Pass = $_POST["password"];

    // Validates input if empty
    if (empty($login_Username) || empty($login_Pass)) {

        $_SESSION['status'] = "Login Failed!";
        $_SESSION['text'] = "Please fill all the fields!";
        $_SESSION['status_code'] = "warning";
    } else {


        $query = "SELECT * FROM admin_users WHERE username = :username";
        // kahit hindi ka na mag bindParam, pwede mo na rekta sa loob ng array ($data)
        $data = ["username" =>  $login_Username];
        $path = "../admin-panel/dashboard.php";
        $pass = $login_Pass;
        $server->login($query, $data, $pass, $path);
    }
}
?>




<body>
    <!-- <div class="spinner_wrapper">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> -->
    <!-- MAIN  -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row main-row d-flex">
            <!-- LEFT SIDE -->
            <!-- title and logo -->
            <div class="col-xxl-8 col-xl-6 col-l-6 col-md-6 col-sm-0 left-side d-flex flex-column align-items-center justify-content-lg-center justify-content-sm-start ">
                <img src="<?php echo DIR ?>img/logo.png" class="img-fluid" alt="">
                <h1 class="h1 header-text text-center mb-5 title">Town and Country Heights Subdivision</h1>
            </div>

            <!-- RIGHT SIDE -->
            <!-- Input and buttons -->
            <div class="col-xxl-4 col-xl-6 col-l-6  col-md-6 col-sm-12 right-side d-flex flex-column align-items-center justify-content-sm-center   
            justify-content-lg-center">
                <!-- UPPER PART -->
                <div class="row">
                    <div class="header-text text-center mb-5">
                        <img src="<?php echo DIR ?>img/login.png" class="login-img " alt="">
                        <h1 class="h1">WELCOME</h1>
                    </div>
                </div>

                <!-- FORMS -->
                <div class="input-group d-flex justify-content-center text-center">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="64" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" maxlength="64">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="show_password" class="form-check-input">
                            <label for="show_password" class="text-secondary">Show password</label>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <input type="submit" class="login-btn btn btn-primary" name="login_submit" value="Log In"></input>

                        <!-- FORGOT PASSWORD -->
                        <div class="row forgot-password">
                            <a href="../admin/forgot_password.php">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
     $(document).ready(function(){
        // $(window).on('load', function() {
        //     $(".spinner_wrapper").fadeOut("slow");
            
        // });

        // Show password
        $("#show_password").on('change', function(){

            if(this.checked){
                $("#exampleInputPassword1").attr('type', 'text')
            } else {
                $("#exampleInputPassword1").attr('type', 'password')
            }
        });

     });
    </script>
    <!-- FOOTER -->
    <?php
    include("../includes/footer.php");
    ?>