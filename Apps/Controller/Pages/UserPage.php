<?

require_once __DIR__ . "/../../Utils/View.php";
require_once __DIR__ . "/../../Entities/Usuario.php";
require_once __DIR__ . "/../../Bd/Database.php";

class UserPage{

  # Retorna o usuário requisitado ou nulo se ele não existir
  public static function getUser($name){
    $name = urldecode($name);
    return $name;
  }
  public static function get($request, $name){

    # Usuário requisitado
    $userName = self::getUser($name);

    # Variáveis da View
    $vars = [
      'name' => $userName,
      'navbar' => View::render('Navbar'),
      'footer' => View::render('Footer')
    ];
    
    return View::render("UserPage", $vars);
  }
}