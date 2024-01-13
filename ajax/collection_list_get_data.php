<?php
require_once("../libs/server.php");
?>
<?php
$server = new Server;

if (isset($_POST['property_id'])) {

  $response = '<div class="col-2">
  <div class="card text-bg-secondary text-center">
  <input type="checkbox" class="form-check-input mx-1 mt-1">
  <h5 class="card-title"><b></b></h5>
  <p class="card-text mb-1"></p>
  </div>
  </div>
  ';

  $year = date("Y", strtotime("now"));
  $property_id = $_POST['property_id'];
  $query = "SELECT * FROM collection_list WHERE property_id = :property_id AND status IN ('DUE','AVAILABLE') ORDER BY year = :year";
  $data = ["property_id" => $property_id, "year" => $year];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $array_month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October",  "November", "December");
  if ($stmt->rowCount() > 0) {

    // foreach ($array_month as $x){

    //   if($x == "January"){
    //     $month_abr = "JAN";
    //   } elseif ($x == "February"){
    //     $month_abr = "FEB";
    //   } elseif ($x == "March"){
    //     $month_abr = "MAR";
    //   } elseif ($x == "April"){
    //     $month_abr = "APR";
    //   } elseif ($x == "May"){
    //     $month_abr = "MAY";
    //   } elseif ($x == "June"){
    //     $month_abr = "JUN";
    //   } elseif ($x == "July"){
    //     $month_abr = "JUL";
    //   } elseif ($x == "August"){
    //     $month_abr = "AUG";
    //   } elseif ($x == "September"){
    //     $month_abr = "SEP";
    //   } elseif ($x == "October"){
    //     $month_abr = "OCT";
    //   } elseif ($x == "November"){
    //     $month_abr = "NOV";
    //   } elseif ($x == "December"){
    //     $month_abr = "DEC";
    //   } else {
    //     $month_abr == "N/A";
    //   }

    //  $deafult = '<div class="col-2">
    //     <div class="card text-bg-secondary text-center">
    //     <input type="checkbox" class="form-check-input mx-1 mt-1">
    //       <div class="card-body">
    //         <h5 class="card-title"><b>'.$month_abr.'</b></h5>
    //         <p class="card-text"><small>N/A</small></p>
    //       </div>
    //     </div>
    //   </div>';
    //   echo $deafult;
    // }
   
    while ($result = $stmt->fetch()) {
      $status = $result['status'];
      $month = $result['month'];
      $year = $result['year'];

      if($month == "January"){
        $month_abr = "JAN";
      } elseif ($month == "February"){
        $month_abr = "FEB";
      } elseif ($month == "March"){
        $month_abr = "MAR";
      } elseif ($month == "April"){
        $month_abr = "APR";
      } elseif ($month == "May"){
        $month_abr = "MAY";
      } elseif ($month == "June"){
        $month_abr = "JUN";
      } elseif ($month == "July"){
        $month_abr = "JUL";
      } elseif ($month == "August"){
        $month_abr = "AUG";
      } elseif ($month == "September"){
        $month_abr = "SEP";
      } elseif ($month == "October"){
        $month_abr = "OCT";
      } elseif ($month == "November"){
        $month_abr = "NOV";
      } elseif ($month == "December"){
        $month_abr = "DEC";
      } else {
        $month_abr == "N/A";
      }

      if($status == "DUE"){
        $color = "danger";
        $status_abr = "DUE";
      } elseif ($status == "AVAILABLE"){
        $color ="primary";
        $status_abr = "AVAIL";
      } elseif ($status == "PAID"){
        $color = "success";
        $status_abr = "PAID";
      } else {
        $color = "secondary";
      }

      $response = '<div class="col-2">
      <div class="card text-bg-'.$color.' text-center">
      <input type="checkbox" class="form-check-input mx-1 mt-1">
        <div class="card-body">
          <h5 class="card-title"><b>'.$month_abr.'</b></h5>
          <p class="card-text"><small>'.$status_abr.'</small></p>
        </div>
      </div>
    </div>';
    echo $response;



    
    foreach ($array_month as $x){
      if($x == $month){
        continue;
      } else {

      
      if($x == "January"){
        $month_abr = "JAN";
      } elseif ($x == "February"){
        $month_abr = "FEB";
      } elseif ($x == "March"){
        $month_abr = "MAR";
      } elseif ($x == "April"){
        $month_abr = "APR";
      } elseif ($x == "May"){
        $month_abr = "MAY";
      } elseif ($x == "June"){
        $month_abr = "JUN";
      } elseif ($x == "July"){
        $month_abr = "JUL";
      } elseif ($x == "August"){
        $month_abr = "AUG";
      } elseif ($x == "September"){
        $month_abr = "SEP";
      } elseif ($x == "October"){
        $month_abr = "OCT";
      } elseif ($x == "November"){
        $month_abr = "NOV";
      } elseif ($x == "December"){
        $month_abr = "DEC";
      } else {
        $month_abr == "N/A";
      }

     $deafult = '<div class="col-2">
        <div class="card text-bg-secondary text-center">
        <input type="checkbox" class="form-check-input mx-1 mt-1">
          <div class="card-body">
            <h5 class="card-title"><b>'.$month_abr.'</b></h5>
            <p class="card-text"><small>N/A</small></p>
          </div>
        </div>
      </div>';
      echo $deafult;
    }
    }
    }
  }
  
}

?>