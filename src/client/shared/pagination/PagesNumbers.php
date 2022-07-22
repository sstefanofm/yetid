<?php

class PagesNumbers
{
  private $current_page;

  function __construct($getter, $max_results)
  {
    $this->current_page = (!isset($_GET['page']) || $_GET['page'] <= 0) ? 1 : (int) $_GET['page'];
    $this->max_pages = ceil($getter->count_total_results() / $max_results);
  }

  function render()
  {
?>
    <div class="pages-numbers">
      <?php
      if ($this->current_page > 1) {
        for ($i = 1; $i < $this->current_page; $i++) {
      ?>
          <button class="btn btn-page"><?php echo $i ?></button>
      <?php
        }
      }
      ?>
      <button class="btn btn-page current-page"><?php echo $this->current_page ?></button>
      <?php
      for ($i = $this->current_page + 1; $i < $this->max_pages + 1; $i++) {
      ?>
        <button class="btn btn-page"><?php echo $i ?></button>
      <?php
      }
      ?>
    </div>
<?php
  }
}
