<?
require_once __DIR__ . "/../../Utils/View.php";

class AddItemPage{
  public static function get(){
    return View::render('AddItem', [
      'navbar' => View::render('Navbar'),
      'footer' => View::render('Footer')
    ]);
  }
}