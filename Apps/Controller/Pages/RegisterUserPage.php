<?

require_once __DIR__ . "/../../Utils/View.php";
require_once __DIR__ . "/../../Entities/Usuario.php";
require_once __DIR__ . "/../../Entities/TipoUsuario.php";
require_once __DIR__ . "/../../Bd/Database.php";

class RegisterUserPage{
  public static function getUsers(){
    
    # Pega os usuários
    $users = Usuario::get();

    // echo '<br><br><pre>'; var_dump($users); echo '</pre>';
    
    # Monta as linhas da tabela baseadas nos usuarios
    $lines = '';
    foreach($users as $user){
      $lines .= View::render('ShowUserForm', [
        'name' => $user->getNome(),
        'email' => $user->getEmail(), 
        'phone-number' => $user->getTelefone(), 
        'user-type' => $user->getTipoUsuario()->getNome(), 
        'user-edit-uri' => '/usuario/' . urlencode($user->getNome()), 
        'user-pk' => $user->getCodUsuario()
      ]);
    }
    
    return $lines;
  }
  
  public static function deleteUser($request){
    Usuario::delete('codUsuario = ' . $request->getPostVars()['delete']);
  }

  # Esse método é para colocar os tipos de usuario no formulário de cadastro
  public static function getTypeUsers(){
    $types = TipoUsuario::get();
    $lines = '';    
      
    # Construindo as linhas
    foreach($types as $type){
      if($types[0] == $type) $lines .= '<option selected value="' . $type->getNome() . '">' . $type->getNome() . '</option>';
      else $lines .= '<option value="' . $type->getNome() . '">' . $type->getNome() . '</option>';
    }

    return $lines;
  }

  public static function verifyUserFormEmpty($request){
    if(
         !empty($request->getPostVars()['name'])
      or !empty($request->getPostVars()['email']) 
      or !empty($request->getPostVars()['password']) 
      or !empty($request->getPostVars()['typeUser'])) 
      return false;
    else return true;
  }

  public static function verifyUserInvalid($user){
    
    // Verifica se tem algum campo inválido
    if(empty($user->getNome()) 
      or    empty($user->getEmail()) 
      or    empty($user->getSenha()) 
      or    empty($user->getTipoUsuario())) 
      return true;
    else return false;
  }

  public static function verifyUserExists($user){
    $users = Usuario::get();
    foreach($users as $u){
      if($u->getNome() == $user->getNome() 
        or $u->getEmail() == $user->getEmail())
        return true;
    }
    return false;
  }

  # Registra o usuário ou retorna um erro
  public static function registerUser($request){
    
    # Verifica se está vazio
    if(self::verifyUserFormEmpty($request))
      return '<p class="error">Algo está faltando!</p>';
    
    else{
      
      # Criando o usuário
      $user = new Usuario();
      $user->setNome($request->getPostVars()['name']);
      $user->setEmail($request->getPostVars()['email']);
      $user->setSenha($request->getPostVars()['password']);
      $user->setTipoUsuario($request->getPostVars()['typeUser']);

      # Verifica se o usuário tem todos os campos válidos
      if(self::verifyUserInvalid($user)) 
        return '<p class="error">Algum campo está inválido!</p>';
      else{
        # Verifica se o usuário já existe
        if(self::verifyUserExists($user))
          return '<p class="error">O usuário já existe</p>';
        else{
          $user->insert();
          return false;
        }
      }
    }
  }

  # Controla o que cada dado inserido vai fazer
  public static function insert($request){
    switch($request->getHttpMethod()){
      case 'POST':
        $vars = [];
      
        // echo '<br><br><pre>'; var_dump($request); echo '</pre>';
      
        # Se tiver uma requisição para deletar
        if(isset($request->getPostVars()['delete'])) self::deleteUser($request);

        # Se o post for o cadastro de um usuário
        else if(isset($request->getPostVars()['name'])){
          $registerError = self::registerUser($request);
          if($registerError != false){
            $vars .= array_merge($vars, [
            'register-error' => 
              '<div class="error">' . $registerError . '</div>'
            ]);
          }
        }
        echo '<br><br><pre>'; var_dump($vars); echo '</pre>';
        
        return self::get([]);
      break;
    }
  }
  
  public static function get($inserted = []){
    
    # Inicia as variáveis para a view
    $vars = array_merge($inserted, [
      'navbar' => View::render("Navbar"),
      'footer' => View::render("Footer"),
      'users' => self::getUsers(),
      'type-user' => self::getTypeUsers()
    ]);

    return View::render('RegisterUserPage', $vars);
  }
}