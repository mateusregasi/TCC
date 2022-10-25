<?php
  require __DIR__.'/../Apps/Valida.php';

  class Laboratorio{
  	private $sigla;
  	public function __constuct($sigla){
      self::setSigla($sigla);
    }
    
  	public function getSigla(){
      return $this -> sigla;
    }
    
    public function setSigla($sigla){
      $err = 0;
      $err = validaString($sigla);
      $this -> sigla = ($err === 0) ? $sigla : "";

      return $sigla;
    }
    
    public function insert(){
      return "INSERT INTO Laboratorio(sigla) VALUES(\'${sigla}\');";
    }
    
    public function query(){
      return "SELECT sigla FROM Laboratorios WHERE sigla LIKE \'${sigla}\';"
    }
  }