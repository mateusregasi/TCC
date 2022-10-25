<?php

class Response{
  private $httpCode = 200;
  private $headers = [];
  private $contentType = "text/html";
  private $content;
  public function __construct($httpCode = 200, $content, $contentType = "text/html"){
    $this->httpCode = $httpCode;
    $this->content = $content;
    $this->setContentType($contentType);
  }
  function setContentType($contentType){
    $this->contentType = $contentType;
    $this->addHeader("Content-Type", $contentType);
  }
  function addHeader($key, $value){
    $this->headers[$key] = $value;
  }
  private function sendHeaders(){
    http_response_code($this->httpCode);
    foreach($this->headers as $key => $value){
      header("$key: $value");
    }
  }
  function sendResponse(){
    $this->sendHeaders();
    switch($this->contentType){
      case "text/html":
          echo $this->content;
          exit;
    }
  }
}

// Eu escrevi...eu escrevi constructor ao inves de consstruct
// Eu entendi mais ou menos, mas tô fazendo seguindo o vídeo