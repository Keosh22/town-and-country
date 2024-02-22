<!-- Modal -->


<style>
  .ui-datepicker tbody td {
    height: 40px;

  }

  .date input span i {
    font-size: 2em;

  }
</style>


<div class="modal fade" id="request_transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">SELECT DATE</h5>

      </div>
      <form action="" method="POST">
        <div class="modal-body" style="color: black;">
          <label style="color:black;">Start Date: </label>
          <div id="datepicker" class="input-group date" style="width: 50%;">
            <input id="start_date" class="form-control input-sm-to" name="start_date" type="text" readonly />
            <span class="input-group-addon">
              <i class="fa-regular fa-calendar" style="color: #000000; font-size:2em; margin-left:1rem"></i>
            </span>
          </div>


          <label style="color:black;">End Date: </label>
          <div id="datepicker2" class="input-group date" style="width: 50%;">
            <input id="end_date" class="form-control input-sm-to" name="end_date" type="text" readonly />
            <span class="input-group-addon">
              <i class="fa-regular fa-calendar" style="color: #000000; font-size:2em; margin-left:1rem"></i>
            </span>
          </div>
        </div>
        <!-- <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Request" id="request"></button> -->

      </form>
      <div class="message_result" style="color: black;">
        <h1 style="color:black"></h1>
      </div>


      <div class="modal-footer">

        <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Print" id="request"></button>
        <input type="submit" class="btn btn-primary" value="Download" id="download"></button>




      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
  //'$("#request").prop("disabled", true);

  //dates
  var highest_date;
  var lowest_date;

  var lowestYear;
  var highestYear;

  var highestMonth;
  var lowestMonth;

  //data

  var transaction_number;
  var user_id;
  var category;
  var month_date;
  var transaction_date;
  var firstname;
  var lastname;
  var middle_initial;
  var blk;
  var lot;
  var street;
  var phase;
  var transaction_number;


  var startDate;
  var endDate;


  $.ajax({

    url: '../user-panel/profile_validate_date.php',
    type: "GET",
    dataType: "json",
    success: function(data) {
      // date_response = response.date_range
      // payment_response = response.payment_data
      //date
      highest_date = data.max_year_month;
      lowest_date = data.min_year_month;

      //personal data

      //name
      //     firstname = payment_response.firstname;
      //     lastname = payment_response.lastname;
      //     middle_initial = payment_response.middle_initial;
      //     blk = payment_response.blk;
      //     lot = payment_response.lot;
      //     street = payment_response.street;


      //     var name = lastname + "," + firstname + ", " + middle_initial + ".";
      // var address = blk + " " + lot + "" + street + "" + phase;


      // highest_date_split = highest_date.split("-")
      // highestYear = highest_date_split[0];
      // highestMonth = highest_date_split[1];

      // lowest_date_split = lowest_date.split("-");
      // lowestYear = lowest_date_split[0];
      // lowestMonth = lowest_date_split[1];
    },

    error: function(error) {
      console.log("Error fetching data: " + JSON.stringify(error));
    }
  });

  $(function() {
    $("#request").on("click", function() {
      $(".message_result").empty();

      startDate = $("#start_date").val();
      // var start_date_parts = startDate.split("/")
      // var startMonth = start_date_parts[0];
      // var startYear = start_date_parts[1];

      endDate = $("#end_date").val();
      // var end_date_parts = endDate.split("/")
      // var endMonth = end_date_parts[0];
      // var endYear = end_date_parts[1];
      $(".message_result").append("<h4>" + startDate + "/" + highest_date + "</h4>");



      if (
        ((startDate >= lowest_date && startDate <= highest_date) &&
          (endDate <= highest_date && endDate >= lowest_date))) {
        $(".message_result").append("<h1>Proceed</h1>");
        var url = '../user-panel/receipt.php?start_date=' + startDate + '&end_date=' + endDate;


        var newWindow = window.open(url, "_blank");

        newWindow.onload = function() {
          newWindow.print();
        };

      } else {
        $(".message_result").append("<h1>There is no transaction on this date</h1>");

      };
    });


  });


  $("#download").on("click", function() {
  

    // Make an HTTP request to fetch the content of receipt.php
    $.get(url, function(data) {
        // After receiving the content, convert it to PDF
        html2canvas(data).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var pdf = new jsPDF();
            var imgWidth = pdf.internal.pageSize.getWidth();
            var imgHeight = canvas.height * imgWidth / canvas.width;
            pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
            pdf.save('receipt.pdf');
        });
    });
});

})
</script>


<script type="text/javascript">
  $(document).ready(function() {
    function closeModal() {
      $("#myModal").css("display", "none");
    }

    // Open the modal when the page loads
    $(document).ready(function() {
      $("#myModal").css("display", "block");

      // Close the modal when clicking outside of it
      $(document).on("click", function(event) {
        if ($(event.target).closest("#myModal").length === 0) {
          closeModal();
        }
      });
    });


    // Attach click event handler to close button with the class 'closeBtn'
    $(".closeBtn").on("click", function() {
      $('#request_transaction').modal('hide');
    });

    // START DATE
    $("#start_date").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      locale: {
        format: 'YYYY-MM-DD'
      }
    });

    // END DATE
    $("#end_date").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      locale: {
        format: 'YYYY-MM-DD'
      }
    });


  })
</script>



<!-- <script>
  $(function() {

    var datePickerInput = $("#datepicker").find("input");

    $("#datepicker").datepicker({

      format: 'yyyy-mm-dd',
      viewMode: 'days',
      minViewMode: "month",
      autoclose: true,
      todayHighlight: true,




    }).datepicker('update', new Date());
  });
</script>
<script>
  $(function() {
    $("#datepicker2").datepicker({
      inline: false,
      format: 'yyyy-mm-dd',
      viewMode: 'days',
      minViewMode: 'month',
      autoclose: true,
      todayHighlight: true,
    }).datepicker('update', new Date());
  });
</script> -->



<script>

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
  <!-- DatePicker Plugin -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />