<?php
// Server
require_once("../libs/server.php");
?>

<?php

$server = new Server;

if(isset($_POST['register'])){
  $username = filter_input(INPUT_POST, 'username' , FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = $_POST['phone_number'];
  
  if (empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($phone_number)){
    
   

    
  } else {
    $query = "INSERT INTO admin_users (username,password,firstname,lastname,email,phone_number) VALUES (:username, :password, :firstname, :lastname, :email, :phone_number)";

    $data = [
      "username" => $username,
      "password" => $password,
      "firstname" => $firstname,
      "lastname" => $lastname,
      "email" => $email,
      "phone_number" => $phone_number 
    ];
    
    $path = "../admin-panel/user.php";
    
    $server->register($query,$data,$path);
    echo"success";
  }
}






?>




<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Add User Account</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
            </div>
            <div class="modal-body">
              <!-- Form -->

              <form  method="POST" action="user_register_modal.php">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-sm-3 control-label">Phone number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                
                <div class="form-group ">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class=" control-label d-inline-block">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="photo" class=" col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="register"><i class="fa fa-save"></i> Register</button>
              </form>
            </div>
        </div>
    </div>
</div>