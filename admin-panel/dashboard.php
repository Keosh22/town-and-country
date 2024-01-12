<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

?>
<?php
session_start();

$server = new Server;
$server->adminAuthentication();
$server->insertCollection();
$server->updatePromotion();
$server->updateAnnouncement();


// // -------  AUTO INSERT COLLECTION FUNCTION ----------
// $current_date = date("Y-m-d H:i:s", strtotime("now"));
// $current_month = date("F", strtotime("now"));
// $current_year = date("Y", strtotime("now"));
// $current_day = date("j", strtotime("now"));
// $first_day_month = date("j", strtotime("first day of this month"));
// $month = date("m", strtotime("now"));
// $year = date("Y", strtotime("now"));


// // Get all id in the proeprty list
// $query1 = "SELECT * FROM property_list";
// $connection1 = $server->openConn();
// $stmt1 = $connection1->prepare($query1);
// $stmt1->execute();
// if ($stmt1->rowCount() > 0) {
// 	while ($property_row = $stmt1->fetch()) {
// 		$property_list_id = $property_row['id'];
// 		$property_list_phase = $property_row['phase'];
// 		// It validates if there is already a collection for this month and year
// 		$query2 = "SELECT * FROM collection_list WHERE property_id = :property_list_id AND month = :current_month AND year = :current_year";
// 		$data2 = [
// 			'property_list_id' => $property_list_id,
// 			'current_month' => $current_month,
// 			'current_year' => $current_year
// 		];
// 		$connection2 = $server->openConn();
// 		$stmt2 = $connection2->prepare($query2);
// 		$stmt2->execute($data2);

// 		if ($stmt2->rowCount() > 0) {
			
// 		} else {

// 			// get the current monthly dues fee
// 			$monthly_dues = "Monthly Dues";
// 			$query3 = "SELECT * FROM collection_fee WHERE category = :category";
// 			$data3 = ["category" => $monthly_dues];
// 			$connection3 = $server->openConn();
// 			$stmt3 = $connection3->prepare($query3);
// 			$stmt3->execute($data3);
// 			if ($stmt3->rowCount() > 0) {
// 				while ($result = $stmt3->fetch()) {
// 					$collection_fee_id = $result['id'];
// 				}

// 				// Check the date
			

// 				if ($property_list_phase == "Phase 1" && ($current_day >= $day_range = date("j", mktime(0, 0, 0, $month, 1, $year)) && $current_day <= $day_range = date("j", mktime(0,0,0,$month, 7, $year)))) {
// 					$status = "AVAILABLE";
// 					$query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
// 					$data4 = [
// 						"property_id" => $property_list_id,
// 						"collection_fee_id" => $collection_fee_id,
// 						"date_created" => $current_date,
// 						"date_expired" => $current_date,
// 						"status" => $status,
// 						"month" => $current_month,
// 						"year" => $current_year
// 					];
// 					$connection4 = $server->openConn();
// 					$stmt4 = $connection4->prepare($query4);
// 					$stmt4->execute($data4);
// 				}
// 				if ($property_list_phase == "Phase 2" && ($current_day >= $eight_day = date("j", mktime(0, 0, 0, $month, 8, $year)) && $current_day <= $eight_day = date("j", mktime(0, 0, 0, $month, 14, $year)))) {
// 					$status = "AVAILABLE";
// 					$query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
// 					$data4 = [
// 						"property_id" => $property_list_id,
// 						"collection_fee_id" => $collection_fee_id,
// 						"date_created" => $current_date,
// 						"date_expired" => $current_date,
// 						"status" => $status,
// 						"month" => $current_month,
// 						"year" => $current_year
// 					];
// 					$connection4 = $server->openConn();
// 					$stmt4 = $connection4->prepare($query4);
// 					$stmt4->execute($data4);
// 				}
// 				if ($property_list_phase == "Phase 3" && ($current_day <= $day_range = date("j", mktime(0, 0, 0, $month, 21, $year)) && $current_day >= $day_range = date("j", mktime(0,0,0,$month, 15, $year)))) {
// 					$status = "AVAILABLE";
// 					$query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
// 					$data4 = [
// 						"property_id" => $property_list_id,
// 						"collection_fee_id" => $collection_fee_id,
// 						"date_created" => $current_date,
// 						"date_expired" => $current_date,
// 						"status" => $status,
// 						"month" => $current_month,
// 						"year" => $current_year
// 					];
// 					$connection4 = $server->openConn();
// 					$stmt4 = $connection4->prepare($query4);
// 					$stmt4->execute($data4);
// 				}
// 			} else {
// 				$_SESSION['status'] = "There is no current fee for monthly duess";
// 				$_SESSION['text'] = "";
// 				$_SESSION['status_code'] = "warning";
// 			}
// 		}
// 	}
// }



