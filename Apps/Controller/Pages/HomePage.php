<?php

require_once __DIR__ . "/../../Utils/View.php";

class HomePage{
  static function get(){
    return View::render("HomePage", [
           'navbar' => View::render("Navbar"),
           'footer' => View::render("Footer")
    ]);
  }
}