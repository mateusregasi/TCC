<?php 
  require_once __DIR__."/../../Utils/View.php";

  class ProfAdmPage{
    static function getPagina(){
        return View::render("ProfAdmPage", [
                            "navbar" => View::render("Navbar"),
                            "footer" => View::render("Footer")
        ]);
    }
  }
?>