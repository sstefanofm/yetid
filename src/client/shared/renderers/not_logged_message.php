<?php

function render_not_logged_message($user_is_logged)
{
  if (!$user_is_logged) {
?>
    <div>
      <p class="not-logged">You have to be logged in to see your posts</p>
      <div class="not-logged">
        <a class="btn btn-secondary" href="routes/login/login.php">Log in</a>
      </div>
    </div>
<?php
  }
}
