<?php
session_start();
?>
<div class="red logo p-2">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-auto me-auto">
        <a class="navbar-brand" href="http://localhost/stf/yetid/src/">Yetid.</a>
      </div>

      <?php
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
      ?>
        <div class="col-auto">
          <button class="btn-user"></button>
        </div>
      <?php
      } else {
      ?>
        <div class="col-auto">
          <a class="btn red" href="http://localhost/stf/yetid/src/routes/register/register.php">Register</a>
          <a class="btn btn-green" href="http://localhost/stf/yetid/src/routes/login/login.php">Login</a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
?>
  <div class="hidden user-options">
    <div class="user-username"><?php echo $_SESSION['username'] ?></div>
    <?php
    if ($_SESSION['admin']) {
    ?>
      <div class="create-user">
        <a href="http://localhost/stf/yetid/src/routes/admin/create_user.php">Create user</a>
      </div>
      <div class="view-users">
        <a href="http://localhost/stf/yetid/src/routes/admin/view_users.php">View users</a>
      </div>
    <?php
    }
    ?>
    <div class="user-logout"><button class="logout btn">Log out</button></div>
  </div>
<?php
}
?>


<script src="http://localhost/stf/yetid/src/js/triggerLogout.js"></script>
<script src="http://localhost/stf/yetid/src/js/toggleUserOptions.js"></script>
