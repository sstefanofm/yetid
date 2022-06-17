<?php

function validate_string($string, $min_length, $max_length)
{
  if (!isset($string) || empty($string)) {
    return 1;
  }

  if (strlen($string) < $min_length || strlen($string) > $max_length) {
    return 2;
  }

  return 0;
}

function validation_message($error_code, $string_name, $min_length)
{
  switch ($error_code) {
    case 1:
      return "$string_name cannot be empty";

      break;

    case 2:
      return "$string_name must have more than $min_length characters.";

      break;

    case 0:
      return "Success";

      break;
  }
}
