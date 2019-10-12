<?php

class UserController
{

  public function form() 
  {
    return 'form';
  }

  public function list(User $user) 
  {
    return ['view' => 'list', 'user' => $user];
  }
}