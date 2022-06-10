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
