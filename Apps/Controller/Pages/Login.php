<?php 
  require_once __DIR__."/../../View.php";

  class Login{
    static function getLogin(){
      return View::render("Login", [
                          "navbar" => View::render("NavbarLogin"),
                          "error-message" => ""/*<p>Email ou senha inválidos. Tente novamente!</p>*/,
                          "footer" => View::render("Footer")
      ]);
    }
  }
?>