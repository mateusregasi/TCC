<?php

require_once __DIR__ . "/../../View.php";

class Home{
  static function get(){
    return View::render("Home", [
                        "navbar" => View::render("Navbar"),
                        "footer" => View::render("Footer") 
    ]);
  }
}