<?php 

class Router
{
  private $gets = array();
  private $posts = array();

  public function get($path, $controllerAction){
    array_push($this->gets, [$path => $controllerAction]);
  }

  public function post($path, $controllerAction){
    array_push($this->posts, [$path => $controllerAction]);
  }

  public function resolve($method, $path){
      $methodToCall = strtolower($method) . 's';
      $args = array();
      if($method == 'POST'){
        $args = new User($_POST['name'], $_POST['password']);
      }
      $this->resolveView($this->$methodToCall, $path, $args);
  }

  private function resolveView($actionsMethods, $requestPath, $args){
    foreach($actionsMethods as $actionMethod){
      if(array_key_exists($requestPath, $actionMethod)) {
        $controllerAction = $actionMethod[$requestPath];

        $controllerAction = explode('@', $controllerAction);

        $controller = new $controllerAction[0];
        $action = $controllerAction[1];
        $view = $controller->$action($args);


        if(is_array($view)){
          extract($view);
        }

        $viewPath = __DIR__ . "/../views/user/{$view}.php";
        if(file_exists($viewPath)){
          require $viewPath;
        }
      }
    }
  }
}