<?php 
  
require_once __DIR__ . "/../../Utils/View.php";
require_once __DIR__ . "/../../Utils/Validate.php";
require_once __DIR__ . "/../../Entities/Usuario.php";

class LoginPage{
  # Verifica se o login é válido
  static function verifyLogin($request){
    if($request != ""){
      $email = $request->getPostVars()['email'];
      $senha = $request->getPostVars()['senha'];
      if(!$senha or !$email) return '<p>Email e/ou senha faltando!</p>';
      else{
        $usuarios = Usuario::get();
        foreach($usuarios as $usuario){
          if(($usuario->getSenha() == $senha) and ($usuario->getEmail() == $email)) return '';
        }
        return '<p>Usuário não encontrado</p>';
      }
    }
    return $error;
  }
  static function get($request = ''){

    # Set de veriáveis para a view
    $vars = [
      "navbar" => View::render("NavbarLogin"),
      "error-message" => "",
      "footer" => View::render("Footer")
    ];
    $page = 'LoginPage';

    # Definindo os tipos de request
    if($request == ''){ # Caso não tenha request
      return View::render($page, $vars);
    } else if($request->getHttpMethod() == "POST"){ # Caso o método do request seja POST

      # Verifica se o email e senha está no login
      $error = self::verifyLogin($request);

      # Se tiver mensagem de erro, o usuário não foi logado corretamente, então mostra a tela de login com uma mensagem de erro;
      if($error != ""){
        $vars["error-message"] = $error;
        return View::render($page, $vars);
      }

      # Se o usuario estiver logado vai iniciar uma sessão
      else{
        return "<p>Logado</p>";
      }
    }
  }
}