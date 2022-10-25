<?php
  require __DIR__.'/../Apps/Valida.php';

  class Turma{
	  private $ano;
	  private $nome;
	  private $quantidadeAluno;
	  private $curso;
    
  	public function __constuct($ano, $nome, $quantidadeAluno, $curso){
      self::setAno($ano);
      self::setNome($nome);
      self::setQuantidadeAluno($quantidadeAluno);
      self::setCurso($curso);
    }
      
  	public function getAno(){
      return $this -> ano;
    }
      
    public function setAno($ano){
      $err = 0;
      $this -> ano = ($ano >= 2022) ? $ano : $err = 1;
  
      return $err;
    }
      
  	public function getNome(){
      return $this -> nome;
    }
      
    public function setNome($nome){
      $err = 0;
      $err = validaString($nome);
      $this -> nome = ($err == 0) ? $nome : "";
    }
      
  	public function getQuantidadeAluno(){
      return $this -> quantidadeAluno;
    }
      
    public function setQuantidadeAluno($quantidadeAluno){
      $err = 0;
      $this -> quantidadeAluno = ($quantidadeAluno > 0) ? $quantidadeAluno : 0;
    }
      
  	public function getCurso(){
      return $this -> curso;
    }
      
    public function setCurso($curso){
      $err = 0;
      $err = validaString($curso);
      $this -> curso = ($err == 0) ? $curso : "";
    }
      
    public function insert(){
      return "INSERT INTO Turma(ano, nome, quantidadeAluno, curso) VALUES(\'${ano}\', \'${nome}\', \'${quantidadeAluno}\', \'${curso}\');";
    }
      
    public function query(){
      return "SELECT ano, nome, quantidadeAluno, curso FROM Turma WHERE ano LIKE \'${ano}\' AND nome LIKE \'${nome}\' AND \quantidadeAluno LIKE '${quantidadeAluno}\ AND curso LIKE', \'${curso}";
    }
}
?>