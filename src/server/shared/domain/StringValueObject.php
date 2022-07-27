<?php

class StringValueObject
{
  protected $value;

  function __construct($value, $minL, $maxL, $name)
  {
    $this->validate($value, $minL, $maxL, $name);
    $this->value = $value;
  }

  function validate($value, $minL, $maxL, $name)
  {
    if (count($value) < $minL || count($value) > $maxL) {
      throw new Exception("$name must have $minL or more characters.");
    }
  }
}
