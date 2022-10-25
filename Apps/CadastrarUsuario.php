<?php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];

  $banco = mysqli_connect('localhost', 'administrador', 's3nh@doADM', 'BDAdministracao') or die('Não foi possível conectar ao MySQL');
  
  mysqli_query($banco, "insert into Usuario values (default, '$nome', '$email', '$senha', '$telefone');");
  
  mysqli_close($banco);