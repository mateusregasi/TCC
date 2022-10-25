<?php

function validaString($str): int{
  $erro = 0;
  $erro = (preg_match('~[0-9.,!@#$%¨&*()_=+{}<>:/?:;|]+~', $str)) ? 1 : 0;
  return $erro;
  /* 
    erro 1: possuem caracteres especiais ou números
  */
}

function validaEspecial($str): int{
  $erro = 0;
  $erro = (preg_match('~[.,!@#$%¨&*()_=+{}<>:/?:;|]+~', $str)) ? 1 : 0;
  return $erro;
}

/*
function validaNumerico($num): int{
  is_numeric($string);
}
*/

function validaMinuscula($str): int{}
function validaMaiuscula($str): int{}
function validaTamanho($texto, ...$limite): int{
  $erro = 0;
	if(count($limite) == 1){
    if(strlen($texto) > $limite[0]) $erro = 2;
  } else if(count($limite) == 2){
    if(strlen($texto) > $limite[1] or strlen($texto) < $limite[0]) $erro = 2;
  } else $erro = 1;
	return $erro;
  /* 
    -> erro 1: parâmetros inválidos
    -> erro 2: fora dos limites de caracteres
  */
}
function validaEmail($email): int{
  $erro = 0;
  $validos = ["ifrj.edu.br", "gmail.com", "hotmail.com"];
  if(strlen($email) > 100) $erro = 1;
  else if(count(explode('@', $email)) != 2) $erro = 2;
  else{ 
    foreach($validos as $dominio){
      $erro = 3;
      if(explode('@', $email)[1] == $dominio){
        $erro = 0;
        break;
      }
    }
  }
  return $erro;
  /*
    -> erro 1: passou do limite de caracteres
    -> erro 2: tem mais ou menos de um domínio
    -> erro 3: domínio inválido
  */
}
function validaSenha($senha, $maiusculas = true, $minusculas = true, $algarismos = true, $especiais = true): int{
  $erro = 0;
  $maiusculas = !$maiusculas;
  $minusculas = !$minusculas;
  $algarismos = !$algarismos;
  $especiais = !$especiais;
  if(strlen($senha) < 8 or strlen($senha) > 14) $erro = 1;
  else{
    foreach(str_split($senha) as $letra){
      if(ord($letra) >= 48 and ord($letra) <= 57) $algarismos = true;
      if(ord($letra) >= 65 and ord($letra) <= 90) $maiusculas = true; 
      if(ord($letra) >= 97 and ord($letra) <= 122) $minusculas = true;
      if((ord($letra) >= 33 and ord($letra) <= 47) or (ord($letra) >= 58 and ord($letra) <= 64) or (ord($letra) >= 91 and ord($letra) <= 96) or (ord($letra) >= 123 and ord($letra) <= 126)) $especiais = true;
    }
    if($maiusculas == false or $minusculas == false or $especiais == false or $algarismos == false) $erro = 2;
  }
  return $erro;
  /*
  -> erro 1: tamanho menor ou maior
  -> erro 2: não cumpriu os requisitos de complexidade
  */
}

function validaMatricula($matricula): int{
  $erro = 0;
  if(strlen($matricula) != 11) $erro = 1;
  else foreach($matricula as $caractere){
    if(ord($caractere) < 48 or ord($caractere) > 57) $erro = 2;
    else $this->matricula = $matricula;
  }
  return $erro;
  /*
    -> erro 1: tamanho inválido
    -> erro 2: caracteres inválidos
  */
}

function validaTelefone($telefone): int{
  $erro = preg_match("/^(\+\d{1,3})?[ ]?(([(]\d{1,2}[)])|(\d{1,2}))?[ ]?[9]{1}\d{4}[ -]?\d{4}$/", $telefone);
  $erro = !$erro;
  return $erro;
  /*
    -> erro 1: formato de número inválido
  */
}

function get($key){
  return htmlentities(stripslashes($_GET[$key]));
}
function validateDate($date){
  $error = 0;
  if(preg_match('/\d{4}\-(([0][1-9])|([1][0-2]))\-[0][1]/', $date) != 1) $error = 1;
  return $error;
}