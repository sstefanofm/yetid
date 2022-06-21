<?php

include __DIR__ . '/../model/UsersGetter.php';

class UsersLoader
{
  private $getter;
  private $users;
  private $turns;

  function __construct()
  {
    $this->getter = new UsersGetter();
  }

  function count_total_users()
  {
    return $this->getter->count_all();
  }

  function load_users($row_start, $max_results, $order_by)
  {
    $this->users = $this->getter->get_users($row_start, $max_results, $order_by);
  }

  function get_next()
  {
    $this->turns++;

    return mysqli_fetch_array($this->users);
  }

  function is_empty()
  {
    if ($this->turns >= mysqli_num_rows($this->users)) {
      return true;
    }
    return false;
  }
}
