<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Script -->
<script src="../scripts/script.js"></script>

<!-- Sweet Alert Script -->
<script src="../libraries/sweetalert.js"></script>

<!-- DataTable JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<script>
  $(document).ready( function () {
    // $('#myTable').DataTable();
  // const dataTable = $('#myTable').DataTable({
  //   "paging": true,
  //   "processing": true,
  //   "serverSide": true,
  //   "order": [],
  //   "info": true,
  //   "ajax": {
  //     url:"../fetch.php",
  //     type:"POST",
  //   },
  //   "columDefs": [
  //     {
  //     "targets": [0,3,4],
  //     "orderable":false,
  //     },
  // ],

  // });
  
  });
</script>






<?php
// ----------------- Pop up Alert ---------------- 
if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
?>
  <script>
    swal({
        title: " <?php echo $_SESSION['status'] ?>",
        text: "<?php echo $_SESSION['text'] ?>",
        icon: "<?php echo $_SESSION['status_code'] ?>",
        buttons: "Okay",
      })
      .then((buttons) => {
        if (buttons) {
          <?php
          unset($_SESSION['status']);
          unset($_SESSION['text']);
          unset($_SESSION['status_code']);
          // session_unset();
          // session_destroy();
          ?>
        }
      });
  </script>
<?php
}
?>

</body>

</html>