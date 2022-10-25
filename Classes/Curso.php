<?php
  require __DIR__.'/../Apps/Valida.php';

  class Curso{
    private $nome;
    private $sigla;

  	public function __construct($nome, $sigla){
      self::setNome($nome);
      self::setSigla($sigla);
    }

  	public function getNome(){
      return $this -> nome;
    }

  	public function getSigla(){
      return $this -> sigla;
    }

    public function setNome($nome){
      $err = 0;
      $err = validaString($nome);
      $this -> nome = ($err == 0) ? $nome : "";

      return $err;
    }

    public function setSigla($sigla){
      $err = 0;
      $err = validaString($sigla);
      $this -> sigla = ($err == 0) ? $sigla : "";

      return $err;
    }

    public function insert(){
      return "INSERT INTO Curso(nome, sigla) VALUES(\'${nome}\', \'${sigla}\');";
    }

    public function query(){
      return "SELECT nome, sigla FROM Curso WHERE nome LIKE \'${nome}\' AND sigla LIKE \'${sigla}\';";
    }
  }
?>