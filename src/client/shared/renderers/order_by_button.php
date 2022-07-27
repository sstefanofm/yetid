<?php

/* 
 * DESC orders by recent
 * ASC orders by older
 */

function render_order_by_button()
{
  // $current_value could be "DESC" or "ASC";
?>
  <div class="order-by">
    <button class="btn btn-order-by">
      <?php
      // show "Recent" if current value is "DESC", and vice versa;
      if (strcmp($_SESSION['order_by'], "DESC") == 0 || !isset($_SESSION['order_by'])) {
        echo "Recent";
      } else {
        echo "Old";
      }
      ?>
      &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;
    </button>

    <div class="order-by-content hidden">
      <button class="btn btn-option btn-recent">Most recent</button>
      <button class="btn btn-option btn-old">Most old</button>
    </div>

    <script>
      document.querySelector('.btn-order-by').addEventListener('click', () => {
        document.querySelector('.order-by-content').classList.toggle('hidden');
      });

      document.querySelector('.btn-recent').addEventListener('click', () => {
        <?php
        $_SESSION['order_by'] = "DESC";
        ?>
        window.location.reload();
      });

      document.querySelector('.btn-old').addEventListener('click', () => {
        <?php
        $_SESSION['order_by'] = "ASC";
        ?>
        window.location.reload();
      });
    </script>
  </div>
<?php
}
