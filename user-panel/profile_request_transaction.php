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
        <input type="submit" class="btn btn-primary" value="Print" id="print"></button>
   




      </div>
    </div>
  </div>
</div>




<script>

  $(document).ready(function() {

  //date var 
  var highest_date;
  var lowest_date;

  var startDate;
  var endDate;

  $.ajax({

    url: '../user-panel/profile_validate_date.php',
    type: "GET",
    dataType: "json",
    success: function(data) {

      highest_date = data.max_year_month;
      lowest_date = data.min_year_month;
    },

    error: function(error) {
      console.log("Error fetching data: " + JSON.stringify(error));
    }
  });

  $(function() {
    $("#print").on("click", function() {
      $(".message_result").empty();

      startDate = $("#start_date").val();
      endDate = $("#end_date").val();

      if (
        ((startDate >= lowest_date && startDate <= highest_date) &&
          (endDate <= highest_date && endDate >= lowest_date))) {
        $(".message_result").append("<h1>Proceed</h1>");
        var url = '../user-panel/receipt.php?start_date=' + startDate + '&end_date=' + endDate;


        var print_transaction = window.open('../user-panel/receipt.php?start_date=' + startDate + '&end_date=' + endDate,"_blank",'width=900,height=600');

        // newWindow.onload = function() {
        //   newWindow.print();
 
        // };
        
        print_transaction.print();
        setTimeout(function(){
          print_transaction.close();
          location.reload(true);
        }, 500)
          
        

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
      $('#print_transaction').modal('hide');
    });
  });
</script>



<script>
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
</script>

<script>

</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>