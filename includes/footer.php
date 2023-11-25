
<!-- Script -->
<!-- <script src="../scripts/script.js"></script> -->

<!-- Sweet Alert Script -->
<script src="../libraries/sweetalert.js"></script>




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
          unset($_SESSION['alert']);
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