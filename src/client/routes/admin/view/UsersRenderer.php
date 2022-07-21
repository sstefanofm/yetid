<?php

include __DIR__ . '/../controller/UsersLoader.php';

class UsersRenderer
{
  private $loader;

  function __construct()
  {
    $this->loader = new UsersLoader();
  }

  function load_users($row_start, $max_results, $order_by)
  {
    $this->loader->load_users($row_start, $max_results, $order_by);
  }

  function render_next()
  {
    $user = $this->loader->get_next();
?>
    <tr class="user">
      <th class="id" scope="row">
        <?php echo $user['id'] ?>
      </th>

      <td class="username">
        <?php echo $user['username'] ?>
      </td>

      <td class="password">
        <?php echo $user['password'] ?>
      </td>

      <td class="role">
        <?php echo $user['role'] == 1 ? "Admin" : "Normal user"; ?>
      </td>

      <td class="delete">
        <button class="btn btn-warning btn-edit-user" id="<?php echo $user['id'] ?>"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-danger btn-delete-user" id="<?php echo $user['id'] ?>"><i class="bi bi-trash"></i></button>
      </td>
    </tr>
<?php
  }

  function is_empty()
  {
    return $this->loader->is_empty();
  }

  function count_total_users()
  {
    return $this->loader->count_total_users();
  }
}
