<?php

$nome = "Mateus Regasi Gomes Martins";
$email = "mateusregasigm@gmail.com";
$senha = "Mat&usdasdasd1";
$matricula = "12345678910";
$telefone = "99999-9999";
$tipoUsuario = "Noia";

require __DIR__."/Classes/Usuario.php";
$usuario = new Usuario();

switch($usuario->setNome($nome)){
  case 0:
    echo "O nome ". $usuario->getNome() . " foi adicionado com sucesso.";
    break;
  case 1:
    echo '-> erro 1: parâmetros validaTamanho() inválidos';
    break;
  case 2:
    echo '-> erro 2: fora dos limites de caracteres validaTamanho()';
    break;
  case 3:
    echo '-> erro 3: caracteres especiais';
    break;
}
echo "<br><br><br>";


switch($usuario->setEmail($email)){
  case 0:
    echo "O email ".$usuario->getEmail()." adicionado com sucesso";
    break;
  case 1:
    echo "Passou do limite de caracteres";
    break;
  case 2:
    echo "Tem mais ou menos de um domínio";
    break;
  case 3:
    echo "Domínio inválido";
    break;
}
echo "<br><br><br>";

switch($usuario->setSenha($senha)){
  case 0:
    echo "A senha ". $usuario->getSenha() ." adicionada com sucesso";
    break;
  case 1:
    echo "Passou ou faltou tamanho";
    break;
  case 2:
    echo "Não cumpriu os requisitos de complexidade";
    break;
}
echo "<br><br><br>";

switch($usuario->setMatricula($matricula)){
  case 0:
    echo "Matricula " . $usuario->getMatricula() . " adicionada com sucesso";
    break;
  case 1:
    echo "Passou ou faltou tamanho";
    break;
  case 2:
    echo "Não cumpriu os requisitos de complexidade";
    break;
}
echo "<br><br><br>";

switch($usuario->setTelefone($telefone)){
  case 0:
    echo "Telefone " . $usuario->getTelefone() . " adicionado com sucesso";
    break;
  case 1:
    echo "-> erro 1: formato de número inválido";
    break;
}
echo "<br><br><br>";

switch($usuario->setTipoUsuario($tipoUsuario)){
  case 0:
    echo "Tipo de usuario " . $usuario->getTipoUsuario() . " adicionada com sucesso";
      break;
}
echo "<br><br><br>";

echo "<br><br><br>".$usuario->toString();
