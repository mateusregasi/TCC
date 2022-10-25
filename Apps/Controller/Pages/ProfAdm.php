<?php 
  require_once __DIR__."/../../View.php";

  class Pagina{
    static function getPagina(){
        return View::render("ProfAdm", [
                            "navbar" => View::render("Navbar"),
                            "footer" => View::render("Footer")
        ]);
    }
  }
?>