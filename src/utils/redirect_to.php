<?php

function redirect_to($location)
{
  header("Location: $location");
}

function redirect_to_login()
{
  redirect_to("http://localhost/stf/yetid/src/routes/login/login.php");
}

function redirect_to_index()
{
  redirect_to("http://localhost/stf/yetid/src/");
}

function redirect_to_register()
{
  redirect_to("http://localhost/stf/yetid/src/routes/register/register.php");
}

function redirect_to_edit($id)
{
  redirect_to("http://localhost/stf/yetid/src/routes/posts/edit_post.php?id=$id");
}

function redirect_to_create_user()
{
  redirect_to("http://localhost/stf/yetid/src/routes/admin/create_user.php");
}

function redirect_to_view_users()
{
  redirect_to("http://localhost/stf/yetid/src/routes/admin/view_users.php");
}
