<?php

class InvalidEmailException extends InvalidArgumentException
{
  public function __construct()
  {
    $this->message = "Le format de l'email est incorrect";
  }
}
