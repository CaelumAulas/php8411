<?php

spl_autoload_register(function($class) {
  $paths = array('base', 'controllers', 'models');
  foreach($paths as $path) {
    $file = "{$path}/$class.php";
    if(file_exists($file)){
      require_once $file;
    }
  }
});