<?php

class Router{
  private $url;
  private $prefix;
  private $routes = [];
  private $request;
  function __construct($url){
    $this->request = new Request();
    $this->url = $url;
    $this->setPrefix();
  }
  private function setPrefix(){
    $this->prefix = parse_url($this->url)["path"] ?? "";
  }
  private function addRoute($method, $route, $params = []){
    foreach($params as $key => $value){
      if($value instanceof Closure){
        $params["controller"] = $value;
        unset($params[$key]);
      }
    }
    $params['variables'] = [];
    $patternVariable = '/{(.*?)}/';
    if(preg_match_all($patternVariable, $route, $matches)){
      $route = preg_replace($patternVariables, '(.*?)', $route);
      $params['variable'] = matches[1];
    }
    $routePattern = "/^" . str_replace("/", "\/", $route) . "$/";
    $this->routes[$routePattern][$method] = $params;
  }
  function get($route, $params = []){
    return $this->addRoute("GET", $route, $params);
  }
  function post($route, $params = []){
    return $this->addRoute("POST", $route, $params);
  }
  function put($route, $params = []){
    return $this->addRoute("PUT", $route, $params);
  }
  function delete($route, $params = []){
    return $this->addRoute("DELETE", $route, $params);
  }
  private function getUri(){
    $uri = $this->request->getUri(); 
    $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
    return end($xUri);
  }
  private function getRoute(){
    $uri = $this->getUri();
    $httpMethod = $this->request->getHttpMethod();
    foreach($this->routes as $patternRoute => $methods){
      if(preg_match($patternRoute, $uri, $matches)){
        if($methods[$httpMethod]){
          unset($matches[0]);
          $keys = $methods[$httpMethod]['variables'];
          $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
          $methods[$httpMethod]['variables']['request'] = $this->request;
          return $methods[$httpMethod];
        }
        throw new Exception("O método requisitado não é permitido", 405);
      } 
    }
    throw new Exception("URL não encontrada", 404);
  }
  function run(){
    try{
      $route = $this->getRoute();
      if(!isset($route['controller'])){
        throw new Exception("A URL não pode ser processada", 500);
      }
      $args = [];
      $reflection = new ReflectionFunction($route['controller']);
      foreach($reflection->getParameters() as $parameter){
        $name = $parameter->getName();
        $args[$name] = $route['variables'][$name] ?? ""; /* */
      }
      return call_user_func_array($route['controller'], $args);
    } catch(Exception $e){
      return new Response($e->getCode(), $e->getMessage());
    }
  }
}
