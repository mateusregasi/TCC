<?php

require __DIR__."/../Apps/Valida.php";
require __DIR__."/../Apps/Padroniza.php";

class Usuario{
  private $nome;
	private $email;
	private $senha;
	private $matricula;
	private $telefone;
  private $tipoUsuario;
	public function __construct($nome = "", $email = "", $senha = "", $matricula = "", $telefone = "", $tipoUsuario = ""){
		$this->setNome($nome);
		$this->setEmail($email);
		$this->setSenha($senha);
		$this->setMatricula($matricula);
		$this->setTelefone($telefone);
		$this->setTipoUsuario($tipoUsuario);
	}
	public function getNome(){
		return $this->nome;
	}
    public function setNome($nome){
		$erro = validaTamanho($nome, 100);
		if($erro == 0) $erro = validaString($nome);
        if($erro == 0)$this->nome = $nome;
		else $erro += 2;
		return $erro;
    /*
        -> erro 1: parâmetros validaTamanho() inválidos
        -> erro 2: fora dos limites de caracteres validaTamanho()
        -> erro 3: caracteres especiais
    */
	}
	public function getEmail(){
		return $this->email;
	}
    public function setEmail($email){
        $erro = validaEmail($email);
        if($erro == 0) $this->email = $email;
        return $erro;
        }
    public function getSenha(){
            return $this->senha;
        }
    public function setSenha($senha, $maiusculas = true, $minusculas = true, $algarismos = true, $especiais = true){
        $erro = validaSenha($senha, $maiusculas, $minusculas, $algarismos, $especiais);
        if($erro == 0) $this->senha = $senha;
        return $erro;
    }
	public function getMatricula(){
		return $this->matricula;
	}
  public function setMatricula($matricula){
    // A fazer <--------------------------------------------------------------------- 
		$erro = validaMatricula($matricula);
        if($erro == 0) $this->matricula = $matricula;
        return $erro;
	}
	public function getTelefone(){
		return $this->telefone;
	}
    public function setTelefone($telefone){
		$erro = validaTelefone($telefone);
		if($erro == 0) {
			$telefone = padronizaTelefone($telefone);
			$this->telefone = $telefone;
		}
		return $erro;
	}
	public function getTipoUsuario(){
		return $this->tipoUsuario;
	}
    public function setTipoUsuario(){
		// A FAZER
	}
    public function insert(){
		// A FAZER
	}
    public function querry(){
		// A FAZER
	}
	public function toString(){
		return "Nome: $this->nome<br>Email: $this->email<br>Senha: $this->senha<br>Matricula: $this->matricula<br>Telefone: $this->telefone<br>Tipo de Usuario: $this->tipoUsuario";
	}
}