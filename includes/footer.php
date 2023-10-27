<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Script -->
<script src="../scripts/script.js"></script>

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
          session_unset();
          session_destroy();
          ?>
        }
      });
  </script>
<?php
}
?>

</body>

</html>