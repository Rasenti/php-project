<?php


class InvalidDateException extends InvalidArgumentException
{
  public function __construct()
  {
    $this->message = "Le format de la date est incorrect";
  }
}
