<?php

function render_create_button($user_is_logged)
{
  if ($user_is_logged) {
?>
    <button class="btn btn-colors btn-create"><span class="add-sign">[+]</span>&nbsp;Create</button>
<?php
  }
}

