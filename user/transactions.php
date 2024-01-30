<?php
session_start();

require_once "../libs/server.php";
require_once "../user-panel/user-nav.php";
require_once "../includes/user_header_transactions.php";


$server = new Server();
?>

<main>

  <div class="backbtn-title d-flex flex-column">

    <!-- First Column -->
    <div class="col-12 back-button">
      <a href="home.php" class="d-flex justify-content-start">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
      </a>
    </div>

    <!-- Second Column -->
    <div class="row d-flex mt-2 mb-5 justify-content-center">
      <div class="col col-xl-12 option-title">
        <h1>Transactions</h1>
      </div>
    </div>

  </div>
  <div class="request-transaction mb-5">
    <?php include "../user-panel/profile_request_transaction.php" ?>
    <button type="button" class="btn btn-primary d-flex justify-content-end" data-toggle="modal" data-target="#request_transaction">
      Request Transaction
    </button>
  </div>
  <table class="table table-striped">
    <thead class="table-header bg-dark">
      <tr>
        <th scope="col ">TRANSACTION NUMBER</th>
        <th scope="col">USER ID</th>
        <th scope="col">CATEGORY</th>
        <th scope="col">MONTH AND YEAR</th>
        <th scope="col">STATUS</th>
        <th scope="col">DATE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $id = $_SESSION["user_id"];
      $query =  "SELECT
                payments_list.id,
                payments_list.transaction_number,
                payments_list.homeowners_id,
                payments_list.property_id,
                payments_list.collection_id,
                payments_list.collection_fee_id,
                payments_list.date_created,
                payments_list.paid,
                homeowners_users.id,
                homeowners_users.account_number,
                
                property_list.id,
                
                collection_list.id,
                collection_list.property_id,
                collection_list.collection_fee_id,
                collection_list.month,
                collection_list.year,
          

                collection_list.balance,
                collection_list.status,
                collection_fee.id,
                collection_fee.category,
                collection_fee.fee

                
                
                FROM payments_list
                INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
                INNER JOIN property_list ON payments_list.property_id = property_list.id
                INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
                INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                
                
                WHERE payments_list.homeowners_id = :user_id";


      $data = ["user_id" => $id];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);

      if ($stmt->rowCount() > 0) {

        while ($result = $stmt->fetch()) {
          $transaction_number = $result["transaction_number"];

          // User information
          $id = $result['id'];
          $account_number = $result['account_number'];

          // collection fee id
          $collection_fee_id = $result["category"];
          $date_created = $result["date_created"];
          $status = $result["status"];
          $month = $result["month"];
          $year = $result["year"];
          $monthyear = "{$month}, {$year}";
      ?>
          <tr>
            <td><?= $transaction_number ?></td>
            <td><?= $account_number ?></td>
            
            <td><?= $collection_fee_id ?></td>
            <td><?= $monthyear?></td>
            <td><?php

                if ($status === "PAID") {
                  // Add additional HTML or styles for "PAID" status
                  echo '<span style="color: green; font-weight: bold;"> (PAID)</span>';
                } else {
                  // Add additional HTML or styles for other status
                  echo '<span style="color: red; font-weight: bold;"> (UNPAID)</span>';
                }
                ?>

            </td>
            <td><?= $date_created ?></td>
          </tr>
      <?php
        }
      }
      ?>

    </tbody>
  </table>
</main>
</body>
<script>
  $(document).ready(function() {
    $(".btn-primary").on("click", function() {
      $("#request_transaction").modal("show");
      $(".message_result").empty();
    })
  });
</script>

<?php 
require "../includes/footer.php";
?>