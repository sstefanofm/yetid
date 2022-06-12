<?php

session_start();

?>

<div class="posts-container default-border">
  <div class="posts-header default-border">
    <button class="btn btn-colors btn-home">Home</button>
    <button class="btn btn-colors btn-explore">Explore</button>
    <button class="btn btn-colors btn-create"><span class="add-sign">[+]</span>&nbsp;Create</button>
    <button class="btn btn-order-by">Order by &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;</button>

    <div class="order-by-content hidden">
      <button class="btn btn-option">Recent</button>
      <button class="btn btn-option">Most viewed</button>
    </div>
  </div>
</div>

<script src="http://localhost/stf/yetid/src/js/orderByButton.js"></script>
<script src="http://localhost/stf/yetid/src/js/goToCreatePost.js"></script>
