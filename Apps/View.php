<?php

class View{
  private static $vars = [];
  static function init($vars = []){
    self::$vars = $vars;
  }
  private function getViewContent($view){
    $path = __DIR__ . "/../Views";
    $dirs = array_diff(scandir($path), ["..", "."]);
    foreach($dirs as $index => $dir) if(!is_dir("$path/$dir")) unset($dirs[$index]);
    foreach($dirs as $dir){
        if(file_exists("$path/$dir/$view.html")) return file_get_contents("$path/$dir/$view.html");
    }
  }
  public static function render($view, $contents = []){
    $content = self::getViewContent($view);
    $contents = array_merge(self::$vars, $contents);
    $keys = array_map(function($chave){
      return "{{" . $chave . "}}";
    }, array_keys($contents));
    $content = str_replace($keys, array_values($contents), $content);
    return $content;
  }
}

//Seu router funciona?