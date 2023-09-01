<?php

class InvalidPasswordConfirmationException extends InvalidArgumentException
{
  public function __construct()
  {
    $this->message = "Les mots de passe ne correspondent pas";
  }
}
