<?php
function render_alert($success, $message)
{
  if (isset($message)) {
?>
    <div class="alert alert-<?php echo $success ? "success" : "danger" ?>"><?php echo $message ?></div>
<?php
  }
}
