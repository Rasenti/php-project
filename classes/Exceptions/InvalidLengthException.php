<?php

class InvalidLengthException extends InvalidArgumentException
{
  public function __construct(int $length)
  {
    $this->message = "Le champ doit faire moins de {$length} caractères";
  }
}
