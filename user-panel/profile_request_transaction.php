<!-- Modal -->
<style>
  .ui-datepicker tbody td {
    height: 40px;

  }

  .date input span i{
    font-size: 2em;
    
  }
</style>

<div class="modal fade" id="request_transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">SELECT DATE</h5>

      </div>
      <form action="" method="post">
        <div class="modal-body" style="color: black;">
          <label style="color:black;">Start Date: </label>
          <div id="datepicker" class="input-group date"  style="width: 50%;">
            <input id="start_date" class="form-control input-sm-to" type="text" readonly />
            <span class="input-group-addon">
              <i class="fa-regular fa-calendar" style="color: #000000; font-size:2em; margin-left:1rem"></i>
            </span>
          </div>


          <label style="color:black;">End Date: </label>
          <div id="datepicker2" class="input-group date" style="width: 50%;" >
            <input id="end_date" class="form-control input-sm-to" type="text" readonly />
            <span class="input-group-addon">
            <i class="fa-regular fa-calendar" style="color: #000000; font-size:2em; margin-left:1rem"></i>
            </span>
          </div>
        </div>
        <div class="message_result" style="color: black;">
          <h1 style="color:black"></h1>
        </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>

        <input type="submit" class="btn btn-primary" value="Request" id="request"></button>

        <?php


        ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    //'$("#request").prop("disabled", true);


    var highest_date;
    var lowest_date;

    var lowestYear;
    var highestYear;

    var highestMonth;
    var lowestMonth;
    $.ajax({

      url: '../user-panel/profile_validate_date.php',
      type: "POST",
      dataType: "json",
      success: function(data) {


        highest_date = data.max_year_month;
        lowest_date = data.min_year_month;

        highest_date_split = highest_date.split("-")
        highestYear = highest_date_split[0];
        highestMonth = highest_date_split[1];

        lowest_date_split = lowest_date.split("-");
        lowestYear = lowest_date_split[0];
        lowestMonth = lowest_date_split[1];
      },

      error: function(error) {
        console.log("Error fetching data: " + JSON.stringify(error));
      }
    });

    $(function() {
      $("#request").on("click", function() {
        $(".message_result").empty();

        var startDate = $("#start_date").val();
        var start_date_parts = startDate.split("/")
        var startMonth = start_date_parts[0];
        var startYear = start_date_parts[1];

        var endDate = $("#end_date").val();
        var end_date_parts = endDate.split("/")
        var endMonth = end_date_parts[0];
        var endYear = end_date_parts[1];
        $(".message_result").append("<h4>" + lowestMonth + "/" + highestYear + "</h4>");


        if (
          ((startMonth >= lowestMonth && startYear >= lowestYear) &&
            (startMonth <= highestMonth && startYear <= highestYear)) &&
          ((endMonth <= highestMonth && endYear <= highestYear) &&
            (endMonth >= lowestMonth && endYear >= lowestYear))) {
          $(".message_result").append("<h1>PROCEED</h1>");
        } else {
          $(".message_result").append("<h1>There is no transaction on this date</h1>");

        };

      
      });
    });
  });
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
  });
</script>



<script>
  $(function() {

    var datePickerInput = $("#datepicker").find("input");

    $("#datepicker").datepicker({
      orientation: "top",
      format: 'mm/yyyy',
      viewMode: 'months',
      minViewMode: 1,
      autoclose: true,
      todayHighlight: true,
      



    }).datepicker('update', new Date());
  });
</script>
<script>
  $(function() {
    $("#datepicker2").datepicker({
      inline: false,
      format: 'mm/yyyy',
      viewMode: 'months',
      minViewMode: 'months',
      autoclose: true,
      todayHighlight: true,
    }).datepicker('update', new Date());
  });
</script>

<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>