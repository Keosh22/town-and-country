<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>
  

  
</style>

<div class="receipt-wrapper">
  
  <h1 class="text-center title-receipt">Payment Receipt</h1>
  <div class="divider-receipt"></div>
  <div class="flex">
    <div class="w-50">
      <h3 class="details-title">Homeowners Details</h3>
      <p>Account Number: <b></b></p>
      <p>Name: <b></b></p>
      <p>Current Address: </p>
    </div>
    <div class="w-50">
      <h3 class="details-title">Payment Details</h3>
      <p>Transaction Number: <b></b></p>
      <p>Date Paid: </p>
      <p>Paid Amount:</p>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Payment Category</th>
        <th scope="col">Paid Amount</th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="">1</td>
        <td>Monthly Dues</td>
        <td>300</td>
        <td>Month of January 2024</td>
      </tr>
    </tbody> 
  </table>
</div>