<?php
// Set HTTP request to POST method if login btn is clicked
if (isset($_POST['login'])) {


    $login_Username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $login_Pass = $_POST["password"];
    $ACTIVE = "ACTIVE";

    if (empty($login_Username) || empty($login_Pass)) {

        $_SESSION['status'] = "Login Failed!";
        $_SESSION['text'] = "Please fill all the fields!";
        $_SESSION['status_code'] = "warning";
    } else {
        // $query = "SELECT * FROM homeowners_users WHERE username = :username AND archive = :ACTIVE";
        $query = "SELECT * FROM homeowners_users WHERE username = :username AND archive = :ACTIVE";
        $data = ["username" =>  $login_Username, "ACTIVE" => $ACTIVE];
        $path = "user/home.php";
        $pass = $login_Pass;
        $userserver->userLogin($query, $data, $pass, $path);

        // $userserver->getAnnouncement();
    }
}


// get announcment



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="/styles/userLogin.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <!-- Poppins FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Box Icon -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <div class="login-card">
        <header>
            <h2>LOGIN</h2>
            <h3>Town and Country Heights</h3>
        </header>

        <form action="index.php" method="POST" class="login-form">
            <div class="input">
                <span class=""><i class="bx bx-user"></i></span>
                <input type="text" class=" input" placeholder="Username" name="username">
            </div>

            <div class="input">
                <span class=""><i class="bx bx-lock-alt"></i></span>
                <input type="password" class=" input" placeholder="Password" name="password" id="password">
            </div>

            <div class="login-btn">
                <input type="submit" class="btn btn-success" value="Log in" name="login">
            </div>

            <div class="footer">
                <div class="show-pass">
                    <input type="checkbox" id="show_password" class="form-check-input">
                    <label for="show_password" class="text-secondary">Show password</label>
                </div>
                <div class="seperator"></div>
                <div class="forgot-pass">
                    <a href="forgot_password.php" class="link-underline link-underline-opacity-0 text-muted link-primary">Forgot Password?</a>
                </div>
            </div>



        </form>



</body>

</html>

<!-- Sweet Alert Script -->
<script src="./libraries/sweetalert.js"></script>

<!-- DataTables CDN -->
<!-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> -->



<script>
    $(document).ready(function() {

        $("#show_password").on('change', function() {

            if (this.checked) {
                $("#password").attr('type', 'text');
            } else {
                $("#password").attr('type', 'password');
            }

        });






    });
</script>