// $available = "AVAILABLE";
// $query5 = "SELECT 
// collection_list.id,
// collection_list.status,
// collection_list.month,
// collection_list.year,
// collection_list.property_id,
// property_list.phase
// FROM collection_list INNER JOIN property_list WHERE collection_list.property_id = property_list.id AND collection_list.status = :available";
// $data5 = ["available" => $available];
// $connection5 = $server->openConn();
// $stmt5 = $connection5->prepare($query5);
// $stmt5->execute($data5);
// if ($stmt5->rowCount() > 0) {
// 	while ($result_collection_list = $stmt5->fetch()) {
// 		$collection_id = $result_collection_list['id'];
// 		$collection_list_month = $result_collection_list['month'];
// 		$collection_list_year = $result_collection_list['year'];
// 		$phase = $result_collection_list['phase'];



// 		// Update the status to DUE
// 		if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 1" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 8, $year)) ) {
// 			$due = "DUE";
// 			$query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
// 			$data6 = ["due" => $due, "collection_list_id" => $collection_id];
// 			$connection6 = $server->openConn();
// 			$stmt6 = $connection6->prepare($query6);
// 			$stmt6->execute($data6);
// 		}
// 		if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 2" && $current_day >= $fifteenth_day = date("j", mktime(0, 0, 0, $month, 15, $year))) {
// 			$due = "DUE";
// 			$query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
// 			$data6 = ["due" => $due, "collection_list_id" => $collection_id];
// 			$connection6 = $server->openConn();
// 			$stmt6 = $connection6->prepare($query6);
// 			$stmt6->execute($data6);
// 		}
// 		if ($collection_list_year == $current_year && $collection_list_month == $current_month && $phase == "Phase 3" && $current_day >= $twenty_second_day = date("j", mktime(0, 0, 0, $month, 22, $year))) {
// 			$due = "DUE";
// 			$query6 = "UPDATE collection_list SET status = :due WHERE id = :collection_list_id";
// 			$data6 = ["due" => $due, "collection_list_id" => $collection_id];
// 			$connection6 = $server->openConn();
// 			$stmt6 = $connection6->prepare($query6);
// 			$stmt6->execute($data6);
// 		}
// 	}
// }
// -------  AUTO INSERT COLLECTION FUNCTION ---------- 





// $validity = '3 days';
// $today = new DateTime('first day of this month + 1 day'. $validity);
// $result = $today->format('Y-m-d');
// $expiration = date("Y-m-d ",strtotime("+1 day"));
// $currentDate = date("Y-m-d ",strtotime("now +1day"));
// if($expiration == $currentDate){
// 	echo "Same date";
// } else {
// 	echo "Not same date";
// }
?>

<body>
	<div class="wrapper">
		<!-- SIDEBAR -->
		<?php

		require_once("../includes/sidebar.php");
		?>


		<!-------------- Main body content ---------->
		<div class="main">

			<!-- NAVBAR -->
			<?php
			require_once("../includes/navbar.php");

			?>


			<main class="content">
				<div class="row py-2 px-2 gy-3">
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">

								<h4 class="card-title">Homeowners</h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3">530</p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3">60</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Announcement</h4>
								<h6 class="card-subttitle text-success">Active</h6>
								<p class="card-text fs-3">3</p>
								<h6 class="card-subtitle text-danger">Inactive</h6>
								<p class="card-text fs-3">2</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Maintenance</h4>
								<h6 class="card-subttitle text-success">Request</h6>
								<p class="card-text fs-3">15</p>
								<h6 class="card-subtitle text-danger">Pending</h6>
								<p class="card-text fs-3">5</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Due Payments</h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3">0</p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3">0</p>
							</div>
						</div>
					</div>
				</div>
			</main>




			<!-- wrapper -->
		</div>
	</div>

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>