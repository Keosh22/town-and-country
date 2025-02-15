<!-- Modal -->


<style>
  .ui-datepicker tbody td {
    height: 40px;

  }

  .date input span i {
    font-size: 2em;

  }
</style>


<div class="modal fade" id="print_transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="submit" class="btn btn-primary" value="Open" id="open"></button>





      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {

    //date var 
    var highest_date;
    var lowest_date;

    var startDate;
    var endDate;

    var dates_avail = [];


    $.ajax({

      url: '../user-panel/profile_validate_date.php',
      type: "GET",
      dataType: "json",
      success: function(data) {

        highest_date = data.date_range.max_year_month;
        lowest_date = data.date_range.min_year_month;

        data.all_dates.forEach(function(dateItem) {
          dates_avail.push(dateItem.dates);

        });
      },

      error: function(error) {
        console.log("Error fetching data: " + JSON.stringify(error));
      }
    });

    $(function() {
      $("#open").on("click", function() {
        $(".message_result").empty();

        startDate = $("#start_date").val();
        endDate = $("#end_date").val();

        if (
          ((startDate >= lowest_date && startDate <= highest_date) &&
            (endDate <= highest_date && endDate >= lowest_date)) &&
          (dates_avail.includes(startDate) && dates_avail.includes(endDate))
        ) {

          var url = '../user-panel/receipt.php?start_date=' + startDate + '&end_date=' + endDate;

          console.log(startDate);
          console.log("Highest date: " + highest_date)
          console.log("Lowest date: " + lowest_date)
          console.log(endDate);
          console.log(dates_avail);
          var print_transaction = window.open('../user-panel/receipt.php?start_date=' + startDate + '&end_date=' + endDate, "_blank", 'width=device-width,height=device-height');


          // newWindow.onload = function() {
          //   newWindow.print();
          // };
          /*   print_transaction.print(); // Print the transaction
          // Wait for a short delay before closing the print window and reloading the page
          setTimeout(function() {
            print_transaction.close(); // Close the print window
            location.reload(true); // Reload the page
          }, 1000); // Adjust the delay time as needed (in milliseconds)
          */


          resetDateValues()

        } else {

          Swal.fire({

            title: "Oops...",
            text: "There is no transaction within this range!",

          });



          resetDateValues()






        };
      });





    });

    function closeModal() {
      $("#myModal").css("display", "none");


    }

    // Open the modal when the page loads

    //$("#myModal").css("display", "block");


    // Close the modal when clicking outside of it
    $(document).on("click", function(event) {
      if ($(event.target).closest("#myModal").length === 0) {
        closeModal();


      };
    });



    // Attach click event handler to close button with the class 'closeBtn'
    $(".closeBtn").on("click", function() {
      $('#print_transaction').modal('hide');

      resetDateValues();
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

    function resetDateValues() {
      var currentDate = new Date();
      var formattedDate = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2);

      startDate = formattedDate;
      endDate = formattedDate;

      // Update input values
      $("#start_date").val(startDate);
      $("#end_date").val(endDate);

      // Update date ranges for daterangepicker
      $("#start_date").data('daterangepicker').setStartDate(startDate);
      $("#start_date").data('daterangepicker').setEndDate(startDate);
      $("#end_date").data('daterangepicker').setStartDate(endDate);
      $("#end_date").data('daterangepicker').setEndDate(endDate);
    }






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






<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
<!-- DatePicker Plugin -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />