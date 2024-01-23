<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>



</style>


<div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center mb-3">
            <a href="#"><img class="logo-img text-center" src="../img/logo.png" alt=""></a>
          </div>
          <div class="col-12 text-center">
            <h1><b>Payment Reminder</b></h1>
          </div>
          <div class="row">
            <div class="col-12">
              <h4><b>Dear ' . $firstname . ',</b> </h4>
            </div>
            <div class="col-12">
              <p>I hope you are doing well! This is a friendly reminder that the monthly due collection for
              your property: <b>' . $address . '</b> will due in the ' . $day . ' of this month of ' . $month . ' 
                <br>
                
              </p>
              
            </div>
            <div class="col-12">
              <p>Below is the summary of your monthly dues:</p>
              <p><b>Account Number: </b></p>
              <p><b>Homeowners Name: </b></p>
              <p><b>Property Address: </b></p>
              <p><b>Balance: </b></p>
              <p><b>Current Charges: </b></p>
              <p><b>Due Date: </b></p>
              <p><b>Total Ammount Due: </b></p>
              <br>
              <br>
              Let us know if there are any issues or if we can assist you in any way,
              <br>
              <p><b>Thank you!</b></p>
              <br>
              This is a system generated message, do not reply.
            </div>
          </div>
        </div>
      </div>