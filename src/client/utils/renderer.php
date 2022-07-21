<?php
function render_alert($success, $message)
{
  if (!$_SESSION['message_showed']) {
    // render alert;
?>
    <div class="container" id="alert-container">
      <div class="alert alert-<?php echo $success ? "success" : "danger" ?>"><?php echo $message ?></div>
    </div>
    <?php
    // change this bool so the next time this function runs, the alert doesn't render;
    $_SESSION['message_showed'] = true;

    // little script to delete the alert after a couple seconds;
    ?>
    <script>
      setTimeout(() => {
        document.querySelector("#alert-container").remove();
      }, 3000);
    </script>
<?php
  }
}
