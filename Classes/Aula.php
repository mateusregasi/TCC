<?php
  require __DIR__.'/../Apps/Valida.php';

  class Aula{
      private $horario;
    	private $laboratorio;
    	private $turma;
    	private $quantAlunos;
    	private $dataAula;
      private $materialUtilizado; # Array(material, quantidade)
    
    	public function __constuct($hora, $lab, $tur, $quant, $data, $materiais){
        self::setHorario($hora);
        self::setLaboratorio($lab);
        self::setTurma($tur);
        self::setQuantAlunos($quant);
        self::setDataAula($data);
      }

      public function setHorario($horario){
        
      }

      public function setLaboratorio(){
        
      }

      public function setTurma(){
        
      }

      public function setQuantAlunos(){
        
      }

      public function setDataAula(){
        
      }

    	public function getQuantAlunos() return $this -> quantAlunos;
    	public function getLaboratorio() return $this -> laboratorio;
    	public function getDataAula() return $this -> dataAula;
    	public function getHorario() return $this -> hora;
    	public function getTurma() return $this -> turma;

      public function adicionarMaterial(){
        
      }

      public function excluirMaterial(){
        
      }

      public function insert(){
        
      }

      public function query(){
        
      }
    }
?>