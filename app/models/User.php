<?php 

class User
{
  private $name;
  private $password;

  public function __construct($name, $password)
  {
    $this->name = $name;
    $this->password = $password;
  }

  public function __toString() {
    return "{$this->name}, {$this->password}";
  }
